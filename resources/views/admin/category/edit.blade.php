@extends('admin.master')
@section('mainContent')
  

	<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Category</h3>
            </div>
            <!-- /.box-header -->
            
            
			<!-- form start -->
			<form action="{{ route('category.update', $category_by_id->id) }}" method="post">
               @method('PUT')
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
                  <input type="text" class="form-control" name="name" id="name" value="{{ $category_by_id->name }}" placeholder="Enter Category Name" required="required">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" id="description" placeholder="Enter Category Description" required="required">{{ $category_by_id->description }}</textarea>
                </div>
                <div class="form-group">
                  <label for="name">Status</label>
                  <select name="flag" class="form-control">
					<option value="1" {{ $category_by_id->flag == 1 ? 'selected':'' }}>Active</option>
					<option value="0" {{ $category_by_id->flag == 0 ? 'selected':'' }}>Inactive</option>
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
	