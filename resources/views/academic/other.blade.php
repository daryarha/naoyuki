<!-- use Illuminate\Support\Facades\Storage; -->
@extends('templates.app')
@section('header')
Academic - Other Materi
@endsection
@section('content')
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
<form action="{{ url('other') }}" method="post" enctype="multipart/form-data">
  @csrf
<div class="row">
  <div class="col-4">
    <div class="custom-file">
      <input type="file" name="filename" class="custom-file-input" id="validatedCustomFile" required>
      <label class="custom-file-label" for="validatedCustomFile">Upload materi</label>
      <div class="invalid-feedback">Example invalid custom file feedback</div>    
    </div>
  </div>
  <div class="col-2 ">
    <input type="submit" class="btn btn-danger btn-materi btn-sm" value="Add Materi">
  </div>
</div>
</form> 
<br><br>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <table id="materi" class="table table-sm" style="width:100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($others as $mtr)
        <tr>
          <td>{{$mtr->filename}}</td>
          <td><a href="{{ route('other.download', $mtr->m_id) }}"><i class=" mt-1  mr-3 ml-3 " data-feather="download"></i></a><!-- <a onclick="printJS('\''+{{ storage_path('app/materi/'.$mtr->filename.'') }}+"\'")"><i class="mt-1" data-feather="printer"></i></a> -->
            <a class="btn-other-delete" data-toggle="modal" data-target="#otherdelete" data-url="{{ url('other/'.$mtr->id.'')}}" href="#"><i class="mt-1  mr-3 ml-3 " data-feather="trash"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="modal fade" id="otherdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center w-100" id="exampleModalLongTitle">Other Materi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="other-delete" action="#" method="post">
        @method('DELETE')
        @csrf
        <div class="modal-body text-center"> Are you sure want to delete this data?
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn mr-4 btn-secondary btn-lvg" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger btn-lvg">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection