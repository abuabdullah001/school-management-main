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
                <h3 class="card-title">Edit CLASS</h3>
              </div>
            
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="card-body">

                <div class="form-group">
                    <label for="Name">Add Class Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Enter Class Name" name="name" value="{{ $getRecord->name}}" required>
                  </div>
                   
                  <div class="form-group">
                    <label for="Name">Add Subject Type</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" Enter Subject Type" name="type" value="{{ $getRecord->type}}" required>
                  </div>


                  <div class="form-group">
                    <label for="Name" >Status:</label><br>
                   <select name="status" id=""class="form-control" >
                    <option  {{($getRecord->status==0) ? 'selected' :''}} value="0">Active</option>
                    <option  {{($getRecord->status==1) ? 'selected' :''}} value="1">Inactive</option>
                   </select>
                  </div>
                 
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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