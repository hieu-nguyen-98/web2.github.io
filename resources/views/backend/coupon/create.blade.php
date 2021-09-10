@extends('backend.layouts.master')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Add Coupon</h4>
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
			<form action=" {{route('coupon.store')}} " method="POST" enctype="multipart/form-data">
			@csrf
				<div class="row">
					
					<div class="col-md-6 mb-3">
						<label>Coupon Code</label>
						<input type="text" id="slug" onkeyup="ChangeToSlug();" class="form-control" name="code" value=" {{old('code')}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Slug</label>
						<input type="text"  id="convert_slug" class="form-control" name="slug" value=" {{old('slug')}} ">
					</div>
					<div class="col-md-12 mb-3">
						<label>Coupon value</label>
						<input type="text" class="form-control" name="value" value=" {{old('value')}} " >
					</div>
					<div class="col-md-12 mb-3">
						<label>Coupon type<span class="text-danger">*</span></label>
						<select name="type" class="form-control">
						  <option value="" >--Coupon type--</option>
						  <option value="fixed" {{old('type')== 'fixed' ? 'selected' : '' }} >Fixed</option>
						  <option value="percent" {{old('type')== 'percent' ? 'selected' : '' }}>Percentage</option>						  
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