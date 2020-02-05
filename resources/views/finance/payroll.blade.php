@extends('templates.app')
@section('header')
Finance - Payroll
@endsection
@section('content')
<div class="row">
	<div class="card col-sm-2">
		<div class="text-danger">
			<span class="float-left mt-2">Income</span>
			<span class="float-right mb-2"><i class="far fa-address-card fa-3x border-address mt-2"></i><br><br>Rp. {{number_format($payment->sum('sum_cost')-$payroll->sum('payroll'),0)}}</span>
		</div>
	</div>
</div>
<br>
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalPayroll">
	Add Payroll
</button>
<br><br>

<nav>
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> Staff
		</a>
		<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Teacher</a>

	</div>
</nav>
<div class="tab-content" id="nav-tabContent">
	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="payrollstaff" class="table table-striped table-bordered table-sm">
						
						<thead>
							<tr>
								<th>Date</th>
								<th>Name</th>
								<th>Position</th>
								<th>Total Work Day</th>
								<th>Score</th>
								<th>Payroll</th>
								<th>Status</th>
								<th>Note</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($payrollStaffs as $payroll)
							<tr>
								<td>{{$payroll->date}}</td>
								<td>{{$payroll->hr->name}}</td>
								<td>{{$payroll->hr->position}}</td>
								<td>{{$payroll->extra->total_work}}</td>
								<td>{{$payroll->score}}</td>
								<td>{{number_format($payroll->payroll,0)}}</td>
								<td>
									@if($payroll->status==1)
										Paid
									@elseif($payroll->status==2)
										Not Yet
									@endif
								</td>
								<td>{{$payroll->note}}</td>
								<td>
									<a class="btn-proll-edit" data-toggle="modal" data-id_hr="{{$payroll->id_hr}}" data-score="{{$payroll->score}}" data-date="{{$payroll->date}}" data-note="{{$payroll->note}}" data-status="{{$payroll->status}}" data-total_work_day="{{$payroll->extra->total_work}}" data-position="{{$payroll->hr->position}}" data-target="#prolledit" data-url="{{url('payroll/'.$payroll->id.'')}}" href="#">Edit</a>
									<a class="btn-proll-delete" data-toggle="modal" data-target="#prolldelete" data-url="{{url('payroll/'.$payroll->id.'')}}" href="#">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>


	</div>


	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="payrollteacher" class="table table-striped table-bordered table-sm">
						<thead>
							<tr>
								<th>Time</th>
								<th>Name</th>
								<th>Position</th>
								<th>Score</th>
								<th>Payroll</th>
								<th>Status</th>
								<th>Note</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($payrollTeachers as $payroll)
							<tr>
								<td>{{$payroll->date}}</td>
								<td>{{$payroll->hr->name}}</td>
								<td>{{$payroll->hr->position}}</td>
								<td>{{$payroll->score}}</td>
								<td>{{number_format($payroll->payroll,0)}}</td>
								<td>
									@if($payroll->status==1)
										Paid
									@elseif($payroll->status==2)
										Not Yet
									@endif
								</td>
								<td>{{$payroll->note}}</td>
								<td>
									<a class="btn-proll-edit" data-toggle="modal" data-id_hr="{{$payroll->id_hr}}" data-score="{{$payroll->score}}" data-date="{{$payroll->date}}" data-note="{{$payroll->note}}" data-status="{{$payroll->status}}" data-target="#prolledit" data-position="{{$payroll->hr->position}}" data-url="{{url('payroll/'.$payroll->id.'')}}" href="#">Edit</a>
									<a class="btn-proll-delete" data-toggle="modal" data-target="#prolldelete" data-url="{{url('payroll/'.$payroll->id.'')}}" href="#">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalPayroll" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content"><br>
			<div class="text-center">
				<h6 class="text-center" id="exampleModalCenterTitle"> Payroll</h6>
				<div class="col-6 offset-1">
					<hr id="hr-edit">
				</div>
			</div>
			<form action="{{url('payroll')}}" method="post" class="col-10 offset-1">
				@csrf
				<div class="form-group">
					<label for="exampleFormControlSelect1">Position</label>
					<select class="form-control" id="position" name="position">
						<option disabled selected>choose position</option>
						<option value="2">teacher</option>
						<option value="1">staff</option>
					</select>
				</div>
				<div id="staff_item" class="d-none">
					<div class="form-group">
						<label for="staff_date">Date</label>
						<input type="date" class="form-control" id="staff_date" placeholder="date" name="staff_date">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Nama</label>
						<select class="form-control" id="staff_nama" name="staff_nama">
							<option disabled selected>choose staff</option>
							@foreach($staffs as $staff)
							<option value="{{$staff->id}}">{{$staff->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="staff_total_work">Total Work Day</label>
						<input type="number" class="form-control" id="staff_total_work" placeholder="total work day" name="staff_total_work">
					</div>
					<div class="form-group">
						<label for="staff_score">Score</label>
						<input type="text" class="form-control" id="staff_score" placeholder="score" name="staff_score">
					</div>

					<div class="form-group">
						<label for="exampleFormControlSelect1">Status</label>
						<select class="form-control" id="staff_status" name="staff_status">
							<option disabled selected>choose status</option>
							<option value="1">paid</option>
							<option value="2">not yet</option>
						</select>
					</div>

					<div class="form-group">
						<label for="staff_note">Note</label>
						<textarea class="form-control" id="staff_note" placeholder="note" name="staff_note"></textarea>
					</div>
				</div>
				<div id="teacher_item" class="d-none">
					<div class="form-group">
						<label for="teacher_date">Date</label>
						<input type="date" class="form-control" id="teacher_date" placeholder="date" name="teacher_date">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Nama</label>
						<select class="form-control" id="teacher_nama" name="teacher_nama">
							<option disabled selected>choose teacher</option>
							@foreach($teachers as $teacher)
							<option value="{{$teacher->id}}">{{$teacher->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="teacher_score">Score</label>
						<input type="text" class="form-control" id="teacher_score" placeholder="score" name="teacher_score">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Status</label>
						<select class="form-control" id="teacher_status" name="teacher_status">
							<option disabled selected>choose status</option>
							<option value="1">paid</option>
							<option value="2">not yet</option>
						</select>
					</div>


					<div class="form-group">
						<label for="teacher_note">Note</label>
						<textarea class="form-control" id="staff_note" placeholder="note" name="teacher_note"></textarea>
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
<div class="modal fade" id="prolledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content"><br>
			<div class="text-center">
				<h6 class="text-center" id="exampleModalCenterTitle"> Payroll</h6>
				<div class="col-6 offset-1">
					<hr id="hr-edit">
				</div>
			</div>
			<form id="proll-edit" action="#" method="post" class="col-10 offset-1">
		        @method('PUT')
				@csrf
				<input type="hidden" name="position_edit">
				<div id="staff_item_edit" class="d-none">
					<div class="form-group">
						<label for="staff_date">Date</label>
						<input type="date" class="form-control" placeholder="date" name="staff_date_edit">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Nama</label>
						<select class="form-control" name="staff_nama_edit">
							<option disabled selected>choose staff</option>
							@foreach($staffs as $staff)
							<option value="{{$staff->id}}">{{$staff->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="staff_total_work">Total Work Day</label>
						<input type="number" class="form-control" placeholder="total work day" name="staff_total_work_edit">
					</div>
					<div class="form-group">
						<label for="staff_score">Score</label>
						<input type="text" class="form-control" placeholder="score" name="staff_score_edit">
					</div>

					<div class="form-group">
						<label for="exampleFormControlSelect1">Status</label>
						<select class="form-control" name="staff_status_edit">
							<option disabled selected>choose status</option>
							<option value="1">paid</option>
							<option value="2">not yet</option>
						</select>
					</div>

					<div class="form-group">
						<label for="staff_note">Note</label>
						<textarea class="form-control" placeholder="note" name="staff_note_edit"></textarea>
					</div>
				</div>
				<div id="teacher_item_edit" class="d-none">
					<div class="form-group">
						<label for="teacher_date">Date</label>
						<input type="date" class="form-control" placeholder="date" name="teacher_date_edit">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Nama</label>
						<select class="form-control" name="teacher_nama_edit">
							<option disabled selected>choose teacher</option>
							@foreach($teachers as $teacher)
							<option value="{{$teacher->id}}">{{$teacher->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="teacher_score">Score</label>
						<input type="text" class="form-control" placeholder="score" name="teacher_score_edit">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Status</label>
						<select class="form-control" name="teacher_status_edit">
							<option disabled selected>choose status</option>
							<option value="1">paid</option>
							<option value="2">not yet</option>
						</select>
					</div>


					<div class="form-group">
						<label for="teacher_note">Note</label>
						<textarea class="form-control" placeholder="note" name="teacher_note_edit"></textarea>
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
<div class="modal fade" id="prolldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-center w-100" id="exampleModalLongTitle">Payroll</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="proll-delete" action="#" method="post">
        @method('DELETE')
        @csrf
        <div class="modal-body text-center"> Are you sure want to delete this data?
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn mr-4 btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>



@endsection