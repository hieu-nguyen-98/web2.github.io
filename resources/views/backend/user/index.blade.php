@extends('backend.layouts.master')
@section('content')
	<div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                            <p class="float-right">Total Users: {{\App\Models\User::count()}} </p>
                        </div>            
                    </div>
                    
                    <!-- DataTales Example -->
                    <div class="col-lg-12">
                        @include('backend.layouts.notifcation')
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $item)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> <img src="{{$item->photo}}" style="border-radius: 50%;" width="60" height="60" > </td>
                                            <td> {{$item->full_name}} </td>
                                            <td> {{$item->email}} </td>
                                            <td> {{$item->role}} </td>
                                            <td> <input type="checkbox" value=" {{$item->id}} " data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger" name="toggle"></td>
                                            <td>
                                                <a href="javascript:void(0); " data-toggle="modal" data-target="#userID{{$item->id}}" title="view" data-placement="bottom" class=" float-left btn btn-sm btn-outline-secondary "><i class="fas fa-eye"></i></a>
                                                <a href="{{route('user.edit',$item->id)}} " data-toggle="tooltip" title="edit" data-placement="bottom" class=" ml-2 float-left btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                                <form class="float-left" action=" {{route('user.destroy',$item->id)}}" method="post" >
                                                @csrf
                                                @method('delete')
                                                <a href="" data-id="{{$item->id}}" data-toggle="tooltip" title="delete" data-placement="bottom" class="dltBtn float-left btn btn-sm btn-outline-danger ml-2"><i class="fas fa-trash-alt"></i></a>
                                                </form>
                                            </td>

                                            <!--  modal -->
                                            <div class="modal fade" id="userID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                @php
                                                    $user = \App\Models\User::where('id',$item->id)->first();
                                                @endphp
                                                <div class="modal-content">
                                                    <div class="text-center">
                                                        <img src=" {{$user->photo}}" style="border-radius:50%; margin: 1.5rem 0; width: 80px; height: 80px;">  
                                                    </div>
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{\Illuminate\Support\Str::upper($user->full_name)}}({{\Illuminate\Support\Str::upper($user->username)}}) </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                             <strong>Username:</strong>
                                                             <p> {{$user->username}}</p> 
                                                        </div>
                                                        <div class="col-md-6">
                                                             <strong>Email:</strong>
                                                             <p> {{$user->email}} </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                             <strong>Phone:</strong>
                                                             <p> {{$user->phone}} </p>
                                                        </div>
                                                        <div class="col-md-4">
                                                             <strong>Address:</strong>
                                                             <p> {{$user->address}} </p>
                                                        </div>
                                                        <div class="col-md-4">
                                                             <strong>Role :</strong>
                                                             <p> {{$user->role}} </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <strong>Status:</strong>
                                                            <p class="badge badge-warning"> {{$user->status}} </p>
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
                url: " {{route('user.status')}} ",
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