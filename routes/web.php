<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\assign_subject_classController;
use App\Http\Controllers\userController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//admin
Route::get('/dashboard_admin', [App\Http\Controllers\HomeController::class, 'dashboard_admin'])->name('dashboard_admin');
require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//role manage
Route::get('/admin',function(){
    return view('admin.dashboard');

})->name('admin')->middleware('admin');
//Admin route
Route::get('/admin_list',[AdminController::class,'list']);
Route::get('/add_admin',[AdminController::class,'add']);
Route::post('/add_admin',[AdminController::class,'insert']);
Route::get('/Admin_Edit/{id}',[AdminController::class,'Admin_Edit']);
Route::post('/Admin_Edit/{id}',[AdminController::class,'update']);
Route::get('/admin_delete/{id}',[AdminController::class,'Delete']);



//url control student admin
Route::get('/student_list',[StudentController::class,'list']);
Route::get('/add_student',[StudentController::class,'add']);
Route::post('/add_student',[StudentController::class,'insert']);
Route::get('/student_edit/{id}',[StudentController::class,'student_Edit']);
Route::post('/student_edit/{id}',[StudentController::class,'update']);
Route::get('/student_delete/{id}',[StudentController::class,'Delete']);

//url control Parent Admin
Route::get('/parent_list',[ParentController::class,'list']);
Route::get('/add_parent',[ParentController::class,'add']);
Route::post('/add_parent',[ParentController::class,'insert']);
Route::get('/parent_edit/{id}',[ParentController::class,'parent_edit']);
Route::post('/parent_edit/{id}',[ParentController::class,'update']);
Route::get('/parent_delete/{id}',[ParentController::class,'Delete']);

//for student assign to parent
Route::get('/parent_student/{id}',[ParentController::class,'Parent_student_list']);
Route::get('assign_student_parent/{student_id}/{parent_id}',[ParentController::class,'assign_student_parent']);
Route::get('assign_student_parent_delete/{student_id}',[ParentController::class,'assign_student_parent_delete']);

//end parent route

//start teacher route
Route::get('/teacher_list',[TeacherController::class,'list']);
Route::get('/add_teacher',[TeacherController::class,'add']);
Route::post('/add_teacher',[TeacherController::class,'insert']);
Route::get('/teacher_edit/{id}',[TeacherController::class,'teacher_Edit']);
Route::post('/teacher_edit/{id}',[TeacherController::class,'update']);
Route::get('/teacher_delete/{id}',[TeacherController::class,'Delete']);

//end teacher route
//url for class
Route::get('/class_list',[ClassController::class,'list']);
Route::get('/add_class',[ClassController::class,'add']);//for view
Route::post('/add_class',[ClassController::class,'insert']);//for insert

Route::get('/class_edit/{id}',[ClassController::class,'class_edit']);//for view
Route::post('/class_edit/{id}',[ClassController::class,'update']);//for edit
Route::get('/class_delete/{id}',[ClassController::class,'Delete']);
//url for subject
Route::get('/Subject_list',[SubjectController::class,'list']);
Route::get('/add_subject',[SubjectController::class,'add']);//for view
Route::post('/add_subject',[SubjectController::class,'insert']);//for insert
Route::get('/subject_edit/{id}',[SubjectController::class,'subject_edit']);
Route::post('/subject_edit/{id}',[SubjectController::class,'update']);
Route::get('/subject_delete/{id}',[SubjectController::class,'delete']);

//asign subject url
Route::get('/asign_subject_list',[assign_subject_classController::class,'list']);
Route::get('/add_assign_subject',[assign_subject_classController::class,'add']);//for view
Route::post('/add_assign_subject',[assign_subject_classController::class,'insert']);//for insert
Route::get('/assignSubject_edit/{id}',[assign_subject_classController::class,'edit_page']);
Route::post('/assignSubject_edit/{id}',[assign_subject_classController::class,'update']);
Route::get('/singleSubject_edit/{id}',[assign_subject_classController::class,'edit_single_subject']);//single edit start
Route::post('/singleSubject_edit/{id}',[assign_subject_classController::class,'update_singleSubject']);
Route::get('/assignSubject_delete/{id}',[assign_subject_classController::class,'delete']);
//url for change password
Route::get('/change_password',[userController::class,'change_password']);//for view
Route::post('/change_password',[userController::class,'update_change_password']);//for insert





//teacher panel url
Route::get('/teacher',function(){
    return view('teacher.dashboard');
})->name('teacher')->middleware('teacher');

Route::get('/My_account',[userController::class,'teacherAccount']);//for insert
Route::post('/My_account',[userController::class,'UpdateTeacherAccount']);//for update

Route::get('/student',function(){
    return view('student.dashboard');
})->name('student')->middleware('student');

Route::get('/parent',function(){
    return view('parent.dashboard');
})->name('parent')->middleware('parent');
