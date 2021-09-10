@extends('backend.layouts.master')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Add User</h4>
		</div>
		@if ($errors->any())
            <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
            </div>
        @endif
		<div class="card-body">
			<form action=" {{route('user.store')}} " method="POST" enctype="multipart/form-data">
			@csrf
				<div class="row">
					
					<div class="col-md-6 mb-3">
						<label>Full Name</label>
						<input type="text" id="slug" onkeyup="ChangeToSlug();" class="form-control" name="full_name" value=" {{old('full_name')}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Slug</label>
						<input type="text"  id="convert_slug" class="form-control" name="slug" value=" {{old('slug')}} ">
					</div>
					<div class="col-md-6 mb-3">
						<label>UserName</label>
						<input type="text" class="form-control" name="username" value=" {{old('username')}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Email</label>
						<input type="text" class="form-control" name="email" value=" {{old('email')}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Password</label>
						<input type="password" class="form-control" name="password" value=" {{old('password')}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Phone</label>
						<input type="text" class="form-control" name="phone" value=" {{old('phone')}} " >
					</div>
					<div class="col-md-12 mb-3">
						<label>Address</label>
						<input type="text" class="form-control" name="address" value=" {{old('address')}} " >
					</div>
					<div class="col-md-12 mb-3">
						<div class="form-group">
							<label>Image</label>
							<div class="input-group">
								<span class="input-group-btn">
									<a  id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"><i class="fa fa-picture-o"></i>Choose</a>
								</span>
								<input type="text" class="form-control" id="thumbnail" name="photo">
							</div>
							<div id="holder" style="margin-top: 15px;max-height: 100px;"></div>
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<label>Role<span class="text-danger">*</span></label>
						<select name="role" class="form-control">
						  <option value="" >--Role--</option>
						  <option value="admin" {{old('role')== 'admin' ? 'selected' : '' }} >Admin</option>
						  <option value="customer" {{old('role')== 'customer' ? 'selected' : '' }} >Customer</option>
						  <option value="vendor" {{old('role')== 'vendor' ? 'selected' : '' }}>Vendor</option>						  
						</select>
					</div>
					<div class="col-md-12 mb-3">
						<select name="status" class="form-control">
						  <option>--Status--</option>
						  <option value="active" {{old('status')== 'active' ? 'selected' : '' }} >Active</option>
						  <option value="inactive" {{old('status')== 'inactive' ? 'selected' : '' }}>Inactive</option>						  
						</select>
					</div>


					<div class="col-md-1 mt-2">
						<button type="submit" class="btn btn-primary">Submit</button>			
					</div>
					<div class="col-md-1 mt-2">
						<a href=" {{route('admin')}} " onclick="return confirm('Are you sure?');" class="btn btn-success">Cancel</a>			
					</div>
				</div>
				
			</form>
			
		</div>
	</div>
@endsection
@section('scripts')
	<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
	<script type="text/javascript">
		$('#lfm').filemanager('image');
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
        $('#description').summernote();
    });
	</script>
@endsection