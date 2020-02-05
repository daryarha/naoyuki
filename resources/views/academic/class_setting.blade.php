@extends('templates.app')
@section('header')
Academic - Class
@endsection
@section('content')
<form action="{{ url('class') }}" method="post">
  @csrf
  <div class="form-row">
    <div class="col-3">
      <input type="text" class="form-control btn-sm" placeholder="class name" name="class_name">
    </div>
    <div class="col-3">
      <button type="submit" class="btn btn-danger btn-tm btn-sm">
        Add Class
      </button>
    </div>
  </div>
</form>
<br><br>
<div class="card">
  <div class="card-body">
    <table id="class_setting" class="table table-striped table-bordered table-sm" style="width:100%">
      <thead>
        <tr>
          <th>Class name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($classes as $class)
        <tr>
          <td>{{ $class->name }}</td>
          <td> <a class="btn-class-edit" data-toggle="modal" data-name="{{$class->name}}" data-target="#classedit" data-url="{{ url('class/'.$class->id.'')}}" href="#">Edit</a>
            <a class="btn-class-delete" data-toggle="modal" data-target="#classdelete" data-url="{{ url('class/'.$class->id.'')}}" href="#">Delete</a></td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="modal fade" id="classedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-edit modal-content"><br>
      <div class="text-center">
        <h6 class="text-center" id="exampleModalCenterTitle">Class</h6>
        <div class="col-6 offset-1">
          <hr id="hr-edit">
        </div>
      </div>
      <form action="#" id="class-edit" method="post" class="col-10 offset-1">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="class">Class Name</label>
          <input type="text" class="form-control" id="class" placeholder="class" name="class_edit">
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
  <div class="modal fade" id="classdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center w-100" id="exampleModalLongTitle">Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="class-delete" action="#" method="post">
        @method('DELETE')
        @csrf
        <div class="modal-body text-center"> Are you sure want to delete this data?
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn mr-4 btn-secondary btn-class" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger btn-class">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection