<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class AdminController extends Controller
{
  public function list(){
    $data['getRecord']=User::getAdmin();
    $data['header_title']="Admin List";
    return view('admin.admin.list',$data);
  }


  public function add(){

    $data['header_title']="Admin Add";
    return view('admin.admin.Add_admin',$data);

  }
  //insert
  public function insert(Request $request){

     $user=new User();
     $email=$request->email;


     if( Auth::user()->email == $email){
      return redirect('add_admin')->with('error','This email already exist');
     }

     else{

      $user->name=trim($request->name);
     $user->email=trim($request->email);
     $user->password=Hash::make($request->password);
     $user->role=1;

    $user->save();
     }
    return redirect('admin_list')->with('success','Admin successfully created');

  }

  //edit

  public function Admin_Edit($id){

    $data['getRecord']=User::getSingle($id);
    if(!empty($data['getRecord'])){
      $data['header_title']="Admin  Edit";
      return view('admin.admin.Admin_Edit',$data);
    }

 else{
  abort(404);
 }

  }

  //edit success
  public function update(Request $request, $id){


    $user=User::getSingle($id);
    $user->name=trim($request->name);
    $user->email=trim($request->email);
    if(!empty($request->password)){
    $user->password=Hash::make($request->password);
    }
   $user->save();
   return redirect('admin_list')->with('success','Admin successfully update');

  }

  public function Delete($id, Request $request){
    $user=User::getSingle($id);
    $user->is_delete=1;
    $user->save();
    return redirect('admin_list')->with('delete','Admin successfully deleted');

  }

}
