@extends('adminLTE.dashboard')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Dodane zadania</b></h3>
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
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Drukuj zadanie</a>
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
