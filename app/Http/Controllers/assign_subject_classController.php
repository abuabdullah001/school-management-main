<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignSubjectModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;

use Auth;
class assign_subject_classController extends Controller
{
    public function list(Request $request){

        $data['getRecord']=AssignSubjectModel::getRecord();
        $data['header_title']=" Assign Subject List";
        return view('admin.AssignSubject.assignSubjectList',  $data);
    }

 public function add(Request $request){
    $data['header_title']=" Assign Subject Add";
    $data['getClass']=ClassModel::getClass();//get class list
    $data['getSubject']=SubjectModel::getSubject();//get subject
    return view('admin.AssignSubject.add_assignSubject',  $data);
 }




 public function insert(Request $request){
   $data['header_title']=" Assign Subject Add";
   if(!empty($request->subject_id)){
    foreach($request->subject_id as $subject_id){
      $getAlreadyFirst=AssignSubjectModel::getAlreadyFirst($request->class_id, $subject_id);//it is used for removieng duplicate

      if(!empty($getAlreadyFirst)){
         $getAlreadyFirst->status=$request->status;
         $getAlreadyFirst->save();
      }
     else {
           $save=new AssignSubjectModel;
          $save->subject_id=$subject_id;
          $save->class_id=$request->class_id;
          $save->status=$request->status;
          $save->created_by=Auth::user()->id;
          $save->save();
      }
      
     
    }
    return redirect('asign_subject_list')->with('success','Asssign Subject To Class Successfully');
   }
   else{
      return redirect()->back()->with('error','Due To Some Error Please Try Again');
   }
 }

 public function delete(Request $request,$id){
   $save=AssignSubjectModel::getSingle($id);
   $save->is_delete=1;
   $save->save();
   return redirect('asign_subject_list')->with('success','Delete Successfully');
 }
public function edit_page($id,Request $request){
   $data['header_title']=" Assign Subject Edit";
   $getrecord=AssignSubjectModel::getSingle($id);
   if(!empty($getrecord)){
      $data['getrecord']=$getrecord;
      $data['getAssignSubjectId']=AssignSubjectModel::getAssignSubjectId($getrecord->class_id);//get data by class_id
      $data['getClass']=ClassModel::getClass();//get class list
      $data['getSubject']=SubjectModel::getSubject();//get subject
      return view('admin.AssignSubject.edit_asignSubject',  $data);
   }
  else{
   abort(404);
  }
}




//multiple edit data

public function update($id ,Request $request){
   AssignSubjectModel::deleteSubject( $request->class_id);//its used for before class id delete

   if(!empty($request->subject_id)){
      foreach($request->subject_id as $subject_id){
        $getAlreadyFirst=AssignSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
  
        if(!empty($getAlreadyFirst)){
           $getAlreadyFirst->status=$request->status;
           $getAlreadyFirst->save();
        }
       else {
             $save=new AssignSubjectModel;
            $save->subject_id=$subject_id;
            $save->class_id=$request->class_id;
            $save->status=$request->status;
            $save->created_by=Auth::user()->id;
            $save->save();
        }
        
       
      }
     
     }
     return redirect('asign_subject_list')->with('success','update Asssign Subject To Class Successfully');
}




//single  edit  show page

public function edit_single_subject($id){
   $data['header_title']=" Assign Subject Edit";
   $getrecord=AssignSubjectModel::getSingle($id);
   if(!empty($getrecord)){
      $data['getrecord']=$getrecord;
      $data['getClass']=ClassModel::getClass();//get class list
      $data['getSubject']=SubjectModel::getSubject();//get subject
      return view('admin.AssignSubject.singleSubjectEdit',  $data);
   }
  else{
   abort(404);
  }
}


public function update_singleSubject($id, Request $request){

 
      $getAlreadyFirst=AssignSubjectModel::getAlreadyFirst($request->class_id, $request->subject_id);

      if(!empty($getAlreadyFirst)){
         $getAlreadyFirst=AssignSubjectModel::getSingle($id);
         $getAlreadyFirst->subject_id=$request->subject_id;
         $getAlreadyFirst->status=$request->status;
         $getAlreadyFirst->save();
         return redirect('asign_subject_list')->with('success',' status and subject update Successfully');
      }
     else {
         $save=AssignSubjectModel::getSingle($id);
          $save->subject_id=$request->subject_id;
          $save->class_id=$request->class_id;
          $save->status=$request->status;
          $save->save();
          return redirect('asign_subject_list')->with('success','update single Asssign Subject To Class Successfully');
      }
      
     
    }
}

