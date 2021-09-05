@extends('index')
@section('app')
    @include('components.header')
    <section>
        @forelse ($employees as $employee)
            <ul class="profile-card">
                <li class="img-div">
                    @if ($employee->profile_picture)
                        <img class="img" src="{{ asset('storage/' . $employee->profile_picture) }}">
                    @else
                        <h4>
                            Foto de Perfil não cadastrada.
                        </h4>
                    @endif
                </li>
                <li style="font-weight: bold;">{{ $employee->firstname }} {{ $employee->lastname }}</li>
                <li>{{ $employee->role->name }}</li>
                <li @if ($employee->active)
                    style="font-weight: bold;color:green;"
                @else
                    style="font-weight: bold;color:red;"
        @endif>{{ $employee->active ? 'Ativo' : 'Inativo' }}</li>
        <li>{{ date('d/m/Y', strtotime($employee->birth_date)) }}</li>
        <li></li>
        </ul>
    @empty
        <h2>Ainda não há Funcionários Cadastrados!</h2>
        @endforelse
    </section>
@endsection
