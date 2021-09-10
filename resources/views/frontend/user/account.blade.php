@extends('frontend.layouts.master')
@section('content')
  
  <main class="main-container">
<!--Checkout Area Start-->
<section class="checkout-area area-padding ptb-40">
  <!-- Begin checkout -->
  <div class="container-fluid">
      <div class="row">
        <div class="sidebar col-md-2">
          @include('frontend.user.sidebar')
        </div>
        <div class="col-md-2"></div>
        <div class="sidebar col-md-8">
            <span>Hello <strong>{{$user->full_name}}</strong> </span>
            <form></form>
            <div class="row">
              <div class="col-md-11 mt-2">
                <h5 class="mb-3 text-danger">Account Details</h5>
              <form action=" {{route('account.update',$user->id)}} " method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <label>Full Name</label>            
                      <input type="text" class="form-control" name="full_name" value=" {{$user->full_name}} ">
                      @error('full_name')
                        <p class="text-danger"> {{$message}} </p>
                      @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Display Name</label>            
                      <input type="text" class="form-control" name="username" value=" {{$user->username}} ">
                      @error('username')
                        <p class="text-danger"> {{$message}} </p>
                      @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Phone</label>            
                      <input type="text" class="form-control" name="phone" value=" {{$user->phone}}" >
                      @error('phone')
                        <p class="text-danger"> {{$message}} </p>
                      @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Email</label>            
                      <input type="email" class="form-control" name="email" value=" {{$user->email}}">
                      @error('email')
                        <p class="text-danger"> {{$message}} </p>
                      @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Address</label>            
                      <input type="text" class="form-control" name="address" value=" {{$user->address}}">
                      @error('address')
                        <p class="text-danger"> {{$message}} </p>
                      @enderror
                  </div>
                  <div class="col-md-12">
                    <label>Current Password</label>            
                      <input type="password" class="form-control" name="oldpassword">
                      @error('oldpassword')
                        <p class="text-danger"> {{$message}} </p>
                      @enderror
                  </div>
                  <div class="col-md-12">
                    <label>New Password</label>            
                      <input type="password" class="form-control" name="newpassword">
                      @error('newpassword')
                        <p class="text-danger"> {{$message}} </p>
                      @enderror
                  </div>
                  <div class="col-md-2 mt-3">
                    <input type="submit" name="" value="Save" class="btn btn-primary form-control">
                  </div>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div>
  </div>
  <!-- /.ld-subpage-content -->
  <!-- End checkout -->
</section>
<!--End of Checkout Area-->


</main>
@endsection