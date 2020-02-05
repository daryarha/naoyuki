@extends('templates.app')
@section('header')
Human Resource - Staff
@endsection
@section('content')
<!-- Button trigger modal -->

@if ($errors->any())
<div class="alert alert-danger"> 
  <ul>
    @foreach($errors->all() as $error)
    <li>
      {{$error}}
    </li>
    @endforeach
  </ul>
</div>
@endif
<button type="button" class="btn btn-danger btn-tm btn-sm" data-toggle="modal" data-target="#Staff">
  Add Staff
</button><br><br>
<!-- Modal -->
 <div class="modal fade" id="Staff" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-edit modal-content"><br>
          <div class="text-center">
            <h6 class="text-center" id="exampleModalCenterTitle">Staff</h6>
            <div class="col-6 offset-1">
              <hr id="hr-edit">
            </div>
          </div>
          <form action="{{ url('staff') }}" method="post" class="col-10 offset-1" enctype="multipart/form-data">@csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name">
              </div>

              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="address" name="address">
              </div>

              <div class="form-group">
                <label for="hp">Phone Number</label>
                <input type="number" class="form-control" id="hp" placeholder="hp" name="hp">
              </div>
              <div class="form-group">
                <label for="position">Position</label>
                <textarea class="form-control" id="position" placeholder="position" name="position"></textarea>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="cv" id="validatedCustomFile">
                <label class="custom-file-label" for="validatedCustomFile">Choose CV</label>
              </div>
            </div><br><br>            
            <div class="row">
              <div class="col-6">                
                <button type="button" class="btn btn-secondary w-100 btn-sm" data-dismiss="modal">Cancel</button>
              </div> 
              <div class="col-6">
                <button type="submit" class="btn btn-primary w-100 btn-sm">Add</button> 
              </div>
            </div>
          </form>
          <br>
          <br>
        </div>
      </div>
    </div>
<br>
<div class="card">
  <div class="card-body">
    <table id="student" class="table table-striped table-bordered table-sm" style="width:100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th>Position</th>
          <th>CV</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($staffs as $staff)
        <tr>
          <td>{{ $staff->name }}</td>
          <td>{{ $staff->address }}</td>
          <td>{{ $staff->phone }}</td>
          <td>{{ $staff->position }}</td>
          <td><a href="#" class="btn-staff-cv" data-url="{{ asset('storage/staff/'.$staff->cv.'') }}" data-toggle="modal" data-target="#cv">{{ $staff->cv }}</a></td>
          <td><a class="btn-staff-edit" data-toggle="modal" data-nama="{{ $staff->name}}" data-address="{{ $staff->address }}" data-hp="{{ $staff->phone }}" data-position="{{ $staff->position }}" data-cv="{{ $staff->cv }}" data-target="#staffedit" data-url="{{ url('staff/'.$staff->id.'')}}"href="#">Edit</a>
          <a class="btn-staff-delete" data-toggle="modal" data-target="#staffdelete" data-url="{{ url('staff/'.$staff->id.'')}}" href="#">Delete</a></td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="modal fade" id="staffedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-edit modal-content"><br>
          <div class="text-center">
            <h6 class="text-center" id="exampleModalCenterTitle">Staff</h6>
            <div class="col-6 offset-1">
              <hr id="hr-edit">
            </div>
          </div>
          <form id="staff-edit" action="#" method="post" class="col-10 offset-1" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="nama">Name</label>
              <input type="text" class="form-control" id="name" placeholder="name" name="name_edit">
            </div>

            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="address" name="address_edit">
            </div>

            <div class="form-group">
              <label for="hp">Phone Number</label>
              <input type="hp" class="form-control" id="hp" placeholder="hp" name="hp_edit">
            </div>
            <div class="form-group">
              <label for="position">Position</label>
              <textarea class="form-control" id="position" placeholder="position" name="position_edit"></textarea>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="cv_edit" id="validatedCustomFile2">
              <label class="custom-file-label" for="validatedCustomFile2">Choose CV</label>
            </div><br><br>            
            <div class="row">
              <div class="col-6">                
                <button type="button" class="btn btn-secondary w-100 btn-sm" data-dismiss="modal">Cancel</button>
              </div> 
              <div class="col-6">
                <button type="submit" class="btn btn-primary w-100 btn-sm">Submit</button> 
              </div>
            </div>
          </form>
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="" id="cv_file" width="750" height="500"></iframe>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">OK</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="staffdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center w-100" id="exampleModalLongTitle">Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="staff-delete" action="#" method="post">
        @method('DELETE')
        @csrf
        <div class="modal-body text-center"> Are you sure want to delete this data?
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn mr-4 btn-secondary btn-staff" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger btn-staff">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection