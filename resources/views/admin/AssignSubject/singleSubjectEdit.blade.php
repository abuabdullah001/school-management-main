@include('layouts.app1')

<div class="container-fluid">
  

        <div class="row">
          <!-- left column -->
      
          <div class="col-md-4">
          </div>
          <div class="col-md-6">
         
            <!-- general form elements -->
            <div class="card card-primary mt-2">
            @if (session('error'))
                        <div class="alert alert-info">{{ session('error')}}</div>
              @endif

              @if (session('success'))
                        <div class="alert alert-success">{{ session('success')}}</div>
              @endif
              <div class="card-header ">
                <h3 class="card-title">ASSIGN SUBJECT EDIT TO CLASS</h3>
              </div>
            
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="card-body">

                <div class="form-group">
                    <label for="Name">Add Class Name</label>
                   <select name="class_id" id=""class="form-control">
                    <option value="">Select Class</option>
                   @foreach($getClass as $class)
                   <option {{ ($getrecord->class_id==$class->id)?'selected':''}} value="{{$class->id}}">{{$class->name}}</option>
                   @endforeach
                   </select>
                </div>
             
                <div class="form-group">
                    <label for="Name">Add Subject Name</label>
                   <select name="subject_id" id=""class="form-control">
                    <option value="">Select Class</option>
                 @foreach($getSubject as $subject)
                 <option {{ ($getrecord->subject_id==$subject->id)?'selected':''}} value="{{$subject->id}}">{{$subject->name}}</option>
                 @endforeach
                   </select>
                </div>
             
               

                  <div class="form-group">
                    <label for="Name" >Status:</label><br>
                   <select name="status" id=""class="form-control">
                    <option {{ ($getrecord->status==0)?'selected':''}}  value="0">Active</option>
                    <option {{ ($getrecord->status==1)?'selected':''}}  value="1">Inactive</option>
                   </select>
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