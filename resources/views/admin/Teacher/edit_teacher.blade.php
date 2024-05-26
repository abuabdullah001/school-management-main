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
                    <h3 class="card-title">Edit Teacher</h3>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="Name">First Name<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder=" Enter Student First Name" name="name"
                                    value="{{ old('name', $getRecord->name) }}" required>
                                <div style="color:red">{{ $errors->first('name') }}</div>
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                <label for="Name">Last Name<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter Student Last Name" name="last_name"
                                    value="{{ old('last_name', $getRecord->last_name) }}" required>
                                <div style="color:red">{{ $errors->first('last_name') }}</div>
                            </div>





                            <div class="form-group  col-md-6 col-lg-6">
                                <label for="gender">Choose Gender<span style="color:red">*</span></label>
                                <select name="gender" id=""class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option {{ old('gender', $getRecord->gender) == 'Male' ? 'selected' : '' }}
                                        value="Male">Male</option>
                                    <option {{ old('gender', $getRecord->gender) == 'Female' ? 'selected' : '' }}
                                        value="Female">Feamle</option>
                                    <option {{ old('gender', $getRecord->gender) == 'Other' ? 'selected' : '' }}
                                        value="Other">Other</option>

                                </select>
                                <div style="color:red">{{ $errors->first('gender') }}</div>
                            </div>

                            <div class="form-group col-md-6 col-lg-6">
                                <label for="date of birth">Date Of Birth<span style="color:red">*</span></label>
                                <input type="date" class="form-control" id="exampleInputEmail1" name="date_of_birth"
                                    value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" >
                                <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                            </div>




                            <div class="form-group">
                                <label for="Name">Status:</label><br>
                                <select name="status" id=""class="form-control">
                                    <option {{ old('status', $getRecord->status) == 0 ? 'selected' : '' }}
                                        value="0">Active</option>
                                    <option {{ old('status', $getRecord->status) == 1 ? 'selected' : '' }}
                                        value="1">Inactive</option>
                                </select>
                                <div style="color:red">{{ $errors->first('status') }}</div>
                            </div>


                            <div class="form-group col-md-6 col-lg-6">
                                <label for="Mobile">Mobile Number<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="mobile_number"
                                    placeholder="Enter Mobile Number"
                                    value="{{ old('mobile_number', $getRecord->mobile_number) }}" required>
                                <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                            </div>



                            <div class="form-group col-md-6 col-lg-6">
                                <label for="Student Photo">Teacher Photo<span style="color:red">*</span></label>
                                <input type="File" class="form-control" id="exampleInputEmail1" name="profile_pic"
                                    value="{{ old('profile_pic', $getRecord->profile_pic) }}">
                                <div style="color:red">{{ $errors->first('student_photo') }}</div>
                                @if (!empty($getRecord->profile_pic))
                                    <img src="{{ asset($getRecord->profile_pic) }}" alt=""
                                        style="height:100px;width:100px">
                                @endif
                            </div>


                        <div class="form-group col-md-6 col-lg-6">
                            <label for="date of birth">Date Of Birth<span style="color:red">*</span></label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="date_of_birth"
                                value="{{ old('date_of_birth,$getRecord->date_of_birth',$getRecord->date_of_birth) }}" required>
                            <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                        </div>

                        <div class="form-group col-md-6 col-lg-6">
                            <label for="date of birth">Date Of Joining<span style="color:red">*</span></label>
                            <input type="date" class="form-control" id="exampleInputEmail1"
                                name="date_of_joining" value="{{ old('date_of_joining') }}" required>
                            <div style="color:red">{{ $errors->first('date_of_joining',$getRecord->date_of_joining) }}</div>
                        </div>

                        <div class="form-group col-md-6 col-lg-6">
                            <label for="Caste">Marital Status<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="marital_status"
                                placeholder="marital Status" value="{{ old('marital_status',$getRecord->marital_status) }}">
                            <div style="color:red">{{ $errors->first('marital_status') }}</div>
                        </div>

                        <div class="form-group col-md-6 col-lg-6">
                            <label for="Address">Current Address<span style="color:red">*</span></label>
                            <div>
                                <textarea class="form-control" name="address" id="" cols="" rows="3">{{$getRecord->address}}</textarea>
                            </div>
                        </div>


                        <div class="form-group col-md-6 col-lg-6">
                            <label for="Address">Permanent Address<span style="color:red">*</span></label>
                            <div>
                                <textarea class="form-control" name="permanent_address" id="" cols="" rows="3">{{$getRecord->permanent_address}}</textarea>
                            </div>
                        </div>


                        <div class="form-group col-md-6 col-lg-6">
                            <label for="Caste">Qualification <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="qualification"
                                placeholder="Qualification" value="{{ old('qualification',$getRecord->qualification) }}">
                            <div style="color:red">{{ $errors->first('qualification') }}</div>
                        </div>


                        <div class="form-group col-md-6 col-lg-6">
                            <label for="Caste">Work Experience <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                name="work_experience" placeholder="Work Experience"
                                value="{{ old('work_experience',$getRecord->work_experience) }}">
                            <div style="color:red">{{ $errors->first('work_experience') }}</div>
                        </div>


                        <div class="form-group col-md-6 col-lg-6">
                            <label for="Caste">Note <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="note"
                                placeholder="Write Your Note" value="{{ old('note',$getRecord->note) }}">
                            <div style="color:red">{{ $errors->first('note') }}</div>
                        </div>

                    </div>
                        <hr>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email" name="email"
                                value="{{ old('email', $getRecord->email) }}" required>
                            <div style="color:red">{{ $errors->first('email') }}</div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password" name="password">
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
