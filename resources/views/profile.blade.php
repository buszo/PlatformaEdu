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

                        <h3 class="profile-username text-center"> {{ Auth::user()->name }} </h3>

                        <p class="text-muted text-center">Software Engineer</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>ID: </b> <a class="float-right">{{ Auth::user()->id }}</a>
                        </ul>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Utworzone zadania: </b> <a class="float-right">{{ DB::table('task')->where('createdBy', Auth::user()->id)->count()}}</a>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
