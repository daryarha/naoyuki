@extends('templates.app')
@section('header')
Human Resource - Teacher
@endsection
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-tm btn-sm" data-toggle="modal" data-target="#Teacher">
    Add Teacher
    </button>
<!-- Modal -->
<div class="modal fade" id="Teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-edit modal-content"><br>
          <div class="text-center">
            <h6 class="text-center" id="exampleModalCenterTitle">Teacher</h6>
            <div class="col-6 offset-1">
              <hr id="hr-edit">
            </div>
          </div>
          <form action="{{ url('teacher') }}" method="post" class="col-10 offset-1" enctype="multipart/form-data">@csrf
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
<br><br>
<div class="card">
  <div class="card-body">
    <table id="teacher" class="table table-striped table-bordered table-sm" style="width:100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th>CV</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($teachers as $teacher)
        <tr>
          <td>{{ $teacher->name}}</td>
          <td>{{ $teacher->address}}</td>
          <td>{{ $teacher->phone}}</td>
          <td><a href="#" class="btn-teacher-cv" data-url="{{ asset('storage/teacher/'.$teacher->cv.'') }}" data-toggle="modal" data-target="#cv">{{ $teacher->cv }}</a></td>
          <td><a class="btn-teacher-edit" data-toggle="modal" data-nama="{{ $teacher->name}}" data-address="{{ $teacher->address }}" data-hp="{{ $teacher->phone }}" data-cv="{{ $teacher->cv }}" data-target="#teacheredit" data-url="{{ url('teacher/'.$teacher->id.'')}}"href="#">Edit</a>
          <a class="btn-teacher-delete" data-toggle="modal" data-target="#teacherdelete" data-url="{{ url('teacher/'.$teacher->id.'')}}" href="#">Delete</a></td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="modal fade" id="teacheredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-edit modal-content"><br>
          <div class="text-center">
            <h6 class="text-center" id="exampleModalCenterTitle">Teacher</h6>
            <div class="col-6 offset-1">
              <hr id="hr-edit">
            </div>
          </div>
         <form id="teacher-edit" action="#" method="post" class="col-10 offset-1" enctype="multipart/form-data">
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
<div class="modal fade" id="teacherdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center w-100" id="exampleModalLongTitle">Teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="teacher-delete" action="#" method="post">
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