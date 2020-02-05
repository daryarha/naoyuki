@extends('templates.app')
@section('header')
Finance - Cash Flow
@endsection
@section('content')
  <br>
  <div class="clearfix">    
    <div class="float-right">
      <a class="btn btn-danger btn-sm" href="{{ url('cashflow/monthly')}}">Monthly Report</a>
      <a class="btn btn-danger btn-sm" href="{{ url('cashflow/annual')}}">Annual Report</a>
    </div>
  </div>
<br>
<form action="{{ url('cashflow') }}" method="post">
  @csrf
  <div class="form-row">
    <div class="col-3">
      <input type="text" class="form-control btn-sm" placeholder="Transaction" name="transaction">
    </div>
    <div class="col-2">
      <input type="number" class="form-control btn-sm" placeholder="Nominal" name="nominal">
    </div>
    <div class="col-2">
      <select class="form-control btn-sm" required name="d_k">
        <option value="1">Debet</option>
        <option value="0" selected>Kredit</option>
      </select>
    </div>
    <div class="col-3">
      <select class="form-control btn-sm" required name="category">
        <option disabled selected>Category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-2">
      <!-- Button trigger modal -->
      <button type="submit" class="btn btn-danger btn-sm">
        Add Cash Flow
      </button>
    </div>
  </div>
</form>
<br><br>
<div class="card">
  <div class="card-body">
    <table id="cashflow" class="table table-striped table-bordered table-sm" style="width:100%">
      <thead>
        <tr>
          <th>Date</th>
          <th>Transaction</th>
          <th>Nominal</th>
          <th>D/K</th>
          <th>Category</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cashflows as $cashflow)
        <tr>
          <td>{{ $cashflow->date }}</td>
          <td>{{ $cashflow->transaction }}</td>
          <td>{{ $cashflow->nominal }}</td>
          <td>@if ($cashflow->d_k==0) Kredit @else Debet @endif</td>
          <td>{{ $cashflow->category->name }}</td>
          <td><a class="btn-cashflow-edit" data-url="{{url('cashflow/'.$cashflow->id.'')}}" data-toggle="modal" data-date="{{ $cashflow->date}}" data-transaction="{{ $cashflow->transaction}}" data-nominal="{{$cashflow->nominal}}" data-d_k="{{$cashflow->d_k}}" data-category="{{ $cashflow->id_category }}" data-target="#modalCashflow" href="#">Edit </a><a class="btn-cashflow-delete" data-toggle="modal" data-target="#cashflowdelete" data-url="{{ url('cashflow/'.$cashflow->id.'')}}" href="#">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="modal fade" id="modalCashflow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-edit modal-content"><br>
          <div class="text-center">
            <h6 class="text-center" id="exampleModalCenterTitle">Cash Flow</h6>
            <div class="col-6 offset-1">
              <hr id="hr-edit">
            </div>
          </div>
          <form action="#" id="cashflow-edit" class="col-10 offset-1" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="transaction">Transaction</label>
              <input type="text" class="form-control" id="transaction" placeholder="transaction" name="transaction_edit">
            </div>

            <div class="form-group">
              <label for="nominal">Nominal</label>
              <input type="number" class="form-control" id="nominal" placeholder="nominal" name="nominal_edit">
            </div>
              <label for="D_K">D/K</label>
            <select class="form-control btn-sm" required name="d_k_edit">
              <option selected value="1">Debet</option>
              <option value="0">Kredit</option>
            </select> 
            <br>
              <label for="category">Category</label>
            <select class="form-control btn-sm" required name="category_edit">
              <option disabled selected>Category</option>
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
            <br>          
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
 <div class="modal fade" id="cashflowdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center w-100" id="exampleModalLongTitle">Cash Flow</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="cashflow-delete" method="post">
        @method('DELETE')
        @csrf
        <div class="modal-body text-center"> Are you sure want to delete this data?
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn mr-4 btn-secondary btn-cashflow" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger btn-cashflow">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection