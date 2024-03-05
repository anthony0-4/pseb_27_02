@extends("base")
@section("conteudo")

@php
    if(!empty($dado->id)){
        $route = route ('aluno.update',$dado->id)
    }else{
        $route = route('aluno.store')
    }
@endphp

<form action="{{route("aluno.store")}}" method="post">

    @csrf

    <label for="">Nome</label><br>
    <input type="text" name="nome"><br>

    <label for="">Telefone</label><br>
    <input type="text" name="telefone" value="{{old("telefone")}}"><br>

    <label for="">cpf</label><br>
    <input type="text" name="cpf" value="{{old("cpf")}}"><br>

    <button type="submit">Slay</button>
    <button type="submit"><a href="{{ url ('aluno')}}">Back gurrll</a></button>
</form>

@stop
