<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectModel;

use Auth;
class SubjectController extends Controller
{
    public function list(){

        $data['getrecord']=SubjectModel::getrecord();
        $data['header_title']="Subject List";
        return view('admin.subject.Subject_list',  $data);
    }
    public function add(){
        $data['header_title']="Add Subject";
        return view('admin.subject.subject_add',  $data);
    }

    public function insert(Request $request){
        $save=new SubjectModel;
        $save->name=$request->name;
        $save->type=$request->type;
        $save->status=$request->status;
        $save->created_by=Auth::user()->id;
        $save->save();
        return redirect('Subject_list')->with('success','subject added successfully ');
    }
    public function subject_edit($id){

        $data['getRecord']=SubjectModel::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title']="Edit Subject";
            return view('admin.subject.subject_edit',  $data);
            }
            else{
                abort(404);
            }
       
    }
    public function update($id,Request $request){
        $save=SubjectModel::getSingle($id);
        $save->name=$request->name;
        $save->type=$request->type;
        $save->status=$request->status;
        $save->save();
        return redirect('Subject_list')->with('success','subject added successfully ');
    }
    public function delete($id){
        $save=SubjectModel::getSingle($id);
        $save->is_delete=1;
        $save->save();
        return redirect('Subject_list')->with('success','subject Deleted successfully ');
    }
}
