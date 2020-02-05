<?php
use App\Http\Resources\CashflowCollection;
use App\Http\Resources\AnnualCollection;
use App\Http\Resources\MonthCollection;
use App\Http\Resources\CategoryCollection;
use App\CashflowModel;
use App\CashFCategoryModel;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@index');
// Route::get('/templates', 'DashboardController@index');
Route::group(['middleware'=>['auth','verified']], function(){
	Route::get('/dashboard', 'DashboardController@index');
	Route::get('/profil', 'DashboardController@profil');
	Route::post('/editprofil', 'DashboardController@editprofil');
	Route::get('/all', function(){
		return CashflowCollection::collection(CashflowModel::all());
	});
	Route::get('/other/download/{m_id}', 'OtherMController@download')->name('other.download');
	Route::get('/class/{class_name}/materi', 'MateriController@index')->name('materi.class');
	Route::get('/monthly/{year_num}/{month_num}', function($year_num, $month_num){
		return CashflowCollection::collection(CashflowModel::select('id_category', DB::raw('sum(nominal) as nominal'))->whereMonth('date',$month_num)->whereYear('date',$year_num)->groupBy('id_category')->get());
	});
	Route::get('/monthly/{year_num}', function($year_num){
		return MonthCollection::collection(CashflowModel::select(DB::raw('distinct(month(date)) as date'))->whereYear('date',$year_num)->get());
	});
	Route::get('/annual', function(){
		return AnnualCollection::collection(CashflowModel::select(DB::raw('sum(nominal) as nominal, year(date) as date'))->groupBy(DB::raw('year(date)'))->get());
	});
	Route::get('/category', function(){
		return CategoryCollection::collection(CashFCategoryModel::all());
	});

	Route::get('/cashflow/monthly', 'CashflowController@monthly');
	Route::get('/cashflow/annual', 'CashflowController@annual');
	Route::get('/notifications', 'DashboardController@notifications');
	Route::delete('/leverage/delete', 'LeverageController@delete');
	Route::resources(
		[
		'targetmarket' => 'TargetMController',
		'funneling' => 'FunnelingController',
		'potentialmarket' => 'PotentialMController',
		'leverage' => 'LeverageController',
		
		'class/materi' => 'MateriController',
		'class' =>'ClassController',
		'student' => 'StudentController',
		'other' => 'OtherMController',

		'staff' => 'StaffController',
		'teacher' => 'TeacherController',

		'cashflow' => 'CashflowController',
		'payment' => 'PaymentController',
		'payroll' => 'PayrollController',
		'program' => 'ProgramController'

		]
	);
});

<<<<<<< Updated upstream
Route::get('/templates', 'DashboardController@index');
=======







Auth::routes(['verify' => true]);
Route::get('/logout', function(){
	Auth::logout();
	return redirect('/');
});
>>>>>>> Stashed changes
