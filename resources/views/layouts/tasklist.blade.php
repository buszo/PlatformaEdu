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

                            <table id="example2" class="table table-bordered table-hover table-sortable">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th class="table-sortable">Tytuł</th>
                                    <th>Kategoria</th>

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
                                        <td><a href="/list/{{$item->categories_name}}">{{$item->categories_name}}</a>
                                        </td>
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


                                </div>

                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{$select->links()}}
                    @php
                        @session_start();
                    @endphp
                    @if(!empty($_SESSION['id']))


                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Sukces!</h5>
                            Usunięto wpis od ID: {{$_SESSION['id']}}<br>
                        </div>
                        @unset($_SESSION['id'])
                    @endif
                </div>

            <script src="{{asset('plugins/sortowanie/tablesort.js')}}"></script>

@endsection
