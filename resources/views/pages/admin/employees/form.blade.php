@extends('index')
@section('app')
    @include('components.admin-header')
    <div style="margin:24px;" class="row">
        <form enctype="multipart/form-data"
            action="{{ isset($employee) ? route('employees.update', $employee) : route('employees.store') }}"
            method="post">
            @csrf
            @isset($employee)
                @method('PUT')
            @endisset
            <fieldset class="row" style="border: 0;">
                <legend>
                    <h5>
                        Formulário de Funcionários
                    </h5>
                </legend>
                <div class="input-field col s4">
                    <label for="firstname">Nome</label>
                    <input placeholder="John" id="firstname" type="text" class="validate" name="firstname"
                        value="{{ old('firstname', $employee->firstname ?? '') }}">
                    @error('firstname')
                        <span><small style="color:red;">{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s8">
                    <label for="lastname">Sobrenome</label>
                    <input placeholder="Doe" id="lastname" type="text" class="validate" name="lastname"
                        value="{{ old('lastname', $employee->lastname ?? '') }}">
                    @error('lastname')
                        <span><small style="color:red;">{{ $message }}</small></span>
                    @enderror
                </div>

                <div class="input-field col s6">
                    <select name="role_id">
                        <option disabled {{ $employee->role->id ?? 'selected' }}>Escolha uma função</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ old('role_id', $employee->role->id ?? '') == $role->id ? 'selected' : '' }}
                                class="text-capitalize">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <label for="role_id">Função</label>
                    @error('role_id')
                        <span><small style="color:red;">{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <input type="date" value="{{ old('birth_date', $employee->birth_date ?? '') }}" id="birth_date"
                        name="birth_date">
                    <label for="birth_date">Data de Nascimento</label>
                    @error('birth_date')
                        <span><small style="color:red;">{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="input-field col s12">
                    Status
                    <div>
                        <label for="active">
                            <input type="radio" name="active" id="active" value="1"
                                {{ isset($employee->active) ? ($employee->active ? 'checked' : '') : 'checked' }}>
                            <span>Ativo</span>
                        </label>
                    </div>
                    <div>
                        <label for="inactive">
                            <input type="radio" name="active" id="inactive" value="0" @if (isset($employee->active) && $employee->active == 0) checked @endif>
                            <span>Inativo</span>
                        </label>
                    </div>
                    @error('active')
                        <span><small style="color:red;">{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="col s12" style="display: flex; flex-direction:column;">
                    <label for="profile_picture" style="margin-bottom: 0.25rem;">Foto de Perfil</label>
                    <input accept="image/png, image/jpeg, image/jpg" type="file"
                        value="{{ old('profile_picture', $employee->profile_picture ?? '') }}" id="profile_picture"
                        name="profile_picture">
                    @error('profile_picture')
                        <span><small style="color:red;">{{ $message }}</small></span>
                    @enderror
                </div>
            </fieldset>

            <button type="submit" class="waves-effect waves-light btn">
                Cadastrar
            </button>

            <a href="{{ route('employees.index') }}" class="waves-light red btn">
                Cancelar
            </a>
        </form>
    </div>
@endsection
