@include('layouts.app1')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
      
          <div class="col-md-4">
          </div>
          <div class="col-md-6">
          @if (session('success'))
                        <div class="alert alert-success">{{ session('success')}}</div>
              @endif
              @if (session('error'))
                        <div class="alert alert-success">{{ session('error')}}</div>
              @endif
            <!-- general form elements -->
            <div class="card card-primary mt-2">
              <div class="card-header ">
                <h3 class="card-title">Change Password</h3>
              </div>
            
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="card-body">

                <div class="form-group">
                    <label for="Name">Old Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder=" Old Password" name="old_password" value="{{ old('name')}}" required>
                  </div>
             
                  <div class="form-group">
                    <label for="Name">New  Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder=" New Password" name="new_password" value="{{ old('name')}}" required>
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