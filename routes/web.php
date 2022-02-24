<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormData;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/staffhome', 'HomeController@staffHome')->name('staffHome');
Route::get('/applicationList', 'HomeController@applicationList')->name('applicationList');
Route::get('/qualification', 'HomeController@qualification')->name('qualification');
Route::get('/usrahBudi', 'HomeController@usrahBudi')->name('usrahBudi');
Route::get('/package', 'HomeController@package')->name('package');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/aForm', 'HomeController@aForm')->name('aForm');
Route::get('/applicationForm', 'HomeController@applicationForm')->name('applicationForm');
Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');
Route::get('admin/manage_staff', 'HomeController@manageStaff')->name('manageUser.route');
Route::get('admin/manage_applicant', 'HomeController@manageApplicant')->name('manageApplicant.route');
//Add Form Data
Route::post('FormData', 'HomeController@FormData')->name('FormData.route');
//Edit Form Data

Route::get('edit/{id}', 'HomeController@edit')->name('edit.route');
Route::post('updateForm', 'HomeController@updateForm')->name('updateForm');
//Delete Form Data
Route::get('delete/{id}', 'HomeController@delete')->name('delete.route');
Route::get('renewal/{id}', 'HomeController@renewal')->name('renewal.route');
Route::get('viewApplication/{id}', 'HomeController@viewApplication')->name('viewApplication.route');

Route::get('approveApplication/{id}', 'HomeController@approveApplication')->name('approveApplication.route');
Route::get('profile/{id}', 'HomeController@profile')->name('profile.route');

Route::get('admin/staffdetails/{id}', 'HomeController@staffdetails')->name('staffdetails');
Route::get('admin/applicantdetails/{id}', 'HomeController@applicantdetails')->name('applicantdetails');
Route::get('admin/add_staff', 'HomeController@addStaff')->name('add_staff');
Route::get('admin/adminViewProfile/{id}', 'HomeController@adminViewProfile')->name('adminViewProfile');
Route::post('admin/SubmitAddStaff', 'HomeController@SubmitAddStaff')->name('SubmitAddStaff.route');
Route::post('updateFormStatus', 'HomeController@updateFormStatus')->name('updateFormStatus.route');
Route::post('updateInterviewDate', 'HomeController@updateInterviewDate')->name('updateInterviewDate.route');
Route::get('new_application', 'HomeController@new_application')->name('new_application');
Route::get('renew_contract', 'HomeController@renew_application')->name('renew_contract');
Route::get('trainer', 'HomeController@trainer')->name('trainer');
Route::get('facilitator', 'HomeController@facilitator')->name('facilitator');
Route::get('instructor', 'HomeController@instructor')->name('instructor');
Route::get('lecturer', 'HomeController@lecturer')->name('lecturer');

Route::post('profile/profileUpdate', 'HomeController@profileUpdate')->name('profileUpdate.route');

Route::get('anoucement', 'HomeController@anoucement')->name('anoucement');
Route::get('guestPackage', 'HomeController@guestPackage')->name('guestPackage');
Route::get('notify', 'MailerController@notify')->name('notify');
Route::post('sendNotify', 'MailerController@sendNotify')->name('sendNotify.route');
Route::post('annoucementUpdate', 'HomeController@annoucementUpdate')->name('annoucementUpdate.route');
Route::get('admin/adminDeleteUser/{id}', 'HomeController@adminDeleteUser')->name('adminDeleteUser.route');
Route::get('staffDeleteApplication/{id}', 'HomeController@staffDeleteApplication')->name('staffDeleteApplication.route');
Route::get('admin/adminWelcome', 'HomeController@adminWelcome')->name('adminWelcome.route')->middleware('admin');
Route::get('staffWelcome', 'HomeController@staffWelcome')->name('staffWelcome');
Route::get('userWelcome', 'HomeController@userWelcome')->name('userWelcome');
Route::get('resetPassword', 'HomeController@resetPassword')->name('reset.password');
Route::get('guestQualification', 'HomeController@guestQualification')->name('guestQualification');