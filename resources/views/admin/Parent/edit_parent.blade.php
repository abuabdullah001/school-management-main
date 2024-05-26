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
                <h3 class="card-title">ADD STUDENT</h3>
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
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Student Last Name" name="last_name" value="{{ old('name',$getRecord->last_name)}}" required>
                    <div style="color:red">{{$errors->first('last_name')}}</div>
                  </div>
                  
                 
                   
                    
                
                  
               
                 
                <div class="form-group  col-md-6 col-lg-6">
                    <label for="gender">Choose Gender<span style="color:red">*</span></label>
                   <select name="gender" id=""class="form-control" required>
                    <option value="">Select Gender</option>
                     <option {{ (old( 'gender' , $getRecord->gender)=='male') ? 'selected' : ''}} value="Male">Male</option>
                     <option {{ (old('gender' ,  $getRecord->gender) == 'Female') ? 'selected' : ''}} value="Female">Feamle</option>
                     <option  {{ (old('gender', $getRecord->gender) == 'Other') ? 'selected' : ''}} value="Other">Other</option>
              
                   </select>
                   <div style="color:red">{{$errors->first('gender')}}</div>
                </div>
                 
                 
                   

                  <div class="form-group">
                    <label for="Name" >Status:</label><br>
                   <select name="status" id=""class="form-control">
                    <option {{ (old('status' , $getRecord->status) ==0) ? 'selected' : ''}} value="0">Active</option>
                    <option {{ (old('status', $getRecord->status) ==1) ? 'selected' : ''}} value="1">Inactive</option>
                   </select>
                   <div style="color:red">{{$errors->first('status')}}</div>
                  </div>


                

                  <div class="form-group col-md-6 col-lg-6">
                    <label for="Mobile">Mobile Number<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="mobile_number" placeholder="Enter Mobile Number" value="{{ old('mobile_number', $getRecord->mobile_number)}}" required>
                       <div style="color:red">{{$errors->first('mobile_number')}}</div>
                  </div>

                   

                    <div class="form-group col-md-6 col-lg-6">
                    <label for="Parent Photo">Parent Photo<span style="color:red">*</span></label>
                    <input type="File" class="form-control" id="exampleInputEmail1"  name="profile_pic"  value="{{ old('profile_pic', $getRecord->profile_pic)}}">
                    @if(!empty( $getRecord->profile_pic))
                         <img src="{{asset($getRecord->profile_pic)}}" alt="" style="height:50px;width:50px">
                    @endif
                       <div style="color:red">{{$errors->first('profile_pic')}}</div>
                  </div>
                 
                   <div class="form-group col-md-6 col-lg-6">
                    <label for="Blood Group">Occupation<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="occupation" placeholder="Enter Parent Occupation" value="{{ old('occupation', $getRecord->occupation)}}" required>
                       <div style="color:red">{{$errors->first('ocupation')}}</div>
                  </div>
                    
                  <div class="form-group col-md-6 col-lg-6">
                    <label for="Address">Address</label>
                    <div>
                    <textarea class="form-control" value="{{old('address', $getRecord->address)}}" name="address" id="" cols="" rows="3">{{ $getRecord->address}}</textarea>
                     </div>
                       </div>
                     </div>
              
                          <hr>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ old('email', $getRecord->email)}}" required>
                       <div style="color:red">{{$errors->first('email')}}</div>
                  </div>
                  
                
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password<span style="color:red">*</span></label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    <div class="mt-4"> 
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error')}}</div>
                   @endif
                   </div>
                  </div>
                
                 
                 </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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