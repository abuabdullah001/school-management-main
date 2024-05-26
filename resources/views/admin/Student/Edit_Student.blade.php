@include('layouts.app1')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
      
          <div class="col-md-4">
          </div>
          <div class="col-md-6">
         
            <!-- general form elements -->
            <div class="card card-primary mt-2">
              <div class="card-header ">
                <h3 class="card-title">Edit STUDENT</h3>
              </div>
            
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                <div class="row">
                <div class="form-group col-md-6 col-lg-6">
                    <label for="Name">First Name<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Enter Student First Name" name="name" value="{{ old('name',$getRecord->name)}}" required>
                    <div style="color:red">{{$errors->first('name')}}</div>
                  </div>

                  <div class="form-group col-md-6 col-lg-6">
                    <label for="Name">Last Name<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Student Last Name" name="last_name" value="{{ old('last_name',$getRecord->last_name)}}" required>
                    <div style="color:red">{{$errors->first('last_name')}}</div>
                  </div>
                  
                  <div class="form-group col-md-6 col-lg-6">
                    <label for="addmission number">Addmission Number<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Student Addmission Number" name="addmission_number" value="{{ old('addmission_number',$getRecord->addmission_number)}}" required>
                    <div style="color:red">{{$errors->first('addmission_number')}}</div>
                  </div>
                   
                  <div class="form-group col-md-6 col-lg-6">
                    <label for="roll">Roll Number<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Student Roll Number" name="roll_number" value="{{ old('roll_number',$getRecord->roll_number)}}" required>
                    <div style="color:red">{{$errors->first('roll_number')}}</div>
                  </div>
                
                  
                <div class="form-group  col-md-6 col-lg-6">
                    <label for="class">Add Class Name<span style="color:red">*</span></label>
                   <select name="class_id" id=""class="form-control" required>
                    <option value="">Select Class</option>
                 @foreach($getClass as $class)
                 <option {{ (old('class_id',$getRecord->class_id)==$class->id) ? 'selected' : ''}} value="{{$class->id}}">{{$class->name}}</option>
                 @endforeach
                   </select>
                   <div style="color:red">{{$errors->first('$class->name')}}</div>
                </div>
                 
                <div class="form-group  col-md-6 col-lg-6">
                    <label for="gender">Choose Gender<span style="color:red">*</span></label>
                   <select name="gender" id=""class="form-control" required>
                    <option value="">Select Gender</option>
                     <option {{ (old('gender' , $getRecord->gender) =='Male') ? 'selected' : ''}} value="Male">Male</option>
                     <option {{ (old('gender' , $getRecord->gender)=='Female') ? 'selected' : ''}} value="Female">Feamle</option>
                     <option  {{ (old('gender' , $getRecord->gender)=='Other') ? 'selected' : ''}} value="Other">Other</option>
              
                   </select>
                   <div style="color:red">{{$errors->first('gender')}}</div>
                </div>
                 
                  <div class="form-group col-md-6 col-lg-6">
                    <label for="date of birth">Date Of Birth<span style="color:red">*</span></label>
                    <input type="date" class="form-control" id="exampleInputEmail1"  name="date_of_birth" value="{{ old('date_of_birth' , $getRecord->date_of_birth)}}" required>
                    <div style="color:red">{{$errors->first('date_of_birth')}}</div>
                  </div>

                  <div class="form-group col-md-6 col-lg-6">
                    <label for="Caste">Caste<span style="color:red"></span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="caste" placeholder="Caste" value="{{ old('caste',$getRecord->caste)}}" >
                    <div style="color:red">{{$errors->first('caste')}}</div>
                  </div>
                   

                  <div class="form-group">
                    <label for="Name" >Status:</label><br>
                   <select name="status" id=""class="form-control">
                    <option {{ (old('status',$getRecord->status) ==0) ? 'selected' : ''}} value="0">Active</option>
                    <option {{ (old('status',$getRecord->status) ==1) ? 'selected' : ''}} value="1">Inactive</option>
                   </select>
                   <div style="color:red">{{$errors->first('status')}}</div>
                  </div>


                <div class="form-group col-md-6 col-lg-6">
                    <label for="Religion">Religion<span style="color:red"></span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="religion" placeholder="Religion" value="{{ old('religion',$getRecord->religion)}}" >
                        <div style="color:red">{{$errors->first('religion')}}</div>
                  </div>

                  <div class="form-group col-md-6 col-lg-6">
                    <label for="Mobile">Mobile Number<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="mobile_number" placeholder="Enter Mobile Number" value="{{ old('mobile_number',$getRecord->mobile_number)}}" required>
                       <div style="color:red">{{$errors->first('mobile_number')}}</div>
                  </div>

                    <div class="form-group col-md-6 col-lg-6">
                    <label for="Addmission Date">Addmission Date<span style="color:red">*</span></label>
                    <input type="date" class="form-control" id="exampleInputEmail1"  name="addmission_date" placeholder="Addmission Date" value="{{ old('addmission_date',$getRecord->addmission_date)}}" required>
                       <div style="color:red">{{$errors->first('addmission_date')}}</div>
                  </div>

                    <div class="form-group col-md-6 col-lg-6">
                    <label for="Student Photo">Student Photo<span style="color:red">*</span></label>
                    <input type="File" class="form-control" id="exampleInputEmail1"  name="profile_pic"  value="{{ old('profile_pic',$getRecord->profile_pic)}}">
                       <div style="color:red">{{$errors->first('student_photo')}}</div>
                      @if(!empty($getRecord->profile_pic))
                       <img src="{{asset($getRecord->profile_pic)}}" alt="" style="height:100px;width:100px"> 
                       @endif
                  </div>
                 
                   <div class="form-group col-md-6 col-lg-6">
                    <label for="Blood Group">Blood Group<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="blood_group" placeholder="Enter Blood Group" value="{{ old('blood_group',$getRecord->blood_group)}}" required>
                       <div style="color:red">{{$errors->first('blood_group')}}</div>
                  </div>

                   <div class="form-group col-md-6 col-lg-6">
                    <label for="Height">Student Height<span style="color:red"></span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="height" placeholder="Enter Student Height" value="{{ old('height',$getRecord->height)}}">
                      <div style="color:red">{{$errors->first('height')}}</div>
                  </div>

                   <div class="form-group col-md-6 col-lg-6">
                    <label for="Weight">Weight<span style="color:red"></span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="weight" placeholder="Enter Student weight" value="{{ old('weight',$getRecord->weight)}}" >
                    <div style="color:red">{{$errors->first('weight')}}</div> 
                  </div>
              </div>
                          <hr>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ old('email',$getRecord->email)}}" required>
                       <div style="color:red">{{$errors->first('email')}}</div>
                  </div>
                  
                
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" >
                    <div class="mt-4"> 
                <p> Do you want to add new password, please enter new password</p>
                   </div>
                  </div>
                
                 
                 </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
            
 @include('layouts.footer')