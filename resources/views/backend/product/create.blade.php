@extends('backend.layouts.master')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Add Product</h4>
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
			<form action=" {{route('product.store')}} " method="POST" enctype="multipart/form-data">
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
						<label>Summary</label>
						<textarea id="summary" class="form-control" placeholder="Some text..." name="summary"> {{old('summary')}} </textarea>
					</div>
					<div class="col-md-12 mb-3">
						<label>Description</label>
						<textarea id="description" name="description" class="form-control" rows="5"> {{old('description')}} </textarea>
					</div>
					<div class="col-md-12 mb-3">
						<div class="form-group">
							<label>Stock<span class="text-danger">*</span></label>
							<input type="number" class="form-control" placeholder="Stock" name="stock" value="{{old('stock')}}">
						</div>						
					</div>
					<div class="col-md-12 mb-3">
						<div class="form-group">
							<label>Price<span class="text-danger">*</span></label>
							<input type="number" step="any" class="form-control" placeholder="Price" name="price" value="{{old('price')}}">
						</div>						
					</div>
					<div class="col-md-12 mb-3">
						<div class="form-group">
							<label>Discount<span class="text-danger">*</span></label>
							<input type="number" min="0" max="100" class="form-control" placeholder="Discount" name="discount" value="{{old('discount')}}">
						</div>						
					</div>
					<div class="col-md-12 mb-3">
						<label>Brands<span class="text-danger">*</span></label>
						<select name="brand_id" class="form-control">
						  <option value="" >--- Brand ---</option>
						  @foreach(\App\Models\Brand::get() as $brand)
						  	<option value=" {{$brand->id}} " {{old('brand_id')==$brand->id ? 'selected' :''}} > {{$brand->title}} </option>
						  @endforeach						  
						</select>
					</div>
					<div class="col-md-12 mb-3">
						<label>Category<span class="text-danger">*</span></label>
						<select id="cat_id" name="cat_id" class="form-control">
						  <option value="" >--Category--</option>
						  @foreach(\App\Models\Category::where('is_parent',1)->get() as $cat)
						  	<option value=" {{$cat->id}} " {{old('cat_id')==$cat->id ? 'selected' :''}}> {{$cat->title}} </option>
						  @endforeach						  
						</select>
					</div>
					<div class="col-md-12 mb-3 d-none" id="child_cat_div">
						<label>Child Category<span class="text-danger">*</span></label>
						<select id="chil_cat_id" name="child_cat_id" class="form-control">			  
						</select>
					</div>
					<div class="col-md-12 mb-3">
						<label>Size<span class="text-danger">*</span></label>
						<select name="size" class="form-control">
						  <option value="" >--Size--</option>
						  <option value="S" {{old('size')== 'S' ? 'selected' : '' }} >Small</option>
						  <option value="M" {{old('size')== 'M' ? 'selected' : '' }}>Medium</option>
						  <option value="L" {{old('size')== 'L' ? 'selected' : '' }}>large</option>
						  <option value="XL" {{old('size')== 'XL' ? 'selected' : '' }}>Extra Large</option>
						</select>
					</div>
					<div class="col-md-12 mb-3">
						<label>Condition<span class="text-danger">*</span></label>
						<select name="conditions" class="form-control">
						  <option value="" >--Conditions--</option>
						  <option value="new" {{old('conditions')== 'new' ? 'selected' : '' }} >New</option>
						  <option value="popular" {{old('conditions')== 'popular' ? 'selected' : '' }}>Popular</option>
						  <option value="winter" {{old('conditions')== 'winter' ? 'selected' : '' }}>Winter</option>						  
						</select>
					</div>
					<div class="col-md-12 mb-3">
						<select name="status" class="form-control">
						  <option>--Status--</option>
						  <option value="active" {{old('status')== 'active' ? 'selected' : '' }} >Active</option>
						  <option value="inactive" {{old('status')== 'inactive' ? 'selected' : '' }}>Inactive</option>						  
						</select>
					</div>
					<div class="col-md-12 mb-3">
						<label>Vendors<span class="text-danger">*</span></label>
						<select name="vendor_id" class="form-control">
						  <option value="" >--Vendors--</option>
						  @foreach(\App\Models\User::where('role','vendor')->get() as $vendor)
						  	<option value=" {{$vendor->id}} " {{old('vendor_id')==$vendor->id ? 'selected' :''}} > {{$vendor->full_name}} </option>
						  @endforeach						  
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
	<script type="text/javascript">
		$(document).ready(function() {
        $('#summary').summernote();
    });
	</script>
	<script>
		var chil_cat_id = {{$cat->chil_cat_id}};
		$('#cat_id').change(function(){
			var cat_id = $(this).val();
			// alert(cat_id);
			if (cat_id != null) {
				$.ajax({
					url:"/admin/category/"+cat_id+"/child",
					type:"POST",
					data:{
						_token:"{{csrf_token()}}",
						cat_id:cat_id,
					},
					success:function(response){
						console.log(response);
						var html_option="<option value=''>--- Child Category ---</option>"
						if (response.status) {
							$('#child_cat_div').removeClass('d-none');
							$.each(response.data,function(id,title){
								html_option +="<option value='"+id+"' "+(chil_cat_id==id ? 'selected' : '')+" >"+title+"</option>"
							});
						}else
						{
							$('#child_cat_div').addClass('d-none');

						}
						$('#chil_cat_div').html(html_option);
					}
				});
			}
		});
		if (chil_cat_id != null) {
			$('#cat_id').change();
		}
	</script>
@endsection