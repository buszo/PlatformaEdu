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
                                    <input type="text" class="form-control" name="description" placeholder="Podaj opis zadania">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Dodaj zadanie</button>
                            </div>
                        </form>
                    </div>


@endsection
