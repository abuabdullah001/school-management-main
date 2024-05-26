@include('layouts.app1')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 col-md-4 col-lg-10">
            <h1>PARENT LIST (Total:{{$getRecord->total()}})</h1>
          </div>


          <div class="col-sm-6 col-md-8 col-lg-2">
         <a href="{{url('add_parent')}}" class="btn btn-primary">Add New Parent</a>
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

               <div class="form-group col-md-2 col-lg-2">
                 
                 <label for="Name">Mobile Number</label>
                 <input type="text" class="form-control" value= "{{ Request::get('mobile_number') }}" id="exampleInputEmail1" placeholder=" Enter Phone Number" name="mobile_number"  required>
               </div>


                  <div class="form-group col-md-2 col-lg-2" >
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" value= "{{ Request::get('email') }}" id="exampleInputEmail1" placeholder="Enter email" name="email"  required>
                  </div>
                 
                  <div class="form-group col-md-2 col-lg-2">
                 
                 <label for="Name">Occupation</label>
                 <input type="text" class="form-control" value= "{{ Request::get('occupation') }}" id="exampleInputEmail1" placeholder=" Enter parent occupation" name="occupation"  >
               </div>
                 
                 
               <div class="form-group col-md-2 col-lg-2">
                 
                 <label for="Name">Address</label>
                 <input type="text" class="form-control" value= "{{ Request::get('address') }}" id="exampleInputEmail1" placeholder=" Enter parent occupation" name="address"  >
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
                  <a href="{{url('parent_list')}}"class="btn btn-primary ">Refresh</a>
                  </div>
                </div>
               </div>
              </form>
              </div>

              <div class="card-header">
                <h3 class="card-title">Parent List</h3>
              </div>

            
              <!-- /.card-body -->
              <!-- /.card-header -->
   <div class="table-responsive">
  <table class="table align-middle">
    <thead>
      <tr>
                      <th >#</th>
                      <th>Profile Pic</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Mobile Number</th>
                      <th>Occupation</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th >Created Date</th>
                      <th >Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($getRecord as $Parent_data)
      <tr>
      
        <td>{{$loop->iteration}}</td>
         <td>
          <img src="{{asset($Parent_data->profile_pic)}}" alt="" style="height:100px;width:100px;border-radius:10px">
        </td>
         <td>{{$Parent_data->name.' '.$Parent_data->last_name}} </td>
         <td>{{$Parent_data->email}} </td>
        
         <td>{{$Parent_data->gender}} </td>
       
         <td>{{$Parent_data->mobile_number}} </td>
         <td>{{ $Parent_data->occupation}} </td>
         <td>{{ $Parent_data->address}} </td>
         <td>
         @if($Parent_data->status==0)
                       Active
                       @else
                       Inactive
                       @endif
        </td>
         <td> {{ date('d-m-y h:i A',strtotime($Parent_data->created_at))}} </td>
         
         <td style="display:flex">
            <a href="{{ url('parent_edit/'.$Parent_data->id) }}" class="btn btn-primary w" style="margin-right:10px;text-align:center">Edit</a>
            <a href="{{ url('parent_delete/'.$Parent_data->id) }}" onClick="return confirm('Are you sure to delete it?')" class="btn btn-danger" style="margin-right:10px;align:center">Delete</a>
            <a href="{{ url('parent_student/'.$Parent_data->id) }}" class="btn btn-primary w" style="margin-right:10px;align:center">My Student</a>
       
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



            