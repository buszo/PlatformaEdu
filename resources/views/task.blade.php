
<div class="content">
    <h1> Info: </h1>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    <form action="/new" method="post">
        {{@csrf_field()}}
        tytul
        <input type="text" name="title">
        opis
        <input type="text" name="description">
        adres
        <input type="text" name="address">
        <input type="submit" value="zatwierdz">
    </form>

</div>
@if(!empty($adres))
    <p> {{ $adres }}</p>
    @endif
