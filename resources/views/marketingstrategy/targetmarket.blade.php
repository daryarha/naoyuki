@extends('templates.app')
@section('header')
Marketing & Strategy - Target Market
@endsection
@section('content')
<!-- Button trigger modal -->
<div class="row">
  <div class="card col-7">
    <div class="card-body">
      <form class="form-row align-items-center" action="{{ url('funneling') }}" method="post">
        @csrf
        <div class="col-3">
          <label class="sr-only" for="inlineFormInput">Total Target Market</label>
          <input type="number" name="total_people" required class="form-control form-control-sm" id="total_tm" placeholder="Total Target Market">
        </div>

        <div class="col-2">
          <label class="sr-only" for="inlineFormInput">(%)</label>
          <input type="number" name="brand" required class="form-control form-control-sm" id="percent1" placeholder="(%)">
        </div>

        <div class="col-2">
          <label class="sr-only" for="inlineFormInput">(%)</label>
          <input type="number" name="market" required class="form-control form-control-sm" id="percent2" placeholder="(%)">
        </div>

        <div class="col-2">
          <label class="sr-only" for="inlineFormInput">(%)</label>
          <input type="number" name="selling" required class="form-control form-control-sm" id="percent3" placeholder="(%)">
        </div>
        <div class="col-2 ml-sm-3">
          <button type="submit" class="btn form-control btn-danger btn-sm color-naoyuki">save</button>
        </div>
      </form>
    </div>
  </div>
  <div class="card col-4 p-0 ml-5">
    <div class="card-body color-address">
      Target Market <br>
      <span class="ml-3">All shown here.</span>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="card col-7">
    <div class="card-body">
      <div class="text-center">Funneling</div>
      <br>
      <div class="row">
        <div class="col-2 ">Percent</div>
        <div class="col-8">
          <div class="row funneling">
            <button type="button" class="btn form-control btn-distribution btn-sm col-9"></button>
            <span class="col-3 mt-2">Distribution</span>
          </div>
        </div>
        <div class="col-2">People</div>
      </div> 
      <br>
      <div class="row">
        <div class="col-2 mt-n4 fontpercent" id="p1"></div>
        <div class="col-8">
          <div class="row funneling">
            <button type="button" class="btn form-control btn-sm col-7 offset-1 btn-brand-activation"></button>
            <span class="col-3 mt-2">Brand Activation</span>
          </div>
        </div>
        <div class="col-2 mt-n4 fontpercent" id="pl1"></div>
      </div>
      <br>
      <div class="row">
        <div class="col-2 mt-n4 fontpercent" id="p2"></div>
        <div class="col-8">
          <div class="row funneling">
            <button type="button" class="btn form-control btn-sm col-5 offset-2 btn-marketing-communication"></button>
            <span class="col-5 mt-2">Marketing Communication</span>
          </div>
        </div>
        <div class="col-2 mt-n4 fontpercent" id="pl2"></div>
      </div>
      <br>
      <div class="row">
        <div class="col-2 mt-n4 fontpercent" id="p3"></div>
        <div class="col-8">
          <div class="row funneling">
            <button type="button" class="btn form-control btn-sm col-3 offset-3 btn-selling-optimation"></button>
            <span class="col-5 mt-2">Selling Optimation</span>
          </div>
        </div>
        <div class="col-2 mt-n4 fontpercent" id="pl3"></div>
      </div>
      <br>
      <div class="row">
        <div class="col-2 mt-n4"></div>
        <div class="col-8 ">
          <hr class="border-hr">
        </div>
        <div class="col-2 mt-1 fontpercent" id="tm">8000</div>
      </div>

    </div>
  </div>
  <div class="card col-4 ml-5">
    <div class="card-body pre-scrollable"> 
      Detail Funneling <br> <br>  
      @foreach($funnelings as $funnel)
      <a class="btn color-address btn-funnel" href="#" data-toggle="modal" data-title_modal="Funneling" data-target="#modalFunnel" data-created="{{ \Carbon\Carbon::parse($funnel->created_at)->format('l, d-m-Y')}}" data-total_people="{{ $funnel->total_people }}" data-brand="{{ $funnel->brand }}" data-market="{{ $funnel->market }}" data-selling="{{ $funnel->selling }}"> {{ \Carbon\Carbon::parse($funnel->created_at)->format('l, d-m-Y')}}</a> <a data-url="{{ url('funneling/'.$funnel->id.'') }}"  href="#" data-toggle="modal" data-title_modal="Funneling" data-target="#tgtdelete"  class="btn-tgt-delete text-danger">Delete </a><br> <br> 
      @endforeach  
    </div> 
  </div>
