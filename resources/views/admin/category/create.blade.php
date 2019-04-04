@extends('admin.master')
@section('mainContent')
  

	<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Category</h3>
            </div>
            <!-- /.box-header -->
            
            
			<!-- form start -->
			<form action="{{ route('category.store') }}" method="post">
              @csrf
			  <div class="box-body">
				
				@if($errors->any())
				<div class="alert alert-danger">
					<ul class="list-unstyled">
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name" required="required">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" id="description" placeholder="Enter Category Description" required="required"></textarea>
                </div>
                <div class="form-group">
                  <label for="name">Status</label>
                  <select name="flag" class="form-control">
					<option value="1">Active</option>
					<option value="0">Inactive</option>
				  </select>
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
       
      
	  </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
	<!-- DataTables -->
<script src="{{ asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

	
	@endsection
	