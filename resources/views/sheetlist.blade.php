@extends('adminLTE.dashboard')

@section('content')
<style>
.add-sheet {
    float:right; cursor:pointer; display:inline-block; margin-top:4px; font-size:30px;
}

.card-text {
            height:50px;
            overflow: auto;
    }
</style>
<link rel="stylesheet" href={{ asset('css/scrollbar.css') }}>

<div class="container mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 order-md-2">
                <div class="card">
                    <div class="card-header">
                    <h5 class="pt-2 pb-1" style="display:inline-block;">Nowy arkusz</h5>
                        <div class="add-sheet">
                            <a id="submit" role="button" href="{{route('editor')}}">
                                <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-header"><h5 class="pt-2 pb-1"><b>Wyszukiwanie</b></h5></div>
                    <div class="card-body">
                    <form action="{{route('sheetList')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <input name="mail" type="text" class="form-control" id="mail" placeholder="Mail autora">
                        </div>
                        
                        <button class="btn btn-primary mt-3" type="submit">Szukaj</button>
                    </form>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-md-9 order-md-1">
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 style="display:inline-block;">Dodane arkusze</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @foreach($sheets ?? [] as $item)
                            <div class="col-md-6">
                                <div class="card" style="height:230px;">
                                    <h5 class="card-header">{{ $item->title }}</h5>
                                    <div class="card-body">
                                        <p class="card-text">{{ $item->desc }}</p>
                                        <a href="/user/{{ $item->user_id }}" class="card-link">Autor</a>
                                    </div>
                                    <div class="card-footer btn-group mt-4" style="width:100%; padding:0;">
                                            <a href="/show/{{ $item->id }}" style="color:#757575" class="btn btn-light"><i class="fas fa-info-circle"></i></a>
                                            @if(Auth::user()->id == $item->user_id)
                                                <a href="/editor/{{ $item->id }}" style="color:#757575" class="btn btn-light"><i class="fas fa-edit"></i></a>
                                                <a href="/sheet/delete/{{ $item->id }}" style="color:#757575" class="btn btn-light"><i class="fas fa-trash-alt"></i></a>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                    <div class="card-footer">
                    {{$sheets->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src={{ asset('plugins/mathquill-0.10.1/mathquill.js') }}></script>
<script>
    $('textarea').each(function () {
        $(this).attr('readonly','readonly');
    });

</script>
@endsection