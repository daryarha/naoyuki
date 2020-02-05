@extends('templates.app')
@section('header')
Marketing & Strategy - Potential Market
@endsection
@section('content')
<!-- Button trigger modal -->

<div class="row">
  <div class="card col-sm-2 color-address">
    <div class="">
      <img src="{{ asset('storage/img/potential.png') }}" class="mt-2" height="35"><br><br>
      <span class="float-right mb-2 text-right">All Potential Market<br>{{ $potentials->count() }} people</span>
    </div>
  </div>
  <div class="card col-sm-2 ml-3">
    <div class="text-danger">
      <img src="{{ asset('storage/img/phone.png') }}" class="mt-2" height="35"><br><br>
      <span class="float-right mb-2 text-right">Total contacted<br>{{ $contacted }} people</span>
    </div>
  </div>
  <div class="card col-sm-2 ml-3">
    <div class="text-danger">
      <img src="{{ asset('storage/img/phone2.png') }}" class="mt-2" height="35"><br><br>
      <span class="float-right mb-2 text-right">Total not contacted<br>{{ $not_contacted }} people</span>
    </div>
  </div>
  <div class="card col-sm-2 ml-3">
    <div class="text-danger">
      <img src="{{ asset('storage/img/result.png') }}" class="mt-2" height="35"><br><br>
      <span class="float-right mb-2 text-right">Result<br>+{{$result_plus}} -{{$result_minus}}</span>
    </div>
  </div>
  <div class="card col-sm-2 ml-3">
    <div class="text-danger">
      <span class="float-left mt-2">Goal Potential Market</span><br><br>
      @if($goal>0) {{$goal/$potentials->count()*100}} @else 0 @endif %
    </div>
  </div>
</div>
<br>
<button type="button" class="btn btn-danger btn-sm color-naoyuki" data-toggle="modal" data-target="#modalPotential">
  Add Potential Market
</button>
<br><br>
<div class="card">
  <div class="card-body">
    <table id="potentialmarket" class="table table-striped table-bordered table-sm" style="width:100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Phone Number</th>
          <th>E-mail</th>
          <th>Address</th>
          <th>Contacted</th>
          <th>Result<span class="invisible">ted</span></th>
          <th>Note</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($potentials as $potential)
        <tr>
          <td>{{ $potential->name }}</td>
          <td>{{ $potential->phone }}</td>
          <td>{{ $potential->email }}</td>
          <td>{{ $potential->address }}</td>
          <td><span class="d-none" id="contacted_val">{{ $potential->contacted }}</span><i class="mt-1 mr-3 ml-3" id="contacted-active"data-feather="check-circle"></i><i class="mt-1" id="contacted-deactive" data-feather="x-circle"></i></td>
          <td><span class="d-none" id="result_val">{{ $potential->result }}</span><i id="result-active" class="mt-1 mr-3 ml-3" data-feather="check-circle"></i><i class="mt-1" id="result-deactive" data-feather="x-circle"></i></td>
          <td>{{ $potential->note}}</td>
          <td>
            <a class="btn-ptn-edit" data-toggle="modal" data-nama="{{$potential->name}}" data-hp="{{$potential->phone}}" data-email="{{$potential->email}}" data-address="{{$potential->address}}" data-contacted="{{$potential->contacted}}" data-result="{{$potential->result}}" data-note="{{$potential->note}}" data-target="#ptnedit" data-url="{{ url('potentialmarket/'.$potential->id.'')}}" href="#">Edit</a>
            <a class="btn-ptn-delete" data-toggle="modal" data-target="#ptndelete" data-url="{{ url('potentialmarket/'.$potential->id.'')}}" href="#">Delete</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="modal fade" id="modalPotential" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-edit modal-content"><br>
            <div class="text-center">
              <h6 class="text-center" id="exampleModalCenterTitle">Potential Market</h6>
              <div class="col-6 offset-1">
                <hr id="hr-edit">
              </div>
            </div>
            <form action="{{url('potentialmarket')}}" method="post" class="col-10 offset-1">
              @csrf
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
              </div>

              <div class="form-group">
                <label for="hp">Phone Number</label>
                <input type="number" class="form-control" id="hp" placeholder="phone number" name="hp">
              </div>

              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" placeholder="email" name="email">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" placeholder="address" name="address"></textarea>
              </div>
              <div class="contacted">
                <label>Contacted</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" checked name="contacted" id="contacted_yes" value="1">
                  <label class="form-check-label" for="contacted_yes">
                    Yes
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="contacted" id="contacted_no" value="0">
                  <label class="form-check-label" for="contacted_no">
                    No
                  </label>
                </div>
              </div>
              <br><br>
              <div class="result">
                <label>Result</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio"checked name="result" id="result_yes" value="1">
                  <label class="form-check-label" for="result_yes">
                    Yes
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="result" id="result_no" value="0">
                  <label class="form-check-label" for="result_no">
                    No
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label for="note">Note</label>
                <textarea class="form-control" id="note" placeholder="note" name="note"></textarea>
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
    </div>
  </div>
  <div class="modal fade" id="ptnedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-edit modal-content"><br>
        <div class="text-center">
          <h6 class="text-center" id="exampleModalCenterTitle">Potential Market</h6>
          <div class="col-6 offset-1">
            <hr id="hr-edit">
          </div>
        </div>
        <form id="ptn-edit" class="col-10 offset-1" action="#" method="post">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="nama" name="nama_edit">
          </div>

          <div class="form-group">
            <label for="hp">Phone Number</label>
            <input type="number" class="form-control" id="hp" placeholder="phone number" name="hp_edit">
          </div>

          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email_edit">
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" placeholder="address" name="address_edit"></textarea>
          </div>
          <div class="contacted">
            <label>Contacted</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="contacted_edit" id="contact_yes" value="1">
              <label class="form-check-label" for="contact_yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="contacted_edit"  id="contact_no" value="0">
              <label class="form-check-label" for="contact_no">
                No
              </label>
            </div>
          </div>
          <br><br>
          <div class="result">
            <label>Result</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="result_edit"  id="result_yes" value="1">
              <label class="form-check-label" for="result_yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="result_edit" id="result_no" value="0">
              <label class="form-check-label" for="result_no">
                No
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="note">Note</label>
            <textarea class="form-control" id="note" placeholder="note" name="note_edit"></textarea>
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
  <div class="modal fade" id="ptndelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="text-center w-100" id="exampleModalLongTitle">Potential Market</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="ptn-delete" action="#" method="post">
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