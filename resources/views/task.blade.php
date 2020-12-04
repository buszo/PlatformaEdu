@extends('adminLTE.dashboard')
@section('content')
    @php

        $categories_raw = DB::table('categories')->where('userID', '=', $id)->get()->toArray();
        $categories = array_column($categories_raw, 'name', 'id');
    @endphp
    @if(DB::table('categories')->where('userId', '=', $id)->count() == 0)
        <div class="alert alert-info alert-dismissible col-sm-12">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Brak kategorii!</h5>
            Utwórz przynajmniej 1 kategorie zanim dodasz zadanie.
        </div>        @endif
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
                                        @foreach($categories_raw ?? [] as $arr => $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
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
            </div>
        </div>
    </section>

    @unset($_SESSION['title'])
    @endif
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Dodaj nowa kategorie</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{route('categoryCreate')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="categoryName" class="col-sm-2 col-form-label">Nazwa kategorii</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="Np. Geografia..">
                    </div>
                </div>
                <div class="form-group row">

                    <div class="offset-sm-2 col-sm-10">

                        @foreach($categories ?? [] as $item)
                            <input type="button" class="btn btn-default" value="{{$item}}"
                                   onclick="window.location.href='{{route('taskListByCategory', [$item])}}'">
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Dodaj kategorie</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection







