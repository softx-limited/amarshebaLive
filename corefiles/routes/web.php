<?php

use Illuminate\Support\Facades\Route;
use App\Model\Service;
use App\Model\Team;
use App\Model\OurManPower;
use App\Model\Client;
use App\Model\Slider;
use App\Model\CommonConfig;


Route::get('/', function () {
    $datas=[];
    $datas['services']=Service::latest()->take(6)->get();
    $datas['sliders']=Slider::latest('id')->get();
    $datas['teams']=Team::latest('id','ASC')->get();
    $datas['manpowers']=OurManPower::latest()->take(6)->get();
    $datas['clients']=Client::latest()->get();
return view('frontend.index',$datas);
})->name('homepage');

/*Single Service  Route start here*/
Route::get('/service/{slug}',function($slug){

    $data['service']=Service::where('slug',$slug)->first();
    $data['services']=Service::latest()->get();
    return view('frontend.service_details',$data);
})->name('service.details');

/*Single Service  Route End here*/

Route::get('/service/manpoqwr/{slug}',function($slug){

})->name('manpower.details');

/*About us Route start here*/

Route::get('/about-us', function () {
    $datas=[];  
    $datas['teams']=Team::latest('id','ASC')->get();
    $datas['about_info']=CommonConfig::latest()->first();
return view('frontend.aboutus',$datas);
})->name('aboutus');

/*About us Route start here*/
/*Service  us Route start here*/
Route::get('/services', function () {
    $datas=[];  
    $datas['services']=Service::latest()->get();
return view('frontend.service',$datas);
})->name('service');
/*Service Route start here*/



/*Contact us Route start here*/
Route::get('/contact-us', function () {
    $datas=[];  
    $datas['about_info']=CommonConfig::latest()->first();
return view('frontend.contactus',$datas);
})->name('contact_us');
/*Contact us Route End here*/

/*nurse us Route start here*/
Route::get('/nurse-service', function () {
     return view('frontend.nurse_booking');
})->name('nurse.service');
/*nurse service us Route End here*/

/*Cylender Rent Service Route start here*/
Route::get('/cylinder-service', function () {
    return view('frontend.cylender_rent');
})->name('cylinder.service');
/*Cylender Rent Service Route End here*/

 

Route::post('/cylinder/rent/service','FrontendController@cylenderRequest')->name('cylinder.rent.service');

Route::post('/nurse/service','FrontendController@getNurseService')->name('registration.nurse.service');
Auth::routes();

// Route::get('/', 'FrontendController@homepage');

Route::get('/user/dashboard', 'HomeController@index')->name('admin.dashboard');

Route::get('/home', 'HomeController@index')->name('home');

/*Member Registration Route Start here
@Author:Ruhin
@Controller : RegistrationController
@view:Auth\Register
*/

Route::post('/become/member','RegistrationController@register')->name('become.member');

//Member Registration Route Start here

/*Userlist Route Start heree
@Author:Ruhin
@Controller : SettingsController
@view:backend\profile
*/

Route::get('/user/profile','SettingsController@getUserList')->name('userlist');

/*Nursing route Start here
@Author:Ruhin Mia
@controller: NurseController
@view: backend/nurse
*/

Route::get('/customer/list','CustomerController@getCustomerList')->name('customerlist');
Route::post('/customer/store','CustomerController@storeCustomerInfo')->name('customer.store');
Route::put('/customer/update/{id}','CustomerController@update')->name('customer.update');
Route::delete('/customer/destroy/{id}','CustomerController@destroy')->name('customer.destroy');

// profile Setting Route End Here

/*Nursing route Start here
@Author:Ruhin Mia
@controller: NurseController
@view: backend/nurse
*/

Route::resource('/nurse','NurseController');
Route::post('/nurse-store','NurseController@store')->name('add.nurse');

Route::post('/add/eduction/qualification','NurseController@addQutalification')->name('add.nurse.qualification');
Route::post('/add/nurse/reference','NurseController@addReferences')->name('add.nurse.reference');
Route::post('/add/job/experience','NurseController@addExpericence')->name('add.nurse.experience');
Route::get('/download-cv/{id}','NurseController@downloadCv')->name('nurse.cv.download');

