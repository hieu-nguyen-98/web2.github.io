@extends('backend.layouts.master')
@section('content')
	<div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                            <p class="float-right">Total Category: {{\App\Models\Category::count()}} </p>
                        </div>            
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="col-lg-12">
                        @include('backend.layouts.notifcation')
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Title</th>
                                            <th>Photo</th>
                                            <th>Is Parent</th>
                                            <th>Parents</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $item)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$item->title}} </td>
                                            <td> <img src="{{$item->photo}}" width="120" height="70" > </td>
                                            <td> {{$item->is_parent==1 ? 'Yes' : 'No'}} </td>
                                            <td> {{\App\Models\Category::where('id',$item->parent_id)->value('title')}} </td>
                                            <td> <input type="checkbox" value=" {{$item->id}} " data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger" name="toggle"></td>
                                            <td>
                                                <a href="  {{route('category.edit',$item->id)}} " data-toggle="tooltip" title="edit" data-placement="bottom" class=" float-left btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                                <form class="float-left ml-2" action=" {{route('category.destroy',$item->id)}}" method="post" >
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
                url: " {{route('category.status')}} ",
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