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
         <a href="{{url('add_teacher')}}" class="btn btn-primary">Add New Teacher</a>
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
       @csrf
      <div class="card-header">
                <h3 class="card-title">Teacher Search</h3>
              </div>
                <div class="card-body">
                <div class="row">
                <div class="form-group col-md-2 col-lg-2">

                    <label for="Name">Name</label>
                    <input type="text" class="form-control" value= "{{ Request::get('name') }}" id="exampleInputEmail1" placeholder=" Enter Teacher  Name" name="name"  required>
                  </div>


                  <div class="form-group col-md-2 col-lg-2">

                 <label for="Name">Last Name</label>
                 <input type="text" class="form-control" value= "{{ Request::get('last_name') }}" id="exampleInputEmail1" placeholder=" Enter Teacher Last Name" name="last_name"  required>
               </div>


                  <div class="form-group col-md-2 col-lg-2" >
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" value= "{{ Request::get('email') }}" id="exampleInputEmail1" placeholder="Enter email" name="email"  required>
                  </div>

                  <div class="form-group col-md-2 col-lg-2">

                 <label for="Name">Marital Status</label>
                 <input type="text" class="form-control" value= "{{ Request::get('merital_status') }}" id="exampleInputEmail1" placeholder=" Enter Teacher Marital Status" name="addmission_number"  required>
               </div>

               <div class="form-group col-md-2 col-lg-2">

                <label for="Name">Qualification</label>
                <input type="text" class="form-control" value= "{{ Request::get('qualification') }}" id="exampleInputEmail1" placeholder=" Enter Teacher Qualification" name="addmission_number"  required>
              </div>

               <div class="form-group col-md-2 col-lg-2">
               <label for="Name">Mobile Number</label>
                 <input type="text" class="form-control" value= "{{ Request::get('mobile_number') }}" id="exampleInputEmail1" placeholder=" Enter Teacher Mobile Number" name="mobile_number"  required>
               </div>


               <div class="form-group col-md-2 col-lg-2" >
                <label for="exampleInputEmail1">Joinning Date</label>
                <input type="date" class="form-control" value= "{{ Request::get('date_of_joining') }}" id="exampleInputEmail1"  name="date"  required>
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
                  <a href="{{url('teacher_list')}}"class="btn btn-primary ">Refresh</a>
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
                      <th>Teacher Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Date Of Birth</th>
                      <th>Date Of Joining</th>
                      <th>Mobile Number</th>
                      <th>Marital Status</th>
                      <th>Curent Address </th>
                      <th>Permanent address</th>
                      <th>Qualification</th>
                      <th>Work Experience</th>
                      <th>Note</th>
                      <th>Status</th>
                      <th >Created Date</th>
                      <th >Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($getRecord as $teacher_data)
      <tr>

        <td>{{$teacher_data->id}}</td>
         <td>
          <img src="{{asset($teacher_data->profile_pic)}}" alt="" style="height:100px;width:100px;border-radius:10px">
        </td>
         <td>{{$teacher_data->name.' '.$teacher_data->last_name}} </td>
         <td>{{$teacher_data->email}} </td>
         <td>{{$teacher_data->gender}} </td>
         <td>{{ date('d-m-y h:i A',strtotime($teacher_data->date_of_birth))}}</td>
         <td>{{ date('d-m-y h:i A',strtotime($teacher_data->date_of_joining))}}</td>
         <td>{{$teacher_data->mobile_number}} </td>
         <td>{{$teacher_data->marital_status}} </td>
         <td>{{$teacher_data->address}} </td>
         <td>{{$teacher_data->permanent_address}} </td>
         <td>{{$teacher_data->qualification}} </td>
         <td>{{$teacher_data->work_experience}} </td>
         <td>{{$teacher_data->note}} </td>

         <td>
         @if($teacher_data->status==0)
                       Active
                       @else
                       Inactive
                       @endif
        </td>
         <td> {{ date('d-m-y h:i A',strtotime($teacher_data->created_at))}} </td>

         <td style="display:flex">
            <a href="{{ url('teacher_edit/'.$teacher_data->id) }}" class="btn btn-primary w" style="margin-right:10px">Edit</a>
            <a href="{{ url('teacher_delete/'.$teacher_data->id) }}" onClick="return confirm('Are you sure to delete it?')" class="btn btn-danger">Delete</a>
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