Route::resource('/product', 'ProductController');
Route::get('/sale-create','SaleController@index')->name('sale.create');
Route::post('/sale-add-cart','SaleController@CartProducts')->name('sale.add.cart');
Route::get('/invoice-list','SaleController@allInvoiceList')->name('sales.list');

// Customer Setting Route End Here

/*Find the product Price */

Route::post('/find/product/price','SaleController@findProductInfo');
Route::post('/product/sale','SaleController@saleProduct')->name('product.sale');

/*Find the product Price End here*/

/*Print Invoice Route Start here*/

Route::get('/customer/invoice/{invoice_no}','SaleController@showCustomerInvoice')->name('customer.invoice');

/*End Route For invoice*/

/*Account Routes Start here*/

Route::get('/account/lists','AccountController@index')->name('account.list');
Route::post('/account/store','AccountController@Store')->name('account.create');
Route::put('/account/update/{id}','AccountController@update')->name('account.update');
Route::delete('/account/delete/{id}','AccountController@destroy')->name('account.destroy');

/*Individual Customer Account History*/
Route::get('/customer/account/{customer_id}','CustomerController@accountInformation')->name('account.details');
/*Due Collect from Customer*/

Route::post('/customer/due/payment','CustomerController@customerDuePayment')->name('due.payment');

/*Account Routes End here*/

/*Test Invoice Page Route*/

Route::get('/view/invoice',function(){

return view('backend.invoice.invoice');
});

/*Test Invoice Page Route End*/

/*
@Site settings Route 
@Author:Ruhin Mia
@Controller : WebsettingController
@ View:backend/websettings

*/

Route::get('/update/web-settings','WebsettingController@updateSiteInfo')->name('website.settings');
Route::put('/update/web-settings','WebsettingController@updateInfo')->name('website.settings.update');

/*Site Settings Route End here*/

/*Expense Category  Route Start here

@Author:Ruhin
@Controller : ExpenseCategoryController
@view:backend\exepnse
*/

Route::get('/expense-category-list','ExpenseCategoryController@index')->name('expense.category.list');
Route::post('/store-expense-category','ExpenseCategoryController@storeCategory')->name('expense.category.store');
Route::put('/update-expense-category/{expense_id}','ExpenseCategoryController@UpdateCategory')->name('expense.category.update');
Route::delete('/delete-expense-category/{expense_id}','ExpenseCategoryController@DeleteCategory')->name('expense.category.delete');

/*Expense Category  Route End here

/*Expense  Route Start here

@Author:Ruhin
@Controller : ExpenseCategoryController
@view:backend\exepnse
*/

Route::get('/expense-list','ExpenseController@index')->name('expense.list');
Route::post('/store-expense','ExpenseController@storeExpense')->name('expense.store');
Route::put('/update-expense/{expense_id}','ExpenseController@UpdateExpense')->name('expense.update');
Route::delete('/delete-expense/{expense_id}','ExpenseController@DeleteExpense')->name('expense.delete');

/*Expense Route End here

/*Patient Route Start here
@Author:Ruhin 
@controller : PatientController
@view:backend\patient
*/

Route::get('/patient/list','PatientController@index')->name('patient.list');
Route::post('/patient/store','PatientController@store')->name('patient.store');
Route::put('/patient/update/{id}','PatientController@update')->name('patient.update');
Route::get('/patient/complete/{id}','PatientController@completedService')->name('patient.service.complete');
Route::get('/assing/nurse/project','PatientController@assignNurse')->name('assign.nurse');
Route::put('/assing/nurse/{id}','PatientController@updateAssignNurse')->name('patient.nurse.update');

/*Patient individual Accounts info*/
Route::get('/patient/account/{patient_id}','PatientController@accountInformation')->name('patient.account.details');

/*Due Payment*/
Route::post('/patient/due/payment','PatientController@patientDuePayment')->name('patient.due.payment');

/*Nurse Attendance*/
Route::post('/nurse/attendance/{id}','PatientController@nurseAttendance')->name('nurse.attendance');

/*Nurse Working History*/
Route::get('/nurse/working/history/{id}','PatientController@nurseWorkingHistory')->name('nurse.history');



/*Salary Payment Route Start here
@Author:Ruhin 
@controller : SalaryController
@view:backend\salary
*/


