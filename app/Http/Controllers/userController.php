<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
class userController extends Controller
{

    public function teacherAccount(){
        $data['getRecord']=User::getSingle(Auth::user()->id);
        $data['header title']="My Account";
        return view('Teacher.my_Account',$data);
     }
 public function change_password(){
    $data['header title']="Change Password";
    return view('profile.change_password',$data);
 }

 public function UpdateTeacherAccount(Request $request)
 {
    $id=Auth::user()->id;


    request()->validate([
       'email' => 'required|email|unique:users,email,'.$id,
       'mobile_number' => 'max:15|min:11',
   ]);
    $email=$request->email;
    $teacher=User::getSingle($id);
     $teacher->name= trim($request->name);
      $teacher->last_name= trim($request->last_name);

      $teacher->gender= trim($request->gender);
          $teacher->role=2;
       if(!empty($request->date_of_birth)){
       $teacher->date_of_birth= trim($request->date_of_birth);
        }
   $teacher->mobile_number= trim($request->mobile_number);

   if($request->has('profile_pic')){

    $file=$request->file('profile_pic');
    $extension=$file->getClientOriginalExtension();
   $filename= time().'.'.$extension;
   $path='upload/profile_pic/';
   $file->move($path,$filename);
   $teacher->profile_pic=$path.$filename;

   }

    $teacher->email= trim($request->email);

    $teacher->marital_status= trim($request->marital_status);
    $teacher->address= trim($request->address);
    $teacher->permanent_address= trim($request->permanent_address);
    $teacher->qualification= trim($request->qualification);
    $teacher->work_experience= trim($request->work_experience);
     $teacher->save();
    return redirect('/My_account')->with('success','My Account updated Successfully');

 }

 //change password
 public function update_change_password(Request $request){
    $user=User::getSingle(Auth::user()->id);
    if(hash::check($request->old_password,$user->password)){
        $user->password=hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success','Password Successfully Updated');
    }

    else{
        return redirect()->back()->with('error','old password is not correct');
    }
 }

}
