@extends('templates.app')
@section('header')
Marketing & Strategy - Leverage
@endsection
@section('content')
<!-- Button trigger modal -->
<div class="row">
  <div class="card col-3">
    <div class="">
      <div class="mt-2">Enhancement for this month</div> <br>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner text-center">
          <div class="carousel-item active">  
            <img src="{{ asset('storage/img/school.png') }}" class="mt-2" height="50"><br>
            Institute <br>
            {{$enhancement_institute}}+
          </div>
          <div class="carousel-item">
            <img src="{{ asset('storage/img/people.png') }}" class="mt-2" height="50"><br>
            People <br>
            {{$enhancement_people}}+
          </div>
          <div class="carousel-item">
            <img src="{{ asset('storage/img/media.png') }}" class="mt-2" height="50"><br>
            Media <br>
            {{$enhancement_media}}+
          </div>
          <div class="carousel-item">
            <img src="{{ asset('storage/img/influencer.png') }}" class="mt-2" height="50"><br>
            Influencer <br>
            {{$enhancement_influencer}}+
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <br>
    </div>
  </div>
  <div class="card col-3 ml-3">
    <div class="">
      <div class="mt-2">Visited Information</div> <br>
      <div class="text-center">        
        <img src="{{ asset('storage/img/school.png') }}" class="mt-2" height="50"><br>
        Institute <br>
        @if($visited_institute>0) {{$visited_institute/$leverages_influencer->count()*100}} @else 0 @endif%
      </div><br>
    </div>
  </div>
  <div class="card col-5 ml-3">
    <div class="">
      <div class="mt-2">Coorporate Information</div> <br>
      <div class="text-center">        
        <hr>
        <div class="row">
          <div class="col-2">
            Media
          </div>
          <div class="col-10">
            <div class="progress">
              <div class="progress-bar color-address" role="progressbar" style="width: 
      @if($goal_media>0) {{$goal_media/$leverages_media->count()*100}} @else 0 @endif%;" aria-valuenow="@if($goal_media>0) {{$goal_media/$leverages_media->count()*100}} @else 0 @endif" aria-valuemin="0" aria-valuemax="100">
      @if($goal_media>0) {{$goal_media/$leverages_media->count()*100}} @else 0 @endif%</div>
            </div>
          </div>
        </div> 
        <hr>
        <div class="row">
          <div class="col-2">
            Influencer
          </div>
          <div class="col-10">
            <div class="progress">
              <div class="progress-bar color-address" role="progressbar" style="width: @if($goal_influencer>0) {{$goal_influencer/$leverages_influencer->count()*100}} @else 0 @endif%;" aria-valuenow="@if($goal_influencer>0) {{$goal_influencer/$leverages_influencer->count()*100}} @else 0 @endif" aria-valuemin="0" aria-valuemax="100">@if($goal_influencer>0) {{$goal_influencer/$leverages_influencer->count()*100}} @else 0 @endif%</div>
            </div>
          </div>
        </div> 
      </div><br>
    </div>
  </div>
</div><br>
<button type="button" class="btn btn-danger btn-sm color-naoyuki" data-toggle="modal" data-target="#modalLeverage">
  Add Leverage
