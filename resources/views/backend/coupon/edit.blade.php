@extends('backend.layouts.master')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Edit Coupon</h4>
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
			<form action=" {{route('coupon.update',$coupon->id)}} " method="POST" enctype="multipart/form-data">
			@csrf
			@method('patch')
				<div class="row">				
					<div class="col-md-6 mb-3">
						<label>Coupon Code</label>
						<input type="text" id="slug" onkeyup="ChangeToSlug();" class="form-control" name="code" value=" {{$coupon->code}} " >
					</div>
					<div class="col-md-12 mb-3">
						<label>Coupon value</label>
						<input type="text" class="form-control" name="value" value=" {{$coupon->value}} " >
					</div>
					<div class="col-md-12 mb-3">
						<label>Coupon type<span class="text-danger">*</span></label>
						<select name="type" class="form-control">
						  <option value="" >--Coupon type--</option>
						  <option value="fixed" {{$coupon->type== 'fixed' ? 'selected' : '' }} >Fixedd</option>
						  <option value="percent" {{$coupon->type== 'percent' ? 'selected' : '' }}>Percentage</option>						  
						</select>
					</div>
					<div class="col-md-12 mb-3">
						<select name="status" class="form-control">
						  <option>--Status--</option>
						  <option value="active" {{$coupon->status== 'active' ? 'selected' : '' }} >Active</option>
						  <option value="inactive" {{$coupon->status== 'inactive' ? 'selected' : '' }}>Inactive</option>						  
						</select>
					</div>


					<div class="col-md-1 mt-2">
						<button type="submit" class="btn btn-primary">Update</button>			
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