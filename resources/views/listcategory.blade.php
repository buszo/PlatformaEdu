@extends('adminLTE.dashboard')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <h3 class="card-title"><b>Kategoria: {{$category}}</b></h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover table-sortable">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th class="table-sortable">Tytuł</th>

                                    <th>Utworzono</th>
                                    <th>Ostatnia modyfikacja</th>
                                    <th>Operacje</th>

                                </tr>

                                </thead>
                                <tbody>
                                @foreach($select ?? [] as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
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
                                            {{$select->links()}}
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <script src="{{asset('plugins/sortowanie/tablesort.js')}}"></script>
@endsection
