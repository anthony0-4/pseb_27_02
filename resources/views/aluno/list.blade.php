@extends("base")
@section("conteudo")

<form action="{{route('aluno.search')}}" method="post">

    @csrf

    <label for="">Nome</label><br>
    <input type="text" name="nome"><br>

    <button type="submit">Find it girl</button>
    <button type="submit"><a href="{{ url ('aluno/create')}}">Sickening</a></button>
</form>

<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">CPF</th>
            <th scope="col">Ações</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $item) <!--laço de repetição-->
            <tr scope="row">
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->telefone}}</td>
                <td>{{$item->cpf}}</td>
                <td><a href="{{ route('aluno.edit' , $item->id)}}">Work room</a></td>
                <td><form action="{{ route('aluno.destroy', $item)}}" method="post">
                    @method("DELETE")
                    @csrf
                    <input type="submit" value="You're not that kind of girl" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop
