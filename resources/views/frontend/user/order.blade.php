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
            <div class="row">
              <div class="col-md-11 mt-2">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#Order</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
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