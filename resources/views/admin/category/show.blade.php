@extends('admin.master')
@section('mainContent')
  

	<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       
          <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Category Details</h3>
        </div>
           <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Category Name</th>
                  <td>{{ $category_by_id->name }}</td>
                </tr>
                <tr>
                  <th>Category Description</th>
                  <td>{{ $category_by_id->description }}</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>
					@if($category_by_id->flag == 1)
						<span class="label label-success">Active</span>
					@else
						<span class="label label-danger">Inactive</span>
					@endif
					
				  </td>
                </tr>
                
              </table>
            </div>
        <!-- /.box-body -->
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
	