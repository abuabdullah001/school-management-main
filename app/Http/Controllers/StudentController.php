<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hash;
use Auth;
use Str;//it used for file


class StudentController extends Controller
{
   public function list(){
    $data['getRecord']=User::getStudent();
    $data['header_title']="Student List";
    return view('admin.student.student_list', $data);

   }
   
   public function add(){
    $data['getClass']=ClassModel::getClass();//get class list
    $data['header_title']="Add New Student";
    return view('admin.student.Add_Student', $data);
   }

public function insert(Request $request){


   $student=new User;

   request()->validate([
      'email' => 'required|email|unique:users',
      'height' => 'max:10',
      'weight' => 'max:10',
      'mobile_number' => 'max:15|min:11',
      'addmission_number' => 'max:50',
      'religion' => 'max:50',
      'caste' => 'max:50',
      'blood_group' => 'max:10',
      'roll_number' => 'max:50',
      'height' => 'max:10',
      'weight' => 'max:10',
     
    
  ]);
   $email=$request->email;
   if( Auth::user()->email == $email){
      return redirect('add_student')->with('error','This email already exist');
     }
       
   else{
    $student->name= trim($request->name);
     $student->last_name= trim($request->last_name);
     $student->addmission_number= trim($request->addmission_number);
     $student->roll_number= trim($request->roll_number);
     $student->class_id= trim($request->class_id);
     $student->gender= trim($request->gender);
         $student->role=3;
      if(!empty($request->date_of_birth)){
      $student->date_of_birth= trim($request->date_of_birth);
       }
 
 $student->caste= trim($request->caste);
 $student->religion= trim($request->religion);
  $student->mobile_number= trim($request->mobile_number);

      if(!empty($request->addmission_date)){
        $student->addmission_date= trim($request->addmission_date);
     }
    
     if($request->has('profile_pic')){

      $file=$request->file('profile_pic');
      $extension=$file->getClientOriginalExtension();
     $filename= time().'.'.$extension;
     $path='upload/profile_pic/';
     $file->move($path,$filename);
     $student->profile_pic=$path.$filename;

     }


   $student->blood_group= trim($request->blood_group);
   $student->height= trim($request->height);
   $student->status= trim($request->status);
   $student->weight= trim($request->weight);
   $student->email= trim($request->email);
   $student->password= hash::make($request->password);
 
$student->save();
return redirect('/student_list')->with('success','Student Added Successfully');

}
}


public function student_Edit($id){
   $data['getRecord']=User::getSingle($id);
   if(!empty( $data['getRecord'])){
      $data['getClass']=ClassModel::getClass();//get class list
      $data['header_title']="Edit  Student";
      return view('admin.student.Edit_Student', $data);
   }
else{
   abort(404);
}
}

public function update(Request $request,$id){
   $student=User::getSingle($id);

   request()->validate([
      'email' => 'required|email|unique:users,email,'.$id,
      'height' => 'max:10',
      'weight' => 'max:10',
      'mobile_number' => 'max:15|min:11',
      'addmission_number' => 'max:50',
      'religion' => 'max:50',
      'caste' => 'max:50',
      'blood_group' => 'max:10',
      'roll_number' => 'max:50',
      'height' => 'max:10',
      'weight' => 'max:10',
      'height' => 'max:10',
      'weight' => 'max:10',
    
  ]);
   $email=$request->email;
   if( Auth::user()->email == $email){
      return redirect('add_student')->with('error','This email already exist');
     }
       
   else{
    $student->name= trim($request->name);
     $student->last_name= trim($request->last_name);
     $student->addmission_number= trim($request->addmission_number);
     $student->roll_number= trim($request->roll_number);
     $student->class_id= trim($request->class_id);
     $student->gender= trim($request->gender);
         $student->role=3;
      if(!empty($request->date_of_birth)){
      $student->date_of_birth= trim($request->date_of_birth);
       }
 
 $student->caste= trim($request->caste);
 $student->religion= trim($request->religion);
  $student->mobile_number= trim($request->mobile_number);

  if(!empty($request->addmission_date)){
   $student->addmission_date= trim($request->addmission_date);
  }
 
  if($request->has('profile_pic')){

   $file=$request->file('profile_pic');
   $extension=$file->getClientOriginalExtension();
  $filename= time().'.'.$extension;
  $path='upload/profile_pic/';
  $file->move($path,$filename);
  $student->profile_pic=$path.$filename;

  }
 
  $student->blood_group= trim($request->blood_group);
   $student->height= trim($request->height);
   $student->status= trim($request->status);
   $student->weight= trim($request->weight);
   $student->email= trim($request->email);
   if(!empty($request->password)){
     
      $student->password= hash::make($request->password);

   }
   
    $student->save();
   return redirect('/student_list')->with('success','Student updated Successfully');
}
}

//delete student
public function Delete($id){
   $student_delete=User::getSingle($id);
   $student_delete->is_delete= 1;
   $student_delete->save();
   return redirect('/student_list')->with('success','Student Delete Successfully');
}

}