</button><br><br><!-- Modal -->
<div class="modal fade" id="modalLeverage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-edit modal-content"><br>
      <div class="text-center">
        <h6 class="text-center" id="exampleModalCenterTitle">Leverage</h6>
        <div class="col-10 offset-1">
          <hr id="hr-edit">
        </div>
      </div>
      <form action="{{url('leverage')}}" method="post" class="col-10 offset-1">
        @csrf
        <select id="leverage_list" class="custom-select" name="leverage_list">
          <option selected>Open this select menu</option>
          <option value="1">Institute</option>
          <option value="2">People</option>
          <option value="3">Media</option>
          <option value="4">Influencer</option>
        </select>
        <div id="institute_item" class="d-none">
          <div class="form-group">
            <label for="institute_name">Institute</label>
            <input type="text" class="form-control" id="institute_name" placeholder="institute" name="institute_name">
          </div>
          <div class="form-group">
            <label for="institute_address">Address</label>
            <input type="text" class="form-control" id="institute_address" placeholder="address" name="institute_address">
          </div>
          <div class="form-group">
            <label for="institute_total_student">Total Student</label>
            <input type="number" class="form-control" id="institute_total_student" placeholder="total student" name="institute_total_student">
          </div>
          <div class="institute_visited">
            <label>Visited</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" checked name="institute_visited" id="institute_visited_yes" value="1">
              <label class="form-check-label" for="institute_visited_yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="institute_visited" id="institute_visited_no" value="0">
              <label class="form-check-label" for="institute_visited_no">
                No
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="institute_date">Date</label>
            <input type="date" class="form-control" id="institute_date" placeholder="date" name="institute_date">
          </div>
          <div class="form-group">
            <label for="institute_note">Note</label>
            <input class="form-control" id="institute_note" placeholder="note" name="institute_note">
          </div>
        </div>
        <div id="people_item" class="d-none">
          <div class="form-group">
            <label for="people_jobdesc">Job Description</label>
            <input type="text" class="form-control" id="people_jobdesc" placeholder="job description" name="people_jobdesc">
          </div>
          <div class="form-group">
            <label for="people_date">Date</label>
            <input type="date" class="form-control" id="people_date" placeholder="date" name="people_date">
          </div>
          <div class="form-group">
            <label for="people_note">Note</label>
            <input class="form-control" id="people_note" placeholder="note" name="people_note">
          </div>
        </div>

        <div id="media_item" class="d-none">
          <div class="form-group">
            <label for="media_name">Name</label>
            <input type="text" class="form-control" id="media_name" placeholder="name" name="media_name">
          </div>

          <div class="form-group">
            <label for="media_address">Address</label>
            <input type="text" class="form-control" id="media_address" placeholder="address" name="media_address">
          </div>

          <div class="form-group">
            <label for="media_total_viewer">Total Viewer</label>
            <input type="number" class="form-control" id="media_total_viewer" placeholder="total viewer" name="media_total_viewer">
          </div>
          <div class="media_coorporate">
            <label>Coorporate</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" checked name="media_coorporate" id="media_coorporate_yes" value="1">
              <label class="form-check-label" for="media_coorporate_yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="media_coorporate" id="media_coorporate_no" value="0">
              <label class="form-check-label" for="media_coorporate_no">
                No
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="media_date">Date</label>
            <input type="date" class="form-control" id="media_date" placeholder="date" name="media_date">
          </div>
          <div class="form-group">
            <label for="media_note">Note</label>
            <input class="form-control" id="media_note" placeholder="note" name="media_note">
          </div>
        </div>
        <div id="influencer_item" class="d-none">
          <div class="form-group">
            <label for="influencer_name">Name</label>
            <input type="text" class="form-control" id="influencer_name" placeholder="name" name="influencer_name">
          </div>

          <div class="form-group">
            <label for="influencer_address">Address</label>
            <input type="text" class="form-control" id="influencer_address" placeholder="address" name="influencer_address">
          </div>

          <div class="form-group">
            <label for="influencer_total_viewer">Total Viewer</label>
            <input type="number" class="form-control" id="influencer_total_viewer" placeholder="total viewer" name="influencer_total_viewer">
          </div>
          <div class="influencer_coorporate">
            <label>Coorporate</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" checked name="influencer_coorporate" id="influencer_coorporate_yes" value="1">
              <label class="form-check-label" for="influencer_coorporate_yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="influencer_coorporate" id="influencer_coorporate_no" value="0">
              <label class="form-check-label" for="influencer_coorporate_no">
                No
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="influencer_date">Date</label>
            <input type="date" class="form-control" id="influencer_date" placeholder="date" name="influencer_date">
          </div>
          <div class="form-group">
            <label for="influencer_note">Note</label>
            <input class="form-control" id="influencer_note" placeholder="note" name="influencer_note">
          </div>
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
<div class="row">
  <div class="col-8">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="institut-tab" data-toggle="tab" href="#institut" role="tab" aria-controls="institut" aria-selected="true">Institute</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="people-tab" data-toggle="tab" href="#people" role="tab" aria-controls="people" aria-selected="false">People</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">Media</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="influencer-tab" data-toggle="tab" href="#influencer" role="tab" aria-controls="influencer" aria-selected="false">Influencer</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="institut" role="tabpanel" aria-labelledby="institut-tab">
    <div class="card">
      <div class="card-body">
        <table id="lvg_institut" class="table table-striped table-bordered table-sm" style="width:100%">
          <thead>
            <tr>
              <th>institute</th>
              <th>Address</th>
              <th>Total Student</th>
              <th>Visited</th>
              <th>Date</th>
              <th>Note</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($leverages_institute as $leverage)
            <tr>
              <td>{{ $leverage->institute }}</td>
              <td>{{ $leverage->address }}</td>
              <td>{{ $leverage->total_student }}</td>
              <td>{{ $leverage->visited }}</td>
              <td>{{ $leverage->date }}</td>
              <td>{{ $leverage->note }}</td>
              <td> <a class="btn-lvg-institute-edit" data-toggle="modal" data-institute="{{$leverage->institute}}" data-address="{{$leverage->address}}" data-total_student="{{$leverage->total_student}}" data-visited="{{$leverage->visited}}" data-date="{{$leverage->date}}" data-note="{{$leverage->note}}" data-target="#lvginstituteedit" data-url="{{ url('leverage/'.$leverage->id.'')}}" href="#">Edit</a>
                <a class="btn-lvg-institute-delete" data-id="{{$leverage->id}}" data-toggle="modal" data-target="#lvginstitutedelete" data-url="{{ url('leverage/delete')}}" href="#">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table> 
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="people" role="tabpanel" aria-labelledby="people-tab"><div class="card">
      <div class="card-body">
        <table id="lvg_people" class="table table-striped table-bordered table-sm" style="width:100%">
          <thead>
            <tr>
              <th>Job Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($leverages_people as $leverage)
            <tr>
              <td>{{ $leverage->jobdesc }}</td>
              <td> <a class="btn-lvg-people-edit" data-toggle="modal" data-jobdesc="{{$leverage->jobdesc}}" data-target="#lvgpeopleedit" data-url="{{ url('leverage/'.$leverage->id.'')}}" href="#">Edit</a>
                <a class="btn-lvg-people-delete" data-id="{{$leverage->id}}" data-toggle="modal" data-select="2" data-target="#lvgpeopledelete" data-url="{{ url('leverage/delete')}}" href="#">Delete</a></td></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab"><div class="card">
      <div class="card-body">
        <table id="lvg_media" class="table table-striped table-bordered table-sm" style="width:100%">
          <thead>
            <tr>
              <th>Name</th>
              <th>Address</th>
              <th>Total Viewer</th>
              <th>Coorporate</th>
              <th>Date</th>
              <th>Note</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($leverages_media as $leverage)
            <tr>
              <td>{{ $leverage->name }}</td>
              <td>{{ $leverage->address }}</td>
              <td>{{ $leverage->total_viewer }}</td>
              <td>{{ $leverage->coorporate }}</td>
              <td>{{ $leverage->date }}</td>
              <td>{{ $leverage->note }}</td>
              <td> <a class="btn-lvg-media-edit" data-toggle="modal" data-name="{{$leverage->name}}" data-address="{{$leverage->address}}" data-total_viewer="{{$leverage->total_viewer}}" data-date="{{$leverage->date}}" data-note="{{$leverage->note}}" data-target="#lvgmediaedit" data-url="{{ url('leverage/'.$leverage->id.'')}}" href="#">Edit</a>
                <a class="btn-lvg-media-delete" data-id="{{$leverage->id}}" data-toggle="modal" data-target="#lvgmediadelete" data-url="{{ url('leverage/delete')}}" href="#">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="influencer" role="tabpanel" aria-labelledby="influencer-tab">
      <div class="card">
        <div class="card-body">
          <table id="lvg_influencer" class="table table-striped table-bordered table-sm" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Total Viewer</th>
                <th>Coorporate</th>
                <th>Date</th>
                <th>Note</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($leverages_influencer as $leverage)
              <tr>
                <td>{{ $leverage->name }}</td>
                <td>{{ $leverage->address }}</td>
                <td>{{ $leverage->total_viewer }}</td>
                <td>{{ $leverage->coorporate }}</td>
                <td>{{ $leverage->date }}</td>
                <td>{{ $leverage->note }}</td>
                <td> <a class="btn-lvg-influencer-edit" data-toggle="modal" data-institute="{{$leverage->name}}" data-address="{{$leverage->address}}" data-total_student="{{$leverage->total_viewer}}" data-coorporate="{{$leverage->coorporate}}" data-date="{{$leverage->date}}" data-note="{{$leverage->note}}" data-target="#lvginfluenceredit" data-url="{{ url('leverage/'.$leverage->id.'')}}" href="#">Edit</a>
                  <a class="btn-lvg-influencer-delete" data-id="{{$leverage->id}}" data-toggle="modal" data-target="#lvginfluencerdelete" data-url="{{ url('leverage/delete')}}" href="#">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="modal fade" id="lvginstituteedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-edit modal-content"><br>
          <div class="text-center">
            <h6 class="text-center" id="exampleModalCenterTitle">Leverage</h6>
            <div class="col-6 offset-1">
              <hr id="hr-edit">
            </div>
          </div>
          <form action="#" id="lvg-institute-edit" method="post" class="col-10 offset-1">
            @method('PUT')
            @csrf
            <input type="hidden" class="form-control" id="select_leverage_edit" value="1" name="select_leverage_edit">
            <div class="form-group">
              <label for="institute_name_edit">Institute</label>
              <input type="text" class="form-control" id="institute_name_edit" placeholder="institute" name="institute_name_edit">
            </div>

            <div class="form-group">
              <label for="institute_address_edit">Address</label>
              <input type="textarea" class="form-control" id="institute_address_edit" placeholder="address" name="institute_address_edit">
            </div>

            <div class="form-group">
              <label for="institute_total_student_edit">Total Student</label>
              <input type="number" class="form-control" id="institute_total_student_edit" placeholder="total student" name="institute_total_student_edit">
            </div>
            <div class="institute_visited_edit">
              <label>Visited</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" checked name="institute_visited_edit" id="institute_visited_yes_edit" value="1">
                <label class="form-check-label" for="institute_visited_yes_edit">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="institute_visited_edit" id="institute_visited_no_edit" value="0">
                <label class="form-check-label" for="institute_visited_no_edit">
                  No
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="institute_date_edit">Date</label>
              <input type="date" class="form-control" id="institute_date_edit" placeholder="date" name="institute_date_edit">
            </div>
            <div class="form-group">
              <label for="institute_note_edit">Note</label>
              <input class="form-control" id="institute_note_edit" placeholder="note" name="institute_note_edit">
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

    <div class="modal fade" id="lvgpeopleedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-edit modal-content"><br>
          <div class="text-center">
            <h6 class="text-center" id="exampleModalCenterTitle">Leverage</h6>
            <div class="col-6 offset-1">
              <hr id="hr-edit">
            </div>
          </div>
          <form action="#" id="lvg-people-edit" method="post" class="col-10 offset-1">
            @method('PUT')
            @csrf
            <input type="hidden" class="form-control" id="select_leverage_edit" value="2" name="select_leverage_edit">
            <div class="form-group">
              <label for="people_jobdesc_edit">Job Description</label>
              <input type="text" class="form-control" id="people_jobdesc_edit" placeholder="job description" name="people_jobdesc_edit">
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

    <div class="modal fade" id="lvgmediaedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-edit modal-content"><br>
          <div class="text-center">
            <h6 class="text-center" id="exampleModalCenterTitle">Leverage</h6>
            <div class="col-6 offset-1">
              <hr id="hr-edit">
            </div>
          </div>
          <form action="#" id="lvg-media-edit" method="post" class="col-10 offset-1">
            @method('PUT')
            @csrf
            <input type="hidden" class="form-control" id="select_leverage_edit" value="3" name="select_leverage_edit">
            <div class="form-group">
              <label for="media_name_edit">Name</label>
              <input type="text" class="form-control" id="media_name_edit" placeholder="name" name="media_name_edit">
            </div>

            <div class="form-group">
              <label for="media_address_edit">Address</label>
              <input type="textarea" class="form-control" id="media_address_edit" placeholder="address" name="media_address_edit">
            </div>

            <div class="form-group">
              <label for="media_total_viewer_edit">Total Viewer</label>
              <input type="number" class="form-control" id="media_total_viewer_edit" placeholder="total student" name="media_total_viewer_edit">
            </div>
            <div class="media_coorporate_edit">
              <label>Coorporate</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" checked name="media_coorporate_edit" id="media_coorporate_yes_edit" value="1">
                <label class="form-check-label" for="media_coorporate_yes_edit">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="media_coorporate_edit" id="media_coorporate_no_edit" value="0">
                <label class="form-check-label" for="media_coorporate_no_edit">
                  No
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="media_date_edit">Date</label>
              <input type="date" class="form-control" id="media_date_edit" placeholder="date" name="media_date_edit">
            </div>
            <div class="form-group">
              <label for="media_note_edit">Note</label>
              <input class="form-control" id="media_note_edit" placeholder="note" name="media_note_edit">
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

     <div class="modal fade" id="lvginfluenceredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-edit modal-content"><br>
          <div class="text-center">
            <h6 class="text-center" id="exampleModalCenterTitle">Leverage</h6>
            <div class="col-6 offset-1">
              <hr id="hr-edit">
            </div>
          </div>
          <form action="#" id="lvg-influencer-edit" method="post" class="col-10 offset-1">
            @method('PUT')
            @csrf
            <input type="hidden" class="form-control" id="select_leverage_edit" value="4" name="select_leverage_edit">
            <div class="form-group">
              <label for="influencer_name_edit">Name</label>
              <input type="text" class="form-control" id="influencer_name_edit" placeholder="name" name="influencer_name_edit">
            </div>

            <div class="form-group">
              <label for="influencer_address_edit">Address</label>
              <input type="textarea" class="form-control" id="influencer_address_edit" placeholder="address" name="influencer_address_edit">
            </div>

            <div class="form-group">
              <label for="influencer_total_viewer_edit">Total Viewer</label>
              <input type="number" class="form-control" id="influencer_total_viewer_edit" placeholder="total student" name="influencer_total_viewer_edit">
            </div>
            <div class="influencer_coorporate_edit">
              <label>Coorporate</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" checked name="influencer_coorporate_edit" id="influencer_coorporate_yes_edit" value="1">
                <label class="form-check-label" for="influencer_coorporate_yes_edit">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="influencer_coorporate_edit" id="influencer_coorporate_no_edit" value="0">
                <label class="form-check-label" for="influencer_coorporate_no_edit">
                  No
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="influencer_date_edit">Date</label>
              <input type="date" class="form-control" id="influencer_date_edit" placeholder="date" name="influencer_date_edit">
            </div>
            <div class="form-group">
              <label for="influencer_note_edit">Note</label>
              <input class="form-control" id="influencer_note_edit" placeholder="note" name="influencer_note_edit">
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
 
    <div class="modal fade" id="lvginstitutedelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="text-center w-100" id="exampleModalLongTitle">Leverage</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="lvg-institute-delete" action="#" method="post">
            @method('DELETE')
            @csrf
            <input type="hidden" class="form-control" id="select_leverage_delete" value="1" name="select_leverage_delete">
            <input type="hidden" class="form-control" id="delete_id" name="delete_id">
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
     <div class="modal fade" id="lvgpeopledelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="text-center w-100" id="exampleModalLongTitle">Leverage</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="lvg-people-delete" action="#" method="post">
            @method('DELETE')
            @csrf
            <input type="hidden" class="form-control" id="select_leverage_delete" value="2" name="select_leverage_delete">
            <input type="hidden" class="form-control" id="delete_id" name="delete_id">
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
     <div class="modal fade" id="lvgmediadelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="text-center w-100" id="exampleModalLongTitle">Leverage</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="lvg-media-delete" action="#" method="post">
            @method('DELETE')
            @csrf
            <input type="hidden" class="form-control" id="select_leverage_delete" value="3" name="select_leverage_delete">
            <input type="hidden" class="form-control" id="delete_id" name="delete_id">
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
     <div class="modal fade" id="lvginfluencerdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="text-center w-100" id="exampleModalLongTitle">Leverage</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="lvg-influencer-delete" action="#" method="post">
            @method('DELETE')
            @csrf
            <input type="hidden" class="form-control" id="select_leverage_delete" value="4" name="select_leverage_delete">
            <input type="hidden" class="form-control" id="delete_id" name="delete_id">
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
  </div>