</div>
<br>

<div class="row">
  <div class="card col-sm-2">
    <div class="text-danger">
      <span class="float-left mt-2">Average<br>Age</span>
      <span class="float-right mb-2"><i class="far fa-address-card fa-3x border-address mt-2"></i><br><br>@if($age) {{$age->avg('age')}} @else - @endif</span>
    </div>
  </div>
  <div class="card col-sm-2 ml-3">
    <div class="text-danger">
      <span class="float-left mt-2">Most<br>Education</span>
      <span class="float-right mb-2"><i class="fas fa-graduation-cap fa-3x border-address mt-2"></i><br><br>@if($education) {{$education->education}} @else - @endif</span>
    </div>
  </div>
  <div class="card col-sm-2 ml-3">
    <div class="text-danger">
      <span class="float-left mt-2">Most<br>Institution</span>
      <span class="float-right mb-2"><i class="fas fa-university fa-3x border-address mt-2"></i><br><br>@if($institution) {{$institution->institution}} @else - @endif</span>
    </div>
  </div>
  <div class="card col-sm-2 ml-3">
    <div class="text-danger">
      <span class="float-left mt-2">Most<br>Job</span>
      <span class="float-right mb-2"><i class="fas fa-users fa-3x border-address mt-2"></i><br><br>@if($job) {{$job->job}} @else - @endif</span>
    </div>
  </div>
  <div class="card col-sm-2 ml-3">
    <div class="text-danger">
      <span class="float-left mt-2">Gender</span><br><br>
      <span class="float-left"><i class="fas fa-male fa-3x text-secondary mt-1"></i>@if($gender_male) {{$gender_male}} @else - @endif</span>
      <span class="float-right"><i class="fas fa-female fa-3x border-address mt-1"></i>@if($gender_female) {{$gender_female}} @else - @endif</span>
    </div>
  </div>
</div>
<br>
<button type="button" class="btn btn-danger color-naoyuki btn-sm" data-toggle="modal" data-target="#modalTarget">
  Add Target Market
