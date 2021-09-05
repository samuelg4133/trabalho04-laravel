@extends('index')
@section('app')
    @include('components.admin-header')
    <div id="table" style="margin: 2rem;">
        <div>
            <h4>
                Funcionários Cadastrados
            </h4>
        </div>

        <div class="row">
            <form class="col s12" action="#" method="get">
                @csrf
                <div class="input-field col s6" style="display: flex;align-items:center;">
                    <input type="text" placeholder="Nome do Funcionário" name="name" value="{{$name}}">
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
                    <th>Função</th>
                    <th>Data de Nascimento</th>
                    <th>Status</th>
                    <th>Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->firstname }} {{ $employee->lastname }}</td>
                        <td>{{ $employee->role->name }}</td>
                        <td>{{ date('d/m/Y', strtotime($employee->birth_date)) }}</td>
                        <td>{{ $employee->active ? 'Ativo' : 'Inativo' }}</td>
                        <td>
                            <form action="{{ route('employees.destroy', $employee) }}" method="post">
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
                        <td></td>
                        <td></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $employees->links('components.paginator') }}
        <div class="fixed-action-btn">
            <a href="{{ route('employees.create') }}" class="btn-floating btn-large orange">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </div>
@endsection
