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


                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><b>Aktualne wpisy w bazie</b></h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Tytuł</th>
                                                    <th>Utworzono</th>
                                                    <th>Ostatnia modyfikacja</th>
                                                    <th>Operacje</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($select ?? [] as $item)
                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->title}}</td>
                                                        <td>{{$item->created_at}}</td>
                                                        <td>{{$item->updated_at}}</td>
                                                        <td>
                                                            <div style="text-align: center;">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-warning">Operacje</button>
                                                                <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                    <div class="dropdown-menu" role="menu" style="">
                                                                        <a class="dropdown-item" href="#">Szczegóły i edycja</a>
                                                                        <a class="dropdown-item" href="#">Usuń</a>
                                                                    </div>
                                                                </button>
                                                            </div>
                                                            </div>
                                                    </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>

                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
@endsection
