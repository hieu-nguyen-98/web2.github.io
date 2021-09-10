@extends('backend.layouts.master')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Edit Settings</h4>
		</div>
		<div class="col-lg-12">
                        @include('backend.layouts.notifcation')
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
			<form action=" {{route('setting.update')}} " method="POST" enctype="multipart/form-data">
				@method('put')
			@csrf
				<div class="row">
					
					<div class="col-md-6 mb-3">
						<label>Project Title</label>
						<input type="text" id="slug" onkeyup="ChangeToSlug();" class="form-control" name="title" value=" {{$settings->title}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Meta Keywords</label>
						<input type="text" id="slug" onkeyup="ChangeToSlug();" class="form-control" name="meta_keywords" value=" {{$settings->meta_keywords}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Footer</label>
						<input type="text" class="form-control" name="footer" value=" {{$settings->footer}} " >
					</div>
					<div class="col-md-12 mb-3">
						<label>Meta Description</label>
					<textarea  name="meta_description" class="form-control" rows="5"> {{$settings->meta_description}} </textarea>
					</div>

					<div class="col-md-6 mb-3">
						<div class="form-group">
							<label>Logo</label>
							<div class="input-group">
								<span class="input-group-btn">
									<a  id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"><i class="fa fa-picture-o"></i>Choose</a>
								</span>
								<input type="text" class="form-control" id="thumbnail" name="logo" value="{{$settings->logo}}">
							</div>
							<div id="holder" style="margin-top: 15px;max-height: 100px;"></div>
						</div>
					</div>

					<div class="col-md-6 mb-3">
						<div class="form-group">
							<label>Favicon</label>
							<div class="input-group">
								<span class="input-group-btn">
									<a  id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary"><i class="fa fa-picture-o"></i>Choose</a>
								</span>
								<input type="text" class="form-control" id="thumbnail1" name="favicon" value="{{$settings->favicon}}">>
							</div>
							<div id="holder1" style="margin-top: 15px;max-height: 100px;"></div>
						</div>
					</div>

					<div class="col-md-6 mb-3">
						<label>Email Address</label>
						<input type="text" class="form-control" name="email" value=" {{$settings->email}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label> Address</label>
						<input type="text" class="form-control" name="address" value=" {{$settings->address}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Phone</label>
						<input type="text" class="form-control" name="phone" value=" {{$settings->phone}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Fax</label>
						<input type="text" class="form-control" name="fax" value=" {{$settings->fax}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Facebook URL</label>
						<input type="text" class="form-control" name="facebook_url" value=" {{$settings->facebook_url}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Twitter URL</label>
						<input type="text" class="form-control" name="twitter_url" value=" {{$settings->twitter_url}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Linked URL</label>
						<input type="text" class="form-control" name="linked_url" value=" {{$settings->linked_url}} " >
					</div>
					<div class="col-md-6 mb-3">
						<label>Pinterest</label>
						<input type="text" class="form-control" name="pinterest" value=" {{$settings->pinterest}} " >
					</div>

					<div class="col-md-1 mt-2">
						<button type="submit" class="btn btn-primary">Update</button>			
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
		$('#lfm1').filemanager('image');
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
        $('#description').summernote();
    });
	</script>
@endsection