Route::get('/nurse-list','SalaryController@index')->name('nurse.list');
Route::get('/nurse-payment','SalaryController@payment')->name('nurse.list.payment');
Route::post('/nurse-payment','SalaryController@paymentStore')->name('nurse.slary.payment');
Route::get('/nurse-payment-list','SalaryController@paymentHistory')->name('nurse.slary.payment.history');
Route::post('/nurse/working/history','NurseController@nurseWorkingHistory')->name('nurse.working.history');



/*Call Service  Route Start here
@Author:Ruhin 
@controller : CallServiceController
@view:backend\call_service
*/

Route::get('/call-service-list','CallServiceController@index')->name('call.service.list');
Route::post('/call-service-store','CallServiceController@ServiceStore')->name('call.service.store');

Route::get('/request-service-list','CallServiceController@RequestServiceList')->name('request.service.list');

Route::post('/accept/customer/request/{id}','CallServiceController@acceptCustomerService')->name('service.accept');
 /*Report Controller*/
//Expnese report
Route::get('/expense-report','ReportController@totalExpense')->name('expense.report');
Route::post('/expense-reportBy-Category','ReportController@ExpenseReportByCategory')->name('expense.report.category');

//Income report

Route::get('/income-report','ReportController@totalIncome')->name('income.report');
Route::post('/income-reportBy-Category','ReportController@incomeReportByCategory')->name('income.report.category');


//Net Profit report

Route::get('/net-profit-report','ReportController@netProfit')->name('profit.report');
Route::post('/profit-reportBy-Date','ReportController@profitReportByDate')->name('profit.report.date');


/*website Slider Settings*/

Route::get('/slider-list','SliderController@index')->name('slider.list');
Route::post('/slider-store','SliderController@store')->name('slider.store');
Route::put('/slider-update/{id}','SliderController@update')->name('slider.update');
Route::delete('/slider-delete/{id}','SliderController@destroy')->name('slider.destroy');


/*website Service Settings*/

Route::get('/service-list','ServiceController@index')->name('service.list');
Route::post('/service-store','ServiceController@store')->name('service.store');
Route::put('/service-update/{id}','ServiceController@update')->name('service.update');
Route::delete('/service-delete/{id}','ServiceController@destroy')->name('service.destroy');

/* Website Team Settings*/
Route::get('/team-list','TeamController@index')->name('team.list');
Route::post('/team-store','TeamController@store')->name('team.store');
Route::put('/team-update/{id}','TeamController@update')->name('team.update');
Route::delete('team-delete/{id}','TeamController@destroy')->name('team.destroy');

/*Man Power Settings*/
Route::get('/manpower-list','ManpowerController@index')->name('manpower.list');
Route::post('/manpower-store','ManpowerController@store')->name('manpower.store');
Route::put('/manpower-update/{id}','ManpowerController@update')->name('manpower.update');
Route::delete('/manpower-delete/{id}','ManpowerController@destroy')->name('manpower.destroy');

/*Client Certification */

Route::get('/client-list','ClientController@index')->name('client.list');
Route::post('/client-store','ClientController@store')->name('client.store');
Route::put('/client-update/{id}','ClientController@update')->name('client.update');
Route::delete('/client-delete/{id}','ClientController@destroy')->name('client.destroy');

/*Basic Setting About us , contact us, Socila Media*/


Route::get('/edit/common-info','SettingsController@editinfo')->name('site.common.info');
Route::post('/update/common-info','SettingsController@updateInfo')->name('site.info.update');
Route::get('/user-list','SettingsController@getUserList')->name('user.list');

 /*System New user Creation*/


 Route::post('/add-new-user','SettingsController@addNewUser')->name('add.user');
 Route::put('/update/user-info/{id}','SettingsController@updateUserInfo')->name('user.info.update');
 Route::delete('/delete/user-info/{id}','SettingsController@deleteUser')->name('user.destroy');
 Route::get('profile/view','SettingsController@userProfile')->name('user.profile');

/*Roles Route Start here*/

Route::get('/role-lists','RoleController@index')->name('roles.list');
Route::post('/role-add','RoleController@store')->name('add.role');
Route::put('/role-update/{id}','RoleController@update')->name('update.role');
Route::delete('/role-destroy/{id}','RoleController@destroy')->name('destroy.role');

/*Set  User Permission*/
Route::get('/set/user/permission/{id}','RoleController@setUserPermission')->name('set.permission');
Route::post('/update-roles-permission/{id}','RoleController@assingPermission')->name('update.access.settings');