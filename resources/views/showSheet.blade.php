@extends('adminLTE.dashboard')

@section('content')
<div class="container mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-secondary">
                    @foreach($sheet ?? [] as $item)
                        <div class="card-header">
                            <p class="card-title">
                                    {{ $item->title }}
                            </p>
                            <a style="float:right" href="/user/{{ $item->user_id }}">Profil autora</a>
                        </div>
                        <div class="card-block card-body">
                                    {!! $item->content !!}
                        </div>
                        <div class="card-footer">
                                {{ $item->desc }}
                        </div>
                    @endforeach
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