@extends('components.header')
@section('header-options')
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="{{route('employees.index')}}">Funcionários</a></li>
        <li><a href="{{route('roles.index')}}">Funções</a></li>
    </ul>
@endsection
