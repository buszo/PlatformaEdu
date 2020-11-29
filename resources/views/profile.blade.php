{{--@php--}}
{{--    session_start();--}}
{{--@endphp--}}
@extends('adminLTE.dashboard')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div>
                <div class="lockscreen-item">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="../../dist/img/user4-128x128.jpg"
                                     alt="User profile picture">
                            </div>
                            @if($edit == 0)
                                @php
                                    if (isset($_SESSION['success'])) {
                                        $success = $_SESSION['success'];
                                        echo <<<ERROR
                                        <br>
                                        <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5><i class="icon fas fa-check"></i> Sukces!</h5>
                                        $success
                                        </div>
                                    ERROR;
                                        unset($_SESSION['success']);
                                        }
                                @endphp

                                <h3 class="profile-username text-center"> {{ Auth::user()->name }} </h3>

                                <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>ID: </b> <a class="float-right">{{ Auth::user()->id }}</a>
                                </ul>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Utworzone zadania: </b> <a
                                            class="float-right">{{ DB::table('task')->where('createdBy', Auth::user()->id)->count()}}</a>
                                </ul>

                                <a href="/user/edit/data" class="btn btn-primary btn-block"><b>Edytuj profil</b></a>
                                <a href="/user/edit/password" class="btn btn-primary btn-block"><b>Zmień hasło</b></a>
                                <a href="/user/upload" class="btn btn-primary btn-block"><b>Zmień awatar</b></a>
                            @elseif($edit == 1)
                                <form method="post" action="{{ route('userUpdate') }}">
                                    @csrf
                                    <hr>
                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="name" id="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Zapisz</button>
                                </form>
                                <hr>
                                <form method="post" action="{{ route('userUpdate') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Zapisz</button>
                                </form>
                            @elseif($edit == 2)
                                <br>
                                @php
                                    if (isset($_SESSION['error'])) {
                                        $error = $_SESSION['error'];
                                        echo <<<ERROR
                                        <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5><i class="icon fas fa-ban"></i> Błąd!</h5>
                                        $error
                                        </div>
                                    ERROR;
                                        unset($_SESSION['error']);
                                        }
                                @endphp
                                <form method="post" action="{{ route('changePassword') }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="password" name="current_password" class="form-control"
                                               placeholder="Password">
                                        @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" name="new_password" class="form-control"
                                               placeholder="New Password">
                                        @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" name="confirm_new_password" class="form-control"
                                               placeholder="Confirm New Password">
                                        @error('confirm_new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-block">Change password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <br>
                                @php
                                    if (isset($_SESSION['error'])) {
                                        $error = $_SESSION['error'];
                                        echo <<<ERROR
                                        <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5><i class="icon fas fa-ban"></i> Błąd!</h5>
                                        $error
                                        </div>
                                    ERROR;
                                        unset($_SESSION['error']);
                                        }
                                @endphp
                                <div class="card-body">
                                    <form action="upload" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="image" align="center" enctype="multipart/form-data">
                                        <br>
                                        <br>
                                        <input type="submit" class="btn btn-primary btn-block" value="Dodaj">
                                    </form>
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>



@endsection
