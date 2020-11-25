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
                        @if($edit == False)
                            <h3 class="profile-username text-center"> {{ Auth::user()->name }} </h3>

                            <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>ID: </b> <a class="float-right">{{ Auth::user()->id }}</a>
                            </ul>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Utworzone zadania: </b> <a class="float-right">{{ DB::table('task')->where('createdBy', Auth::user()->id)->count()}}</a>
                            </ul>

                            <a href="/user/edit" class="btn btn-primary btn-block"><b>Edytuj profil</b></a>
                        @else
                            <form method="post" action="{{ route('userUpdate') }}">
                                @csrf
                                <hr>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Zapisz</button>
                        </form>
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
