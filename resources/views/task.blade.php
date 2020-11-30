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
                                <div class="form-group">
                                    <label>Wybierz kategorię</label>
                                    <select name="taskOption" class="custom-select">
                                        <option value="1">Matematyka</option>
                                        <option value="2">Biologia</option>
                                        <option value="3">Fizyka</option>
                                        <option value="4">Chemia</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Dodaj zadanie</button>
                            </div>
                        </form>
                    </div>


                    @php
                        @session_start();
                    @endphp
                    @if(!empty($_SESSION['title']))


                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Sukces!</h5>
                            Dodano wpis o tytule:<b></b> {{$_SESSION['title']}} <br>
                            <a href="{{ route('taskList') }}"><i>Przejdź do listy zadań</i></a></div><br>

                        </div>
    @unset($_SESSION['title'])
    @endif


@endsection







