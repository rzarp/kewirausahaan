@extends('admin.base')
@section('title', 'Data master user')
@section('user')

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Tables</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tables</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Basic Tables</a>
            </li>
        </ul>
    </div>


    <!-- Modal Insert -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.post') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" placeholder="Nama" name="name">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                            @error('username')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="role">
                                @foreach($role as $r)
                                    <option value="{{ $r }}" {{ old('role') == $r ? 'selected' : '' }}>{{ $r }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button id="exampleModal" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form-edit" enctype="multipart/form-data" class="form-horizontal">
                    @method('PUT')
                    @csrf

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="edit-name" placeholder="Nama" name="name">

                        </div>


                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="edit-username" placeholder="Username" name="username">
                            @error('username')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="edit-email" name="email" placeholder="Enter Email">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="edit-password" name="password" placeholder="Enter Password">
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="edit-role">
                                @foreach($role as $r)
                                    <option value="{{ $r }}">{{ $r }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button id="editModal" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Add Row</h4>

                    <button type="btn btn-primary" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i>
                        Input Data
                    </button>
                </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>email</th>
                                    <th>role</th>
                                    <th>status user</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            @if($user->isEmpty())
                            <tbody>
                                <tr>
                                    <td class="text-center" colspan="8">Data Tidak Ada</td>
                                </tr>
                            </tbody>
                            @else
                                @foreach($user as $users)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$users->name}}</td>
                                        <td>{{$users->username}}</td>
                                        <td>{{$users->password}}</td>
                                        <td>{{$users->email}}</td>
                                        <td>{{$users->role}}</td>
                                        <td class="fs-sm">
                                            <form action="{{url('/user')}}/update/toggle/{{ $users->id }}" method="POST">
                                                @csrf
                                                <span class="fs-sm">{{ $users->status_user == 1 ? 'Active' : 'Non Active' }}</span>
                                                <div class="form-check form-switch">
                                                    <input onchange="this.form.submit()" class="form-check-input" type="checkbox" data-toggle="toggle" {{ $users->status_user == 1 ? 'checked' : '' }}>
                                                </div>
                                            </form>
                                        </td>
                                        <td>


                                        <div class="form-button-action">
                                        <button value="{{$users->id}}" class="btn btn-link btn-primary btn-lg" onclick="editmodal('{{$users->id}}')">
                                                <i class="fa fa-edit"></i>
                                        </button>
                                        {{-- <form action="{{ url('/user/user/delete/' . $users->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-link btn-danger btn-lg" data-confirm-delete="true">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form> --}}
                                        <a href="{{ url('/user/user/delete/' . $users->id) }}" class="btn btn-link btn-danger btn-lg delete-confirm" data-id="{{ $users->id }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        </div>



                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            @endif

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script type="text/javascript">

      function editmodal(id) {
        $.get('user/edit/'+id, function (data) {
                $('#editModal').modal('show');
                $('#form-edit').attr('action','user/update/'+id);
                $('#edit-name')[0].value = data.name;
                $('#edit-username')[0].value = data.username;
                $('#edit-email')[0].value = data.email;
                $('#edit-password')[0].value = data.password;
                $('#edit-role')[0].value = data.role;
                console.log(data.name);
            })
      }
      $(document).ready(function () {

      });

  </script>


<script>
    $('body').on('click','.delete-confirm',function (event) {
      event.preventDefault();
      const url = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Kamu Yakin ? ',
        text: "Hapus Data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus'
      }).then((result) => {
        if (result.value) {
          window.location.href = url;
        }
      })
    });
  </script>
@endpush

