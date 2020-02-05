@extends('templates.app')
@section('header')
Academic - Student
@endsection
@section('content')
<form action="{{ url('student') }}" method="post">
  @csrf
  <div class="form-row">
    <div class="col-3">
      <input type="text" class="form-control btn-sm" placeholder="Name" name="name">
    </div>
    <div class="col-3">
      <input type="text" class="form-control btn-sm" placeholder="Address" name="address">
    </div>
    <div class="col-3">
      <select class="form-control btn-sm" required name="class">
        <option disabled selected>class</option>
        @foreach($classes as $class)
        <option value="{{$class->id}}">{{$class->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-3">
      <button type="submit" class="btn btn-danger btn-tm btn-sm">
        Add Student
      </button>
    </div>
  </div>
</form>


<br><br>
<div class="card">
  <div class="card-body">
    <table id="student" class="table table-striped table-bordered table-sm" style="width:100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>Class</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($students as $student)
        <tr>
          <td>{{ $student->name }}</td>
          <td>{{ $student->address }}</td>
          <td>{{ $student->classic->name }}</td>
          <td>
            <a class="btn-student-edit" data-toggle="modal" data-name="{{$student->name}}" data-address="{{$student->address}}" data-class="{{$student->id_class}}" data-target="#studentedit" data-url="{{ url('student/'.$student->id.'')}}" href="#">Edit</a>
            <a class="btn-student-delete" data-toggle="modal" data-target="#studentdelete" data-url="{{ url('student/'.$student->id.'')}}" href="#">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="modal fade" id="studentedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-edit modal-content"><br>
      <div class="text-center">
        <h6 class="text-center" id="exampleModalCenterTitle">Student</h6>
        <div class="col-6 offset-1">
          <hr id="hr-edit">
        </div>
      </div>
      <form id="student-edit" class="col-10 offset-1" action="#" method="post">
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
          <label for="class">Class</label>
          <select class="form-control btn-sm" required name="class_edit">
            <option disabled selected>class</option>
            @foreach($classes as $class)
            <option value="{{$class->id}}">{{$class->name}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <br>
      <div class="col-2 offset-9">
        <button type="button" class="btn btn-secondary form-control btn-sm" data-dismiss="modal">OK</button>
      </div>
      <br>
    </div>
  </div>
</div>
<div class="modal fade" id="studentdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center w-100" id="exampleModalLongTitle">Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="student-delete" action="#" method="post">
        @method('DELETE')
        @csrf
        <div class="modal-body text-center"> Are you sure want to delete this data?
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn mr-4 btn-secondary btn-student" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger btn-student">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection