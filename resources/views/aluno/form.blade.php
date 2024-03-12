@extends('base')
@section('conteudo')
@section('titulo', 'Formulário de aluno')

@php
    if (!empty($dado->id)) {
        $route = route('aluno.update', $dado->id);
    } else {
        $route = route('aluno.store');
    }
@endphp

<form action="{{ $route }}" method="post">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Nome</label><br>
    <input type="text" name="nome" class="form-control"
        value="@if (!empty($dado->nome)) {{ $dado->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}  @else{{ '' }} @endif"><br>

    <label for="">Telefone</label><br>
    <input type="text" name="telefone" class="form-control mb -4"
        value="@if (!empty($dado->telefone)) {{ $dado->telefone }}@elseif (!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif"><br>

    <label for="">cpf</label><br>
    <input type="text" name="cpf" class="form-control"
        value="@if (!empty($dado->cpf)) {{ $dado->cpf }}    @elseif (!empty(old('cpf'))){{ old('cpf') }}
    @else{{ '' }} @endif"><br>
    <label for="">The Category Is</label><br>
    <select name="categoria_id">
        @foreach ($categorias as $item)
            <option value="{{ $item->id }}">{{ $item->nome }}</option>
        @endforeach
    </select><br>

    <button type="submit" class="btn btn-primary">Slay</button>
    <button type="submit" class="btn btn-secondary"><a href="{{ url('aluno') }}">Bring back my girls</a></button>
</form>

@stop
