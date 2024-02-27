@extends("base")
@section("conteudo")

<form action="{{route("aluno.store")}}" method="post">

    @csrf

    <label for="">Nome</label><br>
    <input type="text" name="nome"><br>

    <label for="">Telefone</label><br>
    <input type="text" name="telefone"><br>

    <label for="">cpf</label><br>
    <input type="text" name="cpf"><br>

    <button type="submit">Slay</button>
    <button type="submit"><a href="{{ url ('aluno')}}">Back gurrll</a></button>
</form>

@stop
