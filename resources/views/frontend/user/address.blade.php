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
              <div class="col-md-12 mt-2">
                <div class="col-md-6">
                  <h6 class="mb-3">Billing Adress</h6>
                  <address>
                    {{$user->address}} <br>
                    {{$user->state}}, {{$user->city}} <br>
                    {{$user->country}} <br>
                    {{$user->postcode}}
                  </address>
                  <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editAddress">Edit Address</a>
                  <!-- Modal -->
                  <div class="modal fade" id="editAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{route('billing.address',$user->id)}}" method="POST">
                              @csrf
                            <div class="modal-body">
                                  <div class="row">
                                     <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="">Address</label>
                                         <input type="postcode" name="address" class="form-control" value="{{$user->address}}">
                                       </div>
                                     </div>
                                      <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="">Country</label>
                                         <input type="text" name="country" class="form-control" value="{{$user->country}}">
                                       </div>
                                     </div>
                                      <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="">Poscode</label>
                                         <input type="text" name="postcode" class="form-control" value="{{$user->postcode}}">
                                       </div>
                                     </div>
                                      <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="">State</label>
                                         <input type="text" name="state" class="form-control" value="{{$user->state}}">
                                       </div>
                                     </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                         <label for="">City</label>
                                         <input type="text" name="city" class="form-control" value="{{$user->city}}">
                                       </div>
                                     </div>
                                    </div>                        
                                  </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                <h6 class="mb-3">Shipping Adress</h6>
                <address>
                    {{$user->saddress}} <br>
                    {{$user->sstate}}, {{$user->scity}} <br>
                    {{$user->scountry}} <br>
                    {{$user->spostcode}}
                  </address>
                 <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editSaddress">Edit Address</a>
                  <div class="modal fade" id="editSaddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                           <form action=" {{route('shipping.address',$user->id)}} " method="post">
                            @csrf
                              <div class="row">
                                 <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="">Shipping Address</label>
                                     <input type="text" name="saddress" class="form-control" value="{{$user->saddress}}">
                                   </div>
                                 </div>
                                  <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="">Shipping Country</label>
                                     <input type="text" name="scountry" class="form-control" value="{{$user->scountry}}">
                                   </div>
                                 </div>
                                  <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="">Shipping Poscode</label>
                                     <input type="text" name="spostcode" class="form-control" value="{{$user->spostcode}}">
                                   </div>
                                 </div>
                                  <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="">Shipping State</label>
                                     <input type="text" name="sstate" class="form-control" value="{{$user->sstate}}">
                                   </div>
                                 </div>
                                  <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="">Shipping City</label>
                                     <input type="text" name="scity" class="form-control" value="{{$user->scity}}">
                                   </div>
                                 </div>
                                 <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>      
                            </form>
                        </div>
                        
                      </div>
                    </div>
                </div>
              </div>
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