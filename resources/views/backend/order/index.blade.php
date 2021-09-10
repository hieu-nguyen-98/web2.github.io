@extends('backend.layouts.master')
@section('content')
	<div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                            <p class="float-right">Total Orders: {{\App\Models\Order::count()}} </p>
                        </div>            
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="col-lg-12">
                        @include('backend.layouts.notifcation')
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Brand</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name </th>
                                            <th>email</th>
                                            <th>Payment method</th>
                                            <th>Payment status</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $item)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$item->first_name}} {{$item->last_name}} </td>
                                            <td> {{$item->email}} </td>
                                            <td> {{$item->payment_method=="cod" ? "Cash On Delivery" : $item->payment_method}} </td>
                                            <td> {{ucfirst($item->payment_status)}}</td>
                                            <td> ${{number_format($item->total_amount,2)}}</td>
                                            <td><span class="badge 
                                                @if($item->condition=='pending')
                                                badge-info
                                                @elseif($item->condition=='processing')
                                                badge-primary
                                                @elseif($item->condition=='delivered')
                                                badge-success
                                                @else
                                                badge-dange
                                                @endif
                                                ">{{$item->condition}}</span></td>
                                            <td>
                                                <a href="  {{route('order.show',$item->id)}} " data-toggle="tooltip" title="edit" data-placement="bottom" class=" float-left btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                                <form class="float-left ml-2" action=" {{route('order.destroy',$item->id)}}" method="post" >
                                                @csrf
                                                @method('delete')
                                                <a href="" data-id="{{$item->id}}" data-toggle="tooltip" title="delete" data-placement="bottom" class="dltBtn btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                                                </form>
                                            </td>
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
                url: " {{route('brand.status')}} ",
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