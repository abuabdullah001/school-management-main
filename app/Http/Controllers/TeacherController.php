<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teacher List";
        return view('admin.Teacher.teacher_list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add teacher show";
        return view('admin.Teacher.add_teacher', $data);
    }

    public function insert(Request $request)
    {
        $teacher = new User;

        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:11',
        ]);
        $email = $request->email;
        if (Auth::user()->email == $email) {
            return redirect('add_teacher')->with('error', 'This email already exist');
        } else {
            $teacher->name = trim($request->name);
            $teacher->last_name = trim($request->last_name);

            $teacher->gender = trim($request->gender);
            $teacher->role = 2;
            if (!empty($request->date_of_birth)) {
                $teacher->date_of_birth = trim($request->date_of_birth);
            }
            if (!empty($request->date_of_joining)) {
                $teacher->date_of_joining = trim($request->date_of_joining);
            }
            $teacher->mobile_number = trim($request->mobile_number);
            $teacher->marital_status = trim($request->marital_status);
            $teacher->address = trim($request->address);
            $teacher->permanent_address = trim($request->permanent_address);
            $teacher->qualification = trim($request->qualification);
            $teacher->work_experience = trim($request->work_experience);
            $teacher->note = trim($request->note);
            if ($request->has('profile_pic')) {

                $file = $request->file('profile_pic');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'upload/profile_pic/';
                $file->move($path, $filename);
                $teacher->profile_pic = $path . $filename;
            }

            $teacher->status = trim($request->status);
            $teacher->email = trim($request->email);
            $teacher->password = hash::make($request->password);

            $teacher->save();
            return redirect('/teacher_list')->with('success', 'Student Added Successfully');
        }
    }

    public function teacher_Edit($id)
    {

        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Edit  Teacher";
            return view('admin.Teacher.edit_teacher', $data);
        } else {
            abort(404);
        }
    }


    public function update(Request $request, $id)
    {
        $teacher = User::getSingle($id);

        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'max:15|min:11',
        ]);
        $email = $request->email;
        if (Auth::user()->email == $email) {
            return redirect('add_student')->with('error', 'This email already exist');
        } else {
            $teacher->name = trim($request->name);
            $teacher->last_name = trim($request->last_name);

            $teacher->gender = trim($request->gender);
            $teacher->role = 2;
            if (!empty($request->date_of_birth)) {
                $teacher->date_of_birth = trim($request->date_of_birth);
            }


            $teacher->mobile_number = trim($request->mobile_number);

            if ($request->has('profile_pic')) {

                $file = $request->file('profile_pic');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'upload/profile_pic/';
                $file->move($path, $filename);
                $teacher->profile_pic = $path . $filename;
            }
            $teacher->status = trim($request->status);
            $teacher->email = trim($request->email);
            if (!empty($request->password)) {

                $teacher->password = hash::make($request->password);
            }
            $teacher->marital_status = trim($request->marital_status);
            $teacher->address = trim($request->address);
            $teacher->permanent_address = trim($request->permanent_address);
            $teacher->qualification = trim($request->qualification);
            $teacher->work_experience = trim($request->work_experience);
            $teacher->note = trim($request->note);
            $teacher->save();
            return redirect('/teacher_list')->with('success', 'Teacher updated Successfully');
        }
    }


    public function Delete($id)
    {
        $teacher_delete = User::getSingle($id);
        $teacher_delete->is_delete = 1;
        $teacher_delete->save();
        return redirect('/teacher_list')->with('success', 'Teacher Delete Successfully');
    }
}
