@extends('templates.app')
@section('header')
Finance - Payment
@endsection
@section('content')
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalPayment">
  Add Payment
</button>

<div class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-edit modal-content"><br>
      <div class="text-center">
        <h6 class="text-center" id="exampleModalCenterTitle">Payment</h6>
        <div class="col-6 offset-1">
          <hr id="hr-edit">
        </div>
      </div>
      <form id="payment" class="col-10 offset-1" action="{{ url('payment') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="nama">Nama</label>
          <select  class="custom-select" name="studentnama">
            <option disabled selected>Open this select menu</option>
            @foreach($students as $student)
            <option value="{{$student->id}}">{{$student->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="program">Program</label>
          <div class="row after-add-program">
            <div class="col-10">
              <div class="form-group">
                <select class="form-control btn-sm" name="programlist[]">
                  <option disabled selected>Choose program</option>
                  @foreach($programs as $program)
                  <option value="{{$program->id}}">{{$program->nama}}</option>
                  @endforeach
                </select>

              </div>
            </div>
            <div class="col-2 text-left p-0">
              <button type="button" class="btn btn-primary btn-sm btn-add-program">add
              </button>
            </div>
          </div>
          <div class="copy-input-program d-none">
            <div class="row control-program">
              <div class="col-10">
                <div class="form-group">
                  <select class="form-control btn-sm" name="programlist[]">
                    <option disabled selected>Choose program</option>
                    @foreach($programs as $program)
                    <option value="{{$program->id}}">{{$program->nama}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-2 text-left p-0">
                <button type="button" class="btn btn-danger btn-sm btn-remove-program">remove
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="totalpayment">Total Payment</label>
          <div class="row after-add-payment">
            <div class="col-10">
             <div class="form-group">
              <input type="text" class="form-control"  placeholder="total payment" name="totalpayment[]">

              <input type="date" class="form-control"  placeholder="date payment" name="datepayment[]">

              <input type="text" class="form-control"  placeholder="eta payment" name="etapayment[]" value="0">

            </div>

          </div>
          <div class="col-2 text-left p-0">
            <button type="button" class="btn btn-primary btn-sm btn-add-payment">add
            </button>
          </div>
        </div>
        <div class="copy-input-payment d-none">
          <div class="row control-payment">
            <div class="col-10">
             <div class="form-group">
              <input type="text" class="form-control"  placeholder="total payment" name="totalpayment[]">

              <input type="date" class="form-control"  placeholder="date payment" name="datepayment[]">
              <input type="text" class="form-control"  placeholder="eta payment" name="etapayment[]">
            </div>
          </div>
          <div class="col-2 text-left p-0">
            <button type="button" class="btn btn-danger btn-sm btn-remove-payment">remove
            </button>
          </div>
        </div>
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

<br><br>
<div class="card">
  <div class="card-body">
    <table id="paymenttable" class="table table-striped table-bordered table-sm" style="width:100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Program</th>
          <th>Total Cost</th>
          <th>Total Payment</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $idx => $student)
        <tr>
          <td>{{ $student->name}}</td>
          <td>
            @foreach($student->programs as $program)
            <div class="card text-white bg-secondary mb-1">
              <p class="card-text ml-2">  {{ $program->nama}} Rp.  {{ number_format($program->cost,0)}}</p>
            </div>
            @endforeach
          </td>
          <td>
            Rp. {{ number_format($student->programs->sum('cost'),0)}}
          </td>
          <td>

            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDetailPayment{{$idx}}">
              Detail
            </button>
            <div class="modal fade" id="modalDetailPayment{{$idx}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-edit modal-content"><br>
                  <div class="text-center">
                    <h6 class="text-center" id="exampleModalCenterTitle">Detail Payment</h6>
                    <div class="col-6 offset-1">
                      <hr id="hr-edit">
                    </div>
                  </div>
                  @foreach($student->payments as $payment)
                  Payment Date =  {{ $payment->date}}
                  <br>
                  ETA = {{ $payment->eta}}
                  <br>
                  Total Payment = {{ number_format($payment->sum_cost, 0)}}
                  @endforeach
                  <br>
                  Sum Payment = {{number_format($student->payments->sum('sum_cost'),0)}}

                  <br>
                  <div class="col-2 offset-9">
                    <button type="button" class="btn btn-secondary form-control btn-sm" data-dismiss="modal">OK</button>
                  </div>
                  <br>
                </div>
              </div>
            </div>
          </td>
          <td>
            @if($student->programs->sum('cost')-$student->payments->sum('sum_cost') > 0)
            Not Yet <br>
            Rp. -{{number_format(($student->programs->sum('cost')-$student->payments->sum('sum_cost')),0)}}
            @else
            Paid Off
            @endif
          </td>
          <td><a class="btn-payment-edit" data-url="" data-toggle="modal" data-date="" data-transaction="" data-nominal="" data-d_k="" data-category="" data-target="#paymentedit{{$idx}}" href="#">Edit </a><a class="btn-payment-delete" data-toggle="modal" data-target="#paymentdelete" data-url="{{ url('payment/'.$student->id.'')}}" href="#">Delete</a></td>
        </tr>
        <div class="modal fade" id="paymentedit{{$idx}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-edit modal-content"><br>
              <div class="text-center">
                <h6 class="text-center" id="exampleModalCenterTitle">Payment</h6>
                <div class="col-6 offset-1">
                  <hr id="hr-edit">
                </div>
              </div>
              <form id="payment-edit" class="col-10 offset-1" action="{{url('payment/'.$student->id.'')}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="nama_edit">Nama</label>
                  <input hidden type="text" class="form-control"   name="student_edit" value="{{$student->id}}" >
                  <input  readonly type="text" class="form-control" value="{{$student->name}}" >
                </div>












                <div class="form-group">
                  <label for="program_edit">Program</label>
                  @foreach($student->programs as $program)
                  <div class="row control-program-edit">
                    <div class="col-10">
                      <div class="form-group">
                        <select class="form-control btn-sm" name="programlist_edit[]">
                          <option disabled selected>Choose program</option>
                          @foreach($programs as $idprogram)
                          <option 
                          @if ($program->id==$idprogram->id)
                          selected
                          @endif value="{{$idprogram->id}}">{{$idprogram->nama}}</option>
                          @endforeach
                        </select>

                      </div>
                    </div>

                    <div class="col-2 text-left p-0">
                     <button type="button" class="btn btn-danger btn-sm btn-remove-program-edit">remove
                     </button>
                   </div>
                 </div>
                 @endforeach
                 <div class="row after-add-program-edit">
                  <div class="col-10">
                    <div class="form-group">
                      <select class="form-control btn-sm" name="programlist_edit[]">
                        <option disabled selected>Choose program</option>
                        @foreach($programs as $program)
                        <option value="{{$program->id}}">{{$program->nama}}</option>
                        @endforeach
                      </select>

                    </div>
                  </div>
                  <div class="col-2 text-left p-0">
                    <button type="button" class="btn btn-primary btn-sm btn-add-program-edit">add
                    </button>
                  </div>
                </div>
                <div class="copy-input-program-edit d-none">
                  <div class="row control-program-edit">
                    <div class="col-10">
                      <div class="form-group">
                        <select class="form-control btn-sm" name="programlist_edit[]">
                          <option disabled selected>Choose program</option>
                          @foreach($programs as $program)
                          <option value="{{$program->id}}">{{$program->nama}}</option>
                          @endforeach

                        </select>
                      </div>
                    </div>
                    <div class="col-2 text-left p-0">
                      <button type="button" class="btn btn-danger btn-sm btn-remove-program-edit">remove
                      </button>
                    </div>
                  </div>
                </div>
              </div>





















              <div class="form-group">
                <label for="totalpayment_edit">Total Payment</label>
                @foreach($student->payments as $payment)
                <div class="row control-payment-edit">
                  
                  <div class="col-10">
                    <div class="form-group">
                      <input type="text" class="form-control"  name="totalpayment_edit[]" value="{{$payment->sum_cost}}">
                      <input type="date" class="form-control"  name="datepayment_edit[]" value="{{$payment->date}}">
                      <input type="text" class="form-control" name="etapayment_edit[]" value="{{$payment->eta}}">
                    </div>
                  </div>
                  <div class="col-2 text-left p-0">
                    <button type="button" class="btn btn-danger btn-sm btn-remove-payment-edit">remove
                    </button>
                  </div>
                  
                </div>
                @endforeach
              </div>
              <div class="row after-add-payment-edit">
                <div class="col-10">
                  <div class="form-group">
                    <input type="text" class="form-control"   name="totalpayment_edit[]" >
                    <input type="date" class="form-control"   name="datepayment_edit[]" >
                    <input type="text" class="form-control"  name="etapayment_edit[]">
                  </div>
                </div>
                <div class="col-2 text-left p-0">
                  <button type="button" class="btn btn-primary btn-sm btn-add-payment-edit">add
                  </button>
                </div>
              </div>
              <div class="copy-input-payment-edit d-none">
                <div class="row control-payment-edit">
                  <div class="col-10">
                    <div class="form-group" >
                      <input type="text" class="form-control" name="totalpayment_edit[]" >
                      <input type="date" class="form-control"   name="datepayment_edit[]" >
                      <input type="text" class="form-control"   name="etapayment_edit[]"  >
                    </div>
                  </div>
                  <div class="col-2 text-left p-0">
                    <button type="button" class="btn btn-danger btn-sm btn-remove-payment-edit">remove
                    </button>
                  </div>
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

      @endforeach
    </tbody>
  </table>

</div>
</div>

<div class="modal fade" id="paymentdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center w-100" id="exampleModalLongTitle">Payment </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="payment-delete" action="#" method="post">
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