@include('layouts.app1')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 col-md-4 col-lg-10">
            <h1>PARENT STUDENT LIST ({{$getParent->name}} {{$getParent->last_name}})</h1>
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
                    <label for="Name">Student Id</label>
                    <input type="text" class="form-control" value= "{{ Request::get('id') }}" id="exampleInputEmail1" placeholder="Student Id" name="id"  required>
                     </div>

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
                 
                  

                  <div class="form-group col-md-3 col-lg-3"  style="margin-top:30px">
                  <button class="btn btn-primary" type="submit">Search</button>
                  <a href="{{url('parent_student/'.$parent_id)}}"class="btn btn-success ">Reset</a>
                  </div>
                </div>
               </div>
              </form>
              </div>

          <div class="card-header">
           <h3 class="card-title">  Student List</h3>
          </div>

            
              <!-- /.card-body -->
              <!-- /.card-header -->
    @if(!empty($getSearchStudent))
   <div class="table-responsive">
  <table class="table align-middle">
    <thead>
      <tr>
                      <th >#</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent Name</th>
                      <th >Created Date</th>
                      <th >Action</th>
      </tr>
    </thead>
   
    <tbody>
    @foreach($getSearchStudent as $getStudent)
     <tr>
      <td>{{$getStudent->id}}</td>
      <td>
      <img src="{{asset($getStudent->profile_pic)}}" alt="" style="height:100px;width:100px;border-radius:10px">
      </td>
      <td>{{$getStudent->name.' '.$getStudent->last_name}}</td>
     
      
      <td>{{$getStudent->email}}</td>
      <td>{{$getStudent->parent_name}}
      <td> {{ date('d-m-y h:i A',strtotime($getStudent->created_at))}} </td>
      <td style="display:flex">
            <a href="{{ url('assign_student_parent/'.$getStudent->id.'/'.$parent_id) }}" class="btn btn-primary w" style="margin-right:10px;text-align:center">Add Student To Parent</a>
       
          </td>

     </tr>
    @endforeach
   
    </tbody>
  </table>
</div>
@endif
    <div class="card-header">
                <h3 class="card-title">Parent  Student List</h3>
              </div>

    <div class="table-responsive">
    <table class="table align-middle">
    <thead>
      <tr>
                      <th >#</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent Name</th>
                      <th >Created Date</th>
                      <th >Action</th>
      </tr>
    </thead>
   
    <tbody>
    @foreach($getRecord as $getStudent)
     <tr>
      <td>{{$getStudent->id}}</td>
      <td>
      <img src="{{asset($getStudent->profile_pic)}}" alt="" style="height:100px;width:100px;border-radius:10px">
      </td>
      <td>{{$getStudent->name.' '.$getStudent->last_name}}</td>
      <td>{{$getStudent->email}}</td>
      <td>{{$getStudent->parent_name}}
      <td> {{ date('d-m-y h:i A',strtotime($getStudent->created_at))}} </td>
      <td style="display:flex">
      <a href="{{ url('assign_student_parent_delete/'.$getStudent->id) }}" onClick="return confirm('Are you sure to delete it?')" class="btn btn-danger">Delete Student</a>
       
          </td>

     </tr>
    @endforeach
   
    </tbody>
  </table>
  <div style="padding:10px;float:right">
            
    </div>

          </div>
              </div>
                </div>
                  </div>
                     </section>
                          </div>
                          
                          @include('layouts.footer')



            