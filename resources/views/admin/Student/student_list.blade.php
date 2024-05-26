@include('layouts.app1')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 col-md-4 col-lg-10">
            <h1>STUDENT LIST (Total:{{$getRecord->total()}})</h1>
          </div>


          <div class="col-sm-6 col-md-8 col-lg-2">
         <a href="{{url('add_student')}}" class="btn btn-primary">Add New Student</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>


  <section id="list" class="mt-4">
  <div class="container-fluid">
    <div class="row">


  <div class="col-md-2 col-sm-12 col-lg-1 "></div>
  <div class="col-md-10 col-sm-12 col-lg-11">
    
         @if (session('success'))
                        <div class="alert alert-success">{{ session('success')}}</div>
              @endif

              @if (session('delete'))
                        <div class="alert alert-success">{{ session('delete')}}</div>
              @endif
      <div class="card">
        <!-- search -->
      <form action="" method="get">
      <div class="card-header">
                <h3 class="card-title">Student Search</h3>
              </div>
                <div class="card-body">
                <div class="row">
                <div class="form-group col-md-2 col-lg-2">
                 
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" value= "{{ Request::get('name') }}" id="exampleInputEmail1" placeholder=" Enter Student  Name" name="name"  required>
                  </div>


                  <div class="form-group col-md-2 col-lg-2">
                 
                 <label for="Name">Last Name</label>
                 <input type="text" class="form-control" value= "{{ Request::get('last_name') }}" id="exampleInputEmail1" placeholder=" Enter Student Last Name" name="last_name"  required>
               </div>


                  <div class="form-group col-md-2 col-lg-2" >
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" value= "{{ Request::get('email') }}" id="exampleInputEmail1" placeholder="Enter email" name="email"  required>
                  </div>
                 
                  <div class="form-group col-md-2 col-lg-2">
                 
                 <label for="Name">Addmission Number</label>
                 <input type="text" class="form-control" value= "{{ Request::get('addmission_number') }}" id="exampleInputEmail1" placeholder=" Enter Student Addmission Number" name="addmission_number"  required>
               </div>
                 
               <div class="form-group col-md-2 col-lg-2">
               <label for="Name">Mobile Number</label>
                 <input type="text" class="form-control" value= "{{ Request::get('mobile_number') }}" id="exampleInputEmail1" placeholder=" Enter Student Mobile Number" name="mobile_number"  required>
               </div>

               <div class="form-group col-md-2 col-lg-2">
               <label for="Name">Roll Number</label>
                 <input type="text" class="form-control" value= "{{ Request::get('roll_number') }}" id="exampleInputEmail1" placeholder=" Enter Student Roll Number" name="addmission_number"  required>
               </div>
               
               <div class="form-group col-md-2 col-lg-2">
               <label for="Name">Class</label>
                 <input type="text" class="form-control" value= "{{ Request::get('class_id') }}" id="exampleInputEmail1" placeholder=" Enter Student Class" name="class_id"  required>
               </div>
                  
               <div class="form-group  col-md-2 col-lg-2">
                    <label for="gender">Choose Gender</label>
                   <select name="gender" id=""class="form-control" required>
                    <option value="">Select Gender</option>
                     <option {{ (Request::get('gender')  == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                     <option {{ (Request::get('gender')  == 'Female') ? 'selected' : ''}} value="Female">Feamle</option>
                     <option {{ (Request::get('gender')  == 'Other') ? 'selected' : ''}} value="Other">Other</option>
              
                   </select>
                </div>

                  <div class="form-group col-md-2 col-lg-2" >
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" class="form-control" value= "{{ Request::get('date') }}" id="exampleInputEmail1"  name="date"  required>
                  </div>

                  <div class="form-group col-md-3 col-lg-3"  style="margin-top:30px">
                  <button class="btn btn-primary" type="submit">Search</button>
                  <a href="{{url('student_list')}}"class="btn btn-primary ">Refresh</a>
                  </div>
                </div>
               </div>
              </form>
              </div>

              <div class="card-header">
                <h3 class="card-title">Admin List</h3>
              </div>

            
              <!-- /.card-body -->
              <!-- /.card-header -->
   <div class="table-responsive">
  <table class="table align-middle">
    <thead>
      <tr>
      <th >#</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Student Parent Name</th>
                      <th>Email</th>
                      <th>Addmission Number</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Date Of Birth</th>
                      <th>Caste</th>
                      <th>Religion</th>
                      <th>Mobile Number</th>
                      <th>Addmission Date</th>
                      <th>Blood Group</th>
                      <th>Height</th>
                      <th>Weight</th>
                      <th>Status</th>
                      <th >Created Date</th>
                      <th >Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($getRecord as $st_data)
      <tr>
      
        <td>{{$st_data->id}}</td>
         <td>
          <img src="{{asset($st_data->profile_pic)}}" alt="" style="height:100px;width:100px;border-radius:10px">
        </td>
         <td>{{$st_data->name.' '.$st_data->last_name}} </td>
         <td>{{$st_data->parent_name.' '.$st_data->parent_lastName}} </td>
         <td>{{$st_data->email}} </td>
         <td>{{$st_data->addmission_number}} </td>
         <td>{{$st_data->roll_number}} </td>
         <td>{{$st_data->class_name}} </td>
         <td>{{$st_data->gender}} </td>
         <td>{{ date('d-m-y h:i A',strtotime($st_data->date_of_birth))}}</td>
         <td>{{$st_data->caste}} </td>
         <td>{{$st_data->religion}} </td>
         <td>{{$st_data->mobile_number}} </td>
         <td>{{ date('d-m-y h:i A',strtotime($st_data->addmission_date))}} </td>
         <td>{{$st_data->blood_group}} </td>
         <td>{{$st_data->height}} </td>
         <td>{{$st_data->weight}} </td>
         <td>
         @if($st_data->status==0)
                       Active
                       @else
                       Inactive
                       @endif
        </td>
         <td> {{ date('d-m-y h:i A',strtotime($st_data->created_at))}} </td>
         
         <td style="display:flex">
            <a href="{{ url('student_edit/'.$st_data->id) }}" class="btn btn-primary w" style="margin-right:10px">Edit</a>
            <a href="{{ url('student_delete/'.$st_data->id) }}" onClick="return confirm('Are you sure to delete it?')" class="btn btn-danger">Delete</a>
        </td>
      </tr>

      @endforeach
    </tbody>
  </table>
  <div style="padding:10px;float:right">
                {{$getRecord->appends(illuminate\Support\Facades\Request::except('page'))->links()}}
    </div>
          </div>
              </div>
                </div>
                  </div>
                     </section>
                          </div>
                          
                          
                          @include('layouts.footer')


            