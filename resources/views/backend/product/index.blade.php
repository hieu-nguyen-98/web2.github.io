@extends('backend.layouts.master')
@section('content')
	<div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                            <p class="float-right">Total Products: {{\App\Models\Product::count()}} </p>
                        </div>            
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="col-lg-12">
                        @include('backend.layouts.notifcation')
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Title</th>
                                            <th>Photo</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Size</th>
                                            <th>Condition</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $item)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$item->title}} </td>
                                            <td> <img src="{{$item->photo}}" width="120" height="70" > </td>
                                            <td> {{number_format($item->price,3)}} </td>
                                            <td> {{$item->discount}}% </td>
                                            <td> {{$item->size}}</td>
                                            <td>
                                                @if($item->condition=='new')
                                                <span class="badge badge-success"> {{$item->condition}} </span>
                                                @elseif($item->condition='popular')
                                                <span class="badge badge-warning"> {{$item->condition}} </span>
                                                @else
                                                <span class="badge badge-primary"> {{$item->condition}} </span>
                                                @endif
                                            </td>
                                            <td> <input type="checkbox" value=" {{$item->id}} " data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger" name="toggle"></td>
                                            <td>
                                                <a href="javascript:void(0); " data-toggle="modal" data-target="#productID{{$item->id}}" title="view" data-placement="bottom" class=" float-left btn btn-sm btn-outline-secondary "><i class="fas fa-eye"></i></a>
                                                <a href="  {{route('product.edit',$item->id)}} " data-toggle="tooltip" title="edit" data-placement="bottom" class=" float-left btn btn-sm btn-outline-warning ml-2"><i class="fas fa-edit"></i></a>
                                                <form class="float-left ml-2" action=" {{route('product.destroy',$item->id)}}" method="post" >
                                                @csrf
                                                @method('delete')
                                                <a href="" data-id="{{$item->id}}" data-toggle="tooltip" title="delete" data-placement="bottom" class="dltBtn btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                                                </form>
                                            </td>

                                           <!--  modal -->
                                            <div class="modal fade" id="productID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                @php
                                                    $product = \App\Models\Product::where('id',$item->id)->first();
                                                @endphp
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{$product->title}} </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                             <strong>Summary:</strong>
                                                             <p> {!! html_entity_decode($product->summary)!!} </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <strong>Description:</strong>
                                                             <p> {!! html_entity_decode($product->description)!!} </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                             <strong>Price:</strong>
                                                             <p> {{number_format($product->price)}} </p>
                                                        </div>
                                                        <div class="col-md-4">
                                                             <strong>Offer Price:</strong>
                                                             <p> {{number_format($product->offer_price)}} </p>
                                                        </div>
                                                        <div class="col-md-4">
                                                             <strong>Stock :</strong>
                                                             <p> {{$product->stock}} </p>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-6">
                                                             <strong>Discount:</strong>
                                                             <p> {{$product->discount}}% </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <strong>Category:</strong>
                                                            <p> {{\App\Models\Category::where('id',$product->cat_id)->value('title')}} </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                             <strong>Brand:</strong>
                                                             <p> {{\App\Models\Brand::where('id',$product->brand_id)->value('title')}} </p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <strong> Size:</strong>
                                                            <p class="badge badge-success"> {{$product->size}} </p>
                                                        </div>
                                                         <div class="col-md-4">
                                                             <strong>Vendor:</strong>
                                                             <p> {{\App\Models\User::where('id',$product->vendor_id)->value('full_name')}} </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                             <strong> Conditions:</strong>
                                                            <p class="badge badge-primary"> {{$product->conditions}} </p>
                                                            </div>
                                                        <div class="col-md-6">
                                                            <strong>Status:</strong>
                                                            <p class="badge badge-warning"> {{$product->status}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                  
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('input[name=toggle]').change(function(){
            var mode=$(this).prop('checked');
            var id =$(this).val();
            // alert(id);
            $.ajax({
                url: " {{route('product.status')}} ",
                type: "POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function(response){
                    if (response.status) {
                        alert(response.msg);
                    }else
                    {
                        alert('Please try again!');
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e){
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            e.preventDefault();
            swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
        });
    </script>
@endsection