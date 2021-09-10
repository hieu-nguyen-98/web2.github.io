@extends('backend.layouts.master')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Add Banner</h4>
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
			<form action=" {{route('banner.store')}} " method="POST" enctype="multipart/form-data">
			@csrf
				<div class="row">
					
					<div class="col-md-6 mb-3">
						<label>Title</label>
						<input type="text" id="slug" onkeyup="ChangeToSlug();" class="form-control" name="title" value=" {{old('title')}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Slug</label>
						<input type="text"  id="convert_slug" class="form-control" name="slug" value=" {{old('slug')}} ">
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
						<label>Description</label>
					<textarea id="description" name="description" class="form-control" rows="5"> {{old('description')}} </textarea>
					</div>

					<div class="col-md-12 mb-3">
						<label>Condition<span class="text-danger">*</span></label>
						<select name="condition" class="form-control">
						  <option value="" >--Conditions--</option>
						  <option value="banner" {{old('condition')== 'banner' ? 'selected' : '' }} >Banner</option>
						  <option value="promo" {{old('condition')== 'promo' ? 'selected' : '' }}>Promote</option>						  
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