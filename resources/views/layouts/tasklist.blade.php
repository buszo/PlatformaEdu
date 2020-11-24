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
                                                <div class="btn-group col-md-4">


                                                    <a class="btn btn-info" href="/details/{{$item->id}}" role="button">Szczegóły</a>
                                                    <form action="{{ route('taskDelete', [$item->id]) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-danger" type="submit">Usuń</button>
                                                    </form>
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
                   @if(!empty($deletedId))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Sukces!</h5>
                        Usunięto zadanie o ID: {{$deletedId}}
                    </div>
 @endif

@endsection
