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
                                            <div class="btn-group col-md-10">
                                                <a class="btn btn-danger" href="#" role="button">Usuń</a>
                                                <a class="btn btn-info" href="/details/{{$item->id}}" role="button">Szczegóły</a>
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
