@extends('adminLTE.dashboard')

@section('content')
    @if(!empty($query))
        <form method="#" action="#">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="title">Tytuł</label>
                    <input type="text" class="form-control" name="title" placeholder="Podaj treść"
                           value="{{$query->title}}">
                </div>
                <div class="form-group">
                    <label for="Opis">Opis</label>
                    <textarea class="form-control" name="description"
                              placeholder="Podaj opis zadania">{{$query->description}}</textarea>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Aktualizuj</button>
            </div>
        </form>
        </div>


    @else
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Błąd!</h5>
            Brak zadania o podanym ID!
        </div>
    @endif

@endsection