</button>
<br><br>
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table id="targetmarket" class="table table-striped table-bordered table-sm">
        <thead>
          <tr>
            <th>Name</th>
            <th>Nickname</th>
            <th>Gender</th>
            <th>Birth Date</th>
            <th>Origin City</th>
            <th>Domicile</th>
            <th>Job</th>
            <th>Education</th>
            <th>Institution</th>
            <th>Religion</th>
            <th>Phone Number</th>
            <th>E-mail</th>
            <th>ID Line</th>
            <th>ID Instagram</th>
            <th>Note</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($targets as $target)
          <tr>
            <td>{{ $target->name }}</td>
            <td>{{ $target->nickname }}</td>
            <td>{{ $target->gender }}</td>
            <td>{{ $target->birth_date }}</td>
            <td>{{ $target->origin_city }}</td>
            <td>{{ $target->domicile }}</td>
            <td>{{ $target->job }}</td>
            <td>{{ $target->education }}</td>
            <td>{{ $target->institution }}</td>
            <td>{{ $target->religion }}</td>
            <td>{{ $target->phone }}</td>
            <td>{{ $target->email }}</td>
            <td>{{ $target->id_line }}</td>
            <td>{{ $target->id_instagram }}</td>
            <td>{{ $target->note }}</td>
            <td>
              <a class="btn-tgt-edit" data-toggle="modal" data-nama="{{$target->name}}" data-nickname="{{$target->nickname}}" data-gender="{{$target->gender}}" data-birth="{{$target->birth_date}}" data-city="{{$target->origin_city}}" data-domicile="{{$target->domicile}}" data-job="{{$target->job}}" data-education="{{$target->education}}" data-institution="{{$target->institution}}" data-religion="{{$target->religion}}" data-hp="{{$target->phone}}" data-email="{{$target->email}}" data-line="{{$target->id_line}}" data-instagram ="{{$target->id_instagram}}" data-note="{{$target->note}}" data-target="#tgtedit" data-url="{{ url('targetmarket/'.$target->id.'')}}" href="#">Edit</a>
              <a class="btn-tgt-delete" data-toggle="modal" data-title_modal="Target Market" data-target="#tgtdelete" data-url="{{ url('targetmarket/'.$target->id.'')}}" href="#">Delete</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalTarget" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content"><br>
        <div class="text-center">
          <h6 class="text-center" id="exampleModalCenterTitle">Target Market</h6>
          <div class="col-6 offset-1">
            <hr id="hr-edit">
          </div>
        </div>
        <form action="{{url('targetmarket')}}" method="post" class="col-10 offset-1">
          @csrf
          <div class="form-group">
            <label for="nama">Name</label>
            <input type="text" class="form-control" id="nama" placeholder="e.g. Budi Santoso" name="nama">
          </div>
          <div class="form-group">
            <label for="nickname">Nickname</label>
            <input type="text" class="form-control" id="nickname" placeholder="e.g. Budi" name="nickname">
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="birth_date">Birth Date</label>
                <input type="date" class="form-control" id="birth_date" placeholder="birth date" name="birth_date">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="gender">Gender</label><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" checked name="gender" id="gender" value="1">
                  <label class="form-check-label" for="gender">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="gender2" value="0">
                  <label class="form-check-label" for="gender2">Female</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="origin_city">Origin City</label>
            <input type="text" class="form-control" id="origin_city" placeholder="e.g. Malang" name="origin_city">
          </div>

          <div class="form-group">
            <label for="domicile">Domicile</label>
            <input type="text" class="form-control" id="domicile" placeholder="e.g. Malang" name="domicile">
          </div>

          <div class="form-group">
            <label for="job">Job</label>
            <input type="text" class="form-control" id="job" placeholder="e.g. Student" name="job">
          </div>

          <div class="form-group">
            <label for="education">Education</label>
            <input type="text" class="form-control" id="education" placeholder="e.g. SMA" name="education">
          </div>

          <div class="form-group">
            <label for="institution">Institution</label>
            <input type="text" class="form-control" id="institution" placeholder="e.g. SMAN 3 Malang" name="institution">
          </div>

          <div class="form-group">
            <label for="religion">Religion</label>
            <input type="text" class="form-control" id="religion" placeholder="e.g. Islam" name="religion">
          </div>


          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" placeholder="e.g. 08123456789" name="phone">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="e.g. email@mail.com" name="email">
          </div>


          <div class="form-group">
            <label for="id_line">ID Line</label>
            <input type="text" class="form-control" id="id_line" placeholder="e.g. budi_santoso" name="id_line">
          </div>


          <div class="form-group">
            <label for="id_instagram">ID Instagram</label>
            <input type="text" class="form-control" id="id_instagram" placeholder="e.g. budisantoso" name="id_instagram">
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
  


  <div class="modal fade" id="modalFunnel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content"><br>
        <div class="text-center">
          <h6 class="text-center" id="exampleModalCenterTitle">Target Market</h6>
          <div class="col-6 offset-3 text-center">
            <hr class="hr-edit">
            Added on: <span id="date_created"></span><br><br>
          </div>
        </div>
        <div class="container">
          <div class="card col-10 offset-1">
            <div class="card-body">
              <div class="text-center">Funneling</div>
              <br>
              <div class="row">
                <div class="col-2 ">Percent</div>
                <div class="col-8">
                  <div class="row funneling">
                    <button type="button" class="btn form-control btn-distribution btn-sm col-9"></button>
                    <span class="col-3 mt-2">Distribution</span>
                  </div>
                </div>
                <div class="col-2">People</div>
              </div> 
              <br>
              <div class="row">
                <div class="col-2 mt-n4 fontpercent" id="p1-view"></div>
                <div class="col-8">
                  <div class="row funneling">
                    <button type="button" class="btn form-control btn-sm col-7 offset-1 btn-brand-activation"></button>
                    <span class="col-3 mt-2">Brand Activation</span>
                  </div>
                </div>
                <div class="col-2 mt-n4 fontpercent" id="pl1-view"></div>
              </div>
              <br>
              <div class="row">
                <div class="col-2 mt-n4 fontpercent" id="p2-view"></div>
                <div class="col-8">
                  <div class="row funneling">
                    <button type="button" class="btn form-control btn-sm col-5 offset-2 btn-marketing-communication"></button>
                    <span class="col-5 mt-2">Marketing Communication</span>
                  </div>
                </div>
                <div class="col-2 mt-n4 fontpercent" id="pl2-view"></div>
              </div>
              <br>
              <div class="row">
                <div class="col-2 mt-n4 fontpercent" id="p3-view"></div>
                <div class="col-8">
                  <div class="row funneling">
                    <button type="button" class="btn form-control btn-sm col-3 offset-3 btn-selling-optimation"></button>
                    <span class="col-5 mt-2">Selling Optimation</span>
                  </div>
                </div>
                <div class="col-2 mt-n4 fontpercent" id="pl3-view"></div>
              </div>
              <br>
              <div class="row">
                <div class="col-2 mt-n4"></div>
                <div class="col-8 ">
                  <hr class="border-hr">
                </div>
                <div class="col-2 mt-1 fontpercent" id="tm">8000</div>
              </div>

            </div>
          </div>
        </div>
        <br>
        <div class="text-center">
          <!-- <button type="button" class="btn btn-secondary form-control col-3 btn-sm" data-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-secondary form-control col-3 btn-sm" data-dismiss="modal">OK</button>
        </div>
        <br>
      </div>
    </div>
  </div>



  <div class="modal fade" id="tgtdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="text-center w-100" id="title-modal">Target Market</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="tgt-delete" action="#" method="post">
          @method('DELETE')
          @csrf
          <div class="modal-body text-center"> Are you sure want to delete this data?
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn mr-4 btn-secondary btn-tm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger btn-tm">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <div class="modal fade" id="tgtedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-edit modal-content">
        <div class="text-center">
          <h6 class="text-center" id="exampleModalCenterTitle">Target Market</h6>
          <div class="col-6 offset-1">
            <hr id="hr-edit">
          </div>
        </div>
        <form action="#" class="col-10 offset-1" id="tgt-edit" method="post">
          @method('PUT')
          @csrf

          <div class="form-group">
            <label for="nama">Name</label>
            <input type="text" class="form-control" id="nama_edit" placeholder="nama" name="nama_edit">
          </div>
          <div class="form-group">
            <label for="nickname">Nickname</label>
            <input type="text" class="form-control" id="nickname_edit" placeholder="nickname" name="nickname_edit">
          </div>
          <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" class="form-control" id="birth_date_edit" placeholder="birth date" name="birth_date_edit">
          </div>
          <div class="form-group">
            <label for="origin_city">Origin City</label>
            <input type="text" class="form-control" id="origin_city_edit" placeholder="origin city" name="origin_city_edit">
          </div>

          <div class="form-group">
            <label for="domicile">Domicile</label>
            <input type="text" class="form-control" id="domicile_edit" placeholder="domicile" name="domicile_edit">
          </div>

          <div class="form-group">
            <label for="job">Job</label>
            <input type="text" class="form-control" id="job_edit" placeholder="job" name="job_edit">
          </div>

          <div class="form-group">
            <label for="education">Education</label>
            <input type="text" class="form-control" id="education_edit" placeholder="education" name="education_edit">
          </div>

          <div class="form-group">
            <label for="institution">Institution</label>
            <input type="text" class="form-control" id="institution_edit" placeholder="institution" name="institution_edit">
          </div>

          <div class="form-group">
            <label for="religion">Religion</label>
            <input type="text" class="form-control" id="religion_edit" placeholder="religion" name="religion_edit">
          </div>

          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone_edit" placeholder="phone number" name="phone_edit">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email_edit" placeholder="email" name="email_edit">
          </div>


          <div class="form-group">
            <label for="id_line">ID Line</label>
            <input type="text" class="form-control" id="id_line_edit" placeholder="id line" name="id_line_edit">
          </div>


          <div class="form-group">
            <label for="id_instagram">ID Instagram</label>
            <input type="text" class="form-control" id="id_instagram_edit" placeholder="id instagram" name="id_instagram_edit">
          </div>

          <div class="form-group">
            <label for="note">Note</label>
            <textarea class="form-control" id="note" placeholder="note_edit" name="note_edit"></textarea>
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
  @endsection