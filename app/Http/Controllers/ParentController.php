<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClassModel;
use Hash;
use Auth;
use Str;//it used for file

class ParentController extends Controller
{
    public function list(){
        $data['Header Title']=" Show Parent List";
        $data['getRecord']=User::getParent();
        return view('admin.Parent.parent_list',$data);
    }

    // for showing Parent entry Page
    public function add(){
        $data['Header Title']=" Add Parent";
    
      return view('admin.Parent.add_parent',$data);

    }

    //for inserting data
    public function insert(Request $request){
        $parent=new User;

        request()->validate([
           'email' => 'required|email|unique:users',
           'mobile_number' => 'max:15|min:11',
           'address' => 'max:500',
           'occupation' => 'max:100',
       
       ]);
        $email=$request->email;
        if( Auth::user()->email == $email){
           return redirect('add_student')->with('error','This email already exist');
          }
            
        else{
         $parent->name= trim($request->name);
          $parent->last_name= trim($request->last_name);
        
          $parent->gender= trim($request->gender);
              $parent->role=4;
      
       $parent->mobile_number= trim($request->mobile_number);
         
          if($request->has('profile_pic')){
     
           $file=$request->file('profile_pic');
           $extension=$file->getClientOriginalExtension();
          $filename= time().'.'.$extension;
          $path='upload/profile_pic/';
          $file->move($path,$filename);
          $parent->profile_pic=$path.$filename;
     
          }
        $parent->status= trim($request->status);
        $parent->occupation= trim($request->occupation);
        $parent->address= trim($request->address);
        $parent->email= trim($request->email);
        $parent->password= hash::make($request->password);
      
     $parent->save();
     return redirect('/parent_list')->with('success','Parent Added Successfully');
     
     }
    }

    // to show parent edit page
    public function parent_edit($id, Request $request){
      
      $data['getRecord']=User::getSingle($id);
      if(!empty( $data['getRecord'])){
        $data['header_title']="Edit  Parent";
        return view('admin.Parent.edit_parent',$data);
      }
   else{
    abort(404);
   }
    }
// update save function
public function update(Request $request,$id){
  $parent=User::getSingle($id);

  request()->validate([
     'email' => 'required|email|unique:users,email,'.$id,
     'mobile_number' => 'max:15|min:11',
     'address' => 'max:500',
     'occupation' => 'max:100',
     
 ]);
  $email=$request->email;
  if( Auth::user()->email == $email){
     return redirect('add_parent')->with('error','This email already exist');
    }
      
  else{
   $parent->name= trim($request->name);
    $parent->last_name= trim($request->last_name);
   
    $parent->gender= trim($request->gender);
        $parent->role=4;
    
 $parent->mobile_number= trim($request->mobile_number);

 

 if($request->has('profile_pic')){

  $file=$request->file('profile_pic');
  $extension=$file->getClientOriginalExtension();
 $filename= time().'.'.$extension;
 $path='upload/profile_pic/';
 $file->move($path,$filename);
 $parent->profile_pic=$path.$filename;

 }

 $parent->address= trim($request->address);
  $parent->occupation= trim($request->occupation);
  $parent->status= trim($request->status);

  if(!empty($request->password)){
    
     $parent->password= hash::make($request->password);

  }
  
   $parent->save();
  return redirect('/parent_list')->with('success','Student updated Successfully');
}
}
public function Delete($id, Request $request){
  $parent=User::getSingle($id);
  $parent->is_delete=1;
  $parent->save();
  return redirect('/parent_list')->with('success','Student deleted Successfully');
}

//start assign student to parent
public function Parent_student_list($id){
  $data['Header Title']=" Show Parent Student List";

  $data['getParent']=User::getSingle($id);
  $data['parent_id']=$id;
  $data['getSearchStudent']=User::getSearchStudent();
  $data['getRecord']=User::getMyStudent($id);
  
  return view('admin.Parent.Parent_student_list',$data);
}

public function assign_student_parent($student_id,$parent_id)
{
$student=User::getSingle($student_id);
$student->parent_id=$parent_id;
$student->save();
return redirect()->back()->with('success','Student Assign To Parent Successfully');
}

public function assign_student_parent_delete($student_id)
{
$student=User::getSingle($student_id);
$student->parent_id=null;
$student->save();
return redirect()->back()->with('success','Student delete from Parent Successfully');
}

}
