@extends('admin.master')
@section('mainContent')
  

	<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			@if(Session::get('message'))
				<div class="alert alert-success">
					{{ Session::get('message') }}
				</div>
			@endif
			@if(Session::get('error'))
				<div class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
			@endif
			
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				
				@foreach($categories as $category)
                <tr>
                  <td>{{ $category->name }}</td>
                  <td>
					@if($category->flag == 1)
						<span class="label label-success">Active</span>
					@else
						<span class="label label-danger">Inactive</span>
					@endif
				  </td>
                  <td>
                  
						<a href="{{ route('category.show', $category->id) }}" class="btn btn-xs btn-success" title="view"><i class="fa fa-eye"></i></a>
						<a href="{{ route('category.edit', $category->id) }}" class="btn btn-xs btn-primary" title="edit"><i class="fa fa-edit"></i></a>
						<a href="#" class="btn btn-xs btn-danger" title="delete" data-toggle="modal" data-target="#modal-warning"><i class="fa fa-trash"></i></a>
						{!! Form::open(array('url' => 'category/' . $category->id, 'class' => 'float-left','id' => 'delete_form')) !!}
							{!! Form::hidden('_method', 'DELETE') !!}
						{!! Form::close() !!}
						
				  </td>
                </tr>
				@endforeach
				
				</tbody>
                
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
	