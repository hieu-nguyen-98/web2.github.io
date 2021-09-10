@extends('backend.layouts.master')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Edit Category</h4>
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
			<form action=" {{route('category.update',$category->id)}} " method="POST" enctype="multipart/form-data">
			@csrf
			@method('patch')
				<div class="row">
					
					<div class="col-md-6 mb-3">
						<label>Title</label>
						<input type="text" id="slug" onkeyup="ChangeToSlug();" class="form-control" name="title" value=" {{$category->title}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Slug</label>
						<input type="text"  id="convert_slug" class="form-control" name="slug" value=" {{$category->slug}} ">
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
						<label>Summary</label>
						<textarea id="description" name="summary" class="form-control" rows="5"> {{$category->summary}} </textarea>
					</div>
					<div class="col-md-12 mb-3">
						<div class="form-group">
							<label>Is Parent :</label>
							<input id="is_parent" type="checkbox" name="is_parent" value=" {{$category->is_parent}} " {{$category->is_parent==1 ? 'checked' : ''}} >Yes
						</div>
					
					</div>
					<div class="col-md-12 mb-3 {{$category->is_parent==1 ? 'd-none' : ''}}" id="parent_cat_div">
						<label for="status">Parent Category</label>
						<select name="parent_id" class="form-control">
						  <option value="">--Parent Category--</option>
						  @foreach($parent_cats as $pcats)
						  	<option value=" {{$pcats->id}} " {{$pcats->id==$category->parent_id ? 'selected' : ''}} > {{$pcats->title}} </option>
						  @endforeach		  
						</select>	
					</div>
					<div class="col-md-12 mb-3">
						<label for="status">Status</label>
						<select name="status" class="form-control">
						  <option>--Status--</option>
						  <option value="active" {{old('status')== 'active' ? 'selected' : '' }} >Active</option>
						  <option value="inactive" {{old('status')== 'inactive' ? 'selected' : '' }}>Inactive</option>						  
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
	<script>
		$('#is_parent').change(function(e){
			e.preventDefault();
			var is_checked = $('#is_parent').prop('checked');
			// alert('is_checked');
			if (is_checked) {
				$('#parent_cat_div').addClass('d-none');
				$('#parent_cat_div').val('');

			}else
			{
				$('#parent_cat_div').removeClass('d-none');
			}
		});
	</script>
@endsection