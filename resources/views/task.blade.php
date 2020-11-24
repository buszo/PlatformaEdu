@extends('adminLTE.dashboard')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Dodaj nowe zadanie</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('taskCreated') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Tytuł</label>
                                    <input type="text" class="form-control" name="title" placeholder="Podaj treść">
                                </div>
                                <div class="form-group">
                                    <label for="Opis">Opis</label>
                                    <input type="text" class="form-control" name="description"
                                           placeholder="Podaj opis zadania">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Dodaj zadanie</button>
                            </div>
                        </form>
                    </div>

                    @if(str_contains(url()->current(), '/created'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Sukces!</h5>
                            Udało się utworzyć nowe zadanie!<br>
                            ID: {{$select->id}}<br>
                            Tytuł: {{$select->title}}
                        </div>
                    @endif
                    @if($ifidexist = DB::table('task')->count() != 0)
                        <div class="card card-success">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class=""
                                       aria-expanded="false">
                                        Ostatnio dodane <hr></hr><i>ID: {{$select->id}} | Tytuł: {{$select->title}}</i>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse show" style="">
                                <div class="card-body">
                                    {{$select->description}}
                                </div>
                            </div>
                        </div>
                    @endif


@endsection
