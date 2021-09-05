@extends('index')
@section('app')
    @include('components.admin-header')
    <div class="row" style="margin:24px;">
        <form action="{{ isset($role) ? route('roles.update', $role) : route('roles.store') }}" class="col s12"
            method="post">
            @csrf
            @isset($role)
                @method('PUT')
            @endisset
            <fieldset class="row" style="border: 0;">
                <legend>
                    <h5>
                        Formulário de Funções
                    </h5>
                </legend>
                <div>
                    <label for="name">Nome</label>
                    <input placeholder="Digite o nome da função" id="name" type="text" class="validate" name="name"
                        value="{{ old('name', $role->name ?? '') }}">
                    @error('name')
                        <span><small style="color:red;">{{ $message }}</small></span>
                    @enderror
                </div>
                <p>Status: </p>
                <div>
                    <label for="active">
                        <input type="radio" name="active" id="active" value="1"
                            {{ isset($role->active) ? ($role->active ? 'checked' : '') : 'checked' }}>
                        <span>Ativo</span>
                    </label>
                </div>
                <div>
                    <label for="inactive">
                        <input type="radio" name="active" id="inactive" value="0" @if (isset($role->active) && $role->active == 0) checked @endif>
                        <span>Inativo</span>
                    </label>
                </div>
                @error('active')
                    <span><small style="color:red;">{{ $message }}</small></span>
                @enderror
            </fieldset>

                <button type="submit" class="waves-effect waves-light btn">
                    Cadastrar
                </button>

            <a href="{{route('roles.index')}}" class="waves-light red btn">
                Cancelar
            </a>
        </form>
    </div>
@endsection
