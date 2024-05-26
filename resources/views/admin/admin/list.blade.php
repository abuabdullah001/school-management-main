@include('layouts.app1')
<section id="list" >
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 col-md-4 col-lg-10">
            <h1>ADMIN LIST (Total:{{$getRecord->total()}})</h1>
          </div>


          <div class="col-sm-6 col-md-8 col-lg-2">
         <a href="{{url('add_admin')}}" class="btn btn-primary">Add New Admin</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>


  <section id="list"  class="mt-4">
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
                <h3 class="card-title">Admin Search</h3>
              </div>
                <div class="card-body">
                <div class="row">
                <div class="form-group col-md-3 col-lg-3">
                 
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" value= "{{ Request::get('name') }}" id="exampleInputEmail1" placeholder=" Enter Your Name" name="name"  required>
                  </div>

                  <div class="form-group col-md-3 col-lg-3" >
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" value= "{{ Request::get('email') }}" id="exampleInputEmail1" placeholder="Enter email" name="email"  required>
                  </div>
                 
                  <div class="form-group col-md-3 col-lg-3" >
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" class="form-control" value= "{{ Request::get('date') }}" id="exampleInputEmail1"  name="date"  required>
                  </div>

                  <div class="form-group col-md-3 col-lg-3"  style="margin-top:30px">
                  <button class="btn btn-primary" type="submit">Search</button>
                  <a href="{{url('admin_list')}}"class="btn btn-primary ">Refresh</a>
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
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th >Created Date</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                     <tr>
                      <td>
                      {{$loop->iteration}}
                      </td>
                      <td>
                        {{$value->name}}
                      </td>
                      <td>
                        {{$value->email}}
                      </td>
                      <td>
                        {{ date('d-m-y h:i A',strtotime($value->created_at))}}
                      </td>
                      <td>
                        <a href="{{ url('Admin_Edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('admin_delete/'.$value->id) }}"  class="btn btn-danger">Delete</a>
                      </td>
                     </tr>


                    @endforeach
                  </tbody>
                </table>
                <div style="padding:10px;float:right">
                {{$getRecord->appends(illuminate\Support\Facades\Request::except('page'))->links()}}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            </div>
            </div>
            </section>
            </div>
            @include('layouts.footer')