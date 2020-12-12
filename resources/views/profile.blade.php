{{--@php--}}
{{--    session_start();--}}
{{--@endphp--}}
@extends('adminLTE.dashboard')

@section('content')
<style>
    .profile-user-img:hover {
        opacity: 0.5;
    }

    .image-background {
        background: #eeeeee;
        border-radius: 50%;
    }
</style>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb" style="margin-bottom:35px;">
            <h3>Profil użytkownika</h3>
          </nav>
          <!-- /Breadcrumb -->
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
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">

                  <div class="d-flex flex-column align-items-center text-center ">
                  <a class="image-background" href="/user/upload">
                    <img style="border-radius:50%; width:150px; height:150px;" class="profile-user-img" src="../../images/{{ DB::table('avatars')->where('user_id', Auth::user()->id)->value('hashName') }}" class="rounded-circle">
                  </a>
                    <div class="mt-3">
                        <h4>
                        {{ Auth::user()->name }}
                        </h4>
                      <p class="text-secondary mb-1">Głos kraju bez pracy - to my Polacy</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Strona</h6>
                    <span class="text-secondary"><a href="# ">Jakiś link</a></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <a href="/user/edit/data" class="btn btn-primary btn-block"><b>Edytuj profil</b></a>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <a href="/user/edit/password" class="btn btn-primary btn-block"><b>Zmień hasło</b></a>
                  </li>
                                
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nazwa użytkownika</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::user()->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ Auth::user()->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Utworzone zadania</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ DB::table('task')->where('createdBy', Auth::user()->id)->count()}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Utworzone arkusze</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ DB::table('sheets')->where('user_id', Auth::user()->id)->count()}}
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
              
            </div>
          </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div>
                <div class="lockscreen-item">

                    
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
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>



@endsection
