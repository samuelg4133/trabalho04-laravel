@extends('index')
@section('app')
    @include('components.admin-header')
    <div id="table" style="margin: 2rem;">
        <div>
            <h4>
                Funções Cadastradas
            </h4>
        </div>
        <div class="row">
            <form class="col s12" action="#" method="get">
                @csrf
                <div class="input-field col s6" style="display: flex;align-items:center;">
                    <input type="text" placeholder="Nome da Função" name="name" value="{{$name}}">
                    <button type="submit" class="waves-effect waves-light btn">
                        <i class="material-icons">search</i>
                    </button>
                </div>
            </form>
        </div>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->active ? 'Ativo' : 'Inativo' }}</td>
                        <td style="display: flex; align-items:center;">
                            <a href="{{ route('roles.edit', $role) }}">
                                <i class="material-icons">create</i>
                            </a>
                            <form action="{{ route('roles.destroy', $role) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" style="border:0;background:transparent;cursor:pointer;">
                                    <i class="material-icons" style="color:red;">delete_forever</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $roles->links('components.paginator') }}
        <div class="fixed-action-btn">
            <a href="{{ route('roles.create') }}" class="btn-floating btn-large orange">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </div>
@endsection
