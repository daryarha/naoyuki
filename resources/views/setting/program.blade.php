@extends('templates.app')
@section('header')
Setting - Program
@endsection
@section('content')
<!-- Button trigger modal -->
<form action="{{ url('program') }}" method="post">
  @csrf
  <div class="row">
    <div class="col-3">
      <input type="text" class="form-control btn-sm" placeholder="name" name="name">
    </div>
    <div class="col-3">
      <input type="text" class="form-control btn-sm" placeholder="cost" name="cost">
    </div>
    <div class="col-2">
      <button type="submit" class="form-control btn btn-danger btn-sm">
        Add Program
      </button>
    </div>
  </div>
</form>
<br><br>
<div class="card">
  <div class="card-body">
    <table id="program" class="table table-striped table-bordered table-sm" style="width:100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Cost</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($programs as $program)
        <tr>
          <td>{{ $program->nama }}</td>
          <td>{{ $program->cost }}</td>
          <td>
            <a class="btn-program-edit" data-toggle="modal" data-nama="{{$program->nama}}" data-cost="{{$program->cost}}"  data-target="#programedit" data-url="{{ url('program/'.$program->id.'')}}" href="#">Edit</a>
            <a class="btn-program-delete" data-toggle="modal" data-target="#programdelete" data-url="{{ url('program/'.$program->id.'')}}" href="#">Delete</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="modal fade" id="programedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-edit modal-content"><br>
        <div class="text-center">
          <h6 class="text-center" id="exampleModalCenterTitle">Program</h6>
          <div class="col-6 offset-1">
            <hr id="hr-edit">
          </div>
        </div>
        <form id="program-edit" class="col-10 offset-1" action="#" method="post">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name_edit" placeholder="name" name="name_edit">
          </div>

          <div class="form-group">
            <label for="cost">Cost</label>
            <input type="cost" class="form-control" id="cost_edit" placeholder="cost" name="cost_edit">
          </div>

          <br><br>

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
  <div class="modal fade" id="programdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="text-center w-100" id="exampleModalLongTitle">Program</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="program-delete" action="#" method="post">
          @method('DELETE')
          @csrf
          <div class="modal-body text-center"> Are you sure want to delete this data?
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn mr-4 btn-secondary btn-ptn" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger btn-ptn">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection