<?php

use App\Models\Test;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Audit;
use App\Models\Template;
use App\Models\UserAudit;

use Illuminate\Http\Request;
use App\Models\TemplateSection;
use App\Models\TemplateQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\MultipleChoiceResponse;
use App\Http\Controllers\AuditController;
use App\Models\MultipleChoiceResponseType;
use App\Models\MultipleChoiceResponseGroup;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TemplateQuestionController;
use App\Http\Controllers\CustomResponseGroupController;
use App\Http\Controllers\MultipleChoiceResponseGroupController;


Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('auth')->name('home');


Route::get('/dashboard', function () {
    return inertia('Admin/Dashboard/Index');
})->name('dashboard')->middleware('auth');


// Route::get('departments/home', 'DepartmentController@home');
Route::get('/departments/home', [DepartmentController::class, 'home'])->middleware(['auth', 'admin']);
Route::resource('audits', AuditController::class);
Route::resource('departments', DepartmentController::class)->middleware(['auth','admin']);
Route::resource('templates', TemplateController::class)->middleware(['auth','admin']);
Route::resource('question', TemplateQuestionController::class)->middleware(['auth','admin']);
Route::resource('custom_response_group', CustomResponseGroupController::class)->middleware(['auth','admin']);
// Route::resource('multiple_choice_response_groups/{template}', MultipleChoiceResponseGroupController::class)->middleware(['auth','admin']);



Route::get('/test', function () {

  dd(request()->csrf_token);

$template = Template::find(1);

$section = new TemplateSection();

$section->title = 'tester';

$template->sections()->save($section);

  // dd(MultipleChoiceResponseGroup::whereNull('template_id')->with('responses')->get());



    
});

Route::get('/reorder', function (Request $request) {




  $questions = $request->all();

  TemplateQuestion::setNewOrder($questions);

  return back();

    
});

Route::get('/responses', function () {

    
});