</div>
  <div class="col-4">
    <div class="card">
      <div class="card-body">
        Total leverage <br><br>
        <div class="card color-address" style="background: url('{{ asset('storage/img/users-solid.svg') }}') right center no-repeat;
          background-size: 100px 50px;
          background-color: rgba(200,86,86,0.7);">
          <div class="overlay-bg-red">
            <div class="p-2 ml-4">People </div>
            <div class="ml-5 pb-3">{{ $leverages_people->count() }}</div>
          </div>
        </div><br>
        <div class="card color-address" style="background: url('{{ asset('storage/img/school-solid.svg') }}') right center no-repeat;
          background-size: 100px 50px;
          background-color: rgba(200,86,86,0.7);">
          <div class="overlay-bg-red">
            <div class="p-2 ml-4">Institute </div>
            <div class="ml-5 pb-3">{{ $leverages_institute->count() }}</div>
          </div>
        </div><br>
        <div class="card color-address" style="background: url('{{ asset('storage/img/bullhorn-solid.svg') }}') right center no-repeat;
          background-size: 100px 50px;
          background-color: rgba(200,86,86,0.7);">
          <div class="overlay-bg-red">
            <div class="p-2 ml-4">Media </div>
            <div class="ml-5 pb-3">{{ $leverages_media->count() }}</div>
          </div>
        </div><br>
        <div class="card color-address" style="background: url('{{ asset('storage/img/rocket-solid.svg') }}') right center no-repeat;
          background-size: 100px 50px;
          background-color: rgba(200,86,86,0.7);">
          <div class="overlay-bg-red">
            <div class="p-2 ml-4">Influencer </div>
            <div class="ml-5 pb-3">{{ $leverages_influencer->count() }}</div>
          </div>
        </div><br>
      </div>
    </div><br>  <br>  
  </div>
</div>

    @endsection