@extends('adminLTE.dashboard')

@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    @if(!empty($query))
        <form method="POST" action="{{route('taskUpdate', $id)}}">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="title">Tytuł</label>
                    <input type="text" class="form-control" name="title" placeholder="Podaj treść"
                           value="{{$query->title}}">
                </div>
                <div class="form-group">
                    <label for="Opis">Opis</label>
                    <textarea name="description" id="editor">
            {{$query->description}}
        </textarea>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Aktualizuj</button>
            </div>
        </form>
        </div>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>

    @else
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Błąd!</h5>
            Brak zadania o podanym ID!
        </div>
    @endif




@endsection
