@extends('register_form.layout')

@section('content')
<div class="container">

    {{-- 1. Mostrar Mensaje de Éxito (session('success')) --}}
    @if (session('success'))
        <div style="padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; color: #155724; background-color: #d4edda; border-color: #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif
    
    <h1>Formulario de registro</h1>
    <h2>Bienvenido a JanusView</h2>
    <form action="{{ route('register_form.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        {{-- Campo Nombre --}}
        <div class="form-group">
            <label for="name">Nombre</label>
            {{-- old('name') mantiene el valor si la validación falla --}}
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}">
            @error('name')
                {{-- Muestra el mensaje de error si existe --}}
                <div style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; padding: .75rem 1.25rem; margin-top: .25rem; border-radius: .25rem;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Campo Apellido --}}
        <div class="form-group">
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" required value="{{ old('surname') }}">
            @error('surname')
                <div style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; padding: .75rem 1.25rem; margin-top: .25rem; border-radius: .25rem;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Campo Correo electrónico --}}
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
            @error('email')
                <div style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; padding: .75rem 1.25rem; margin-top: .25rem; border-radius: .25rem;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Campo Fecha de nacimiento --}}
        <div class="form-group">
            <label for="birth_date">Fecha de nacimiento</label>
            <input type="date" name="birth_date" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" required value="{{ old('birth_date') }}">
            @error('birth_date')
                <div style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; padding: .75rem 1.25rem; margin-top: .25rem; border-radius: .25rem;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Campo Nombre del usuario --}}
        <div class="form-group">
            <label for="birth_date">Elige tu nickname</label>
            <input type="text" name="nickname" id="nickname" class="form-control @error('nickname') is-invalid @enderror" required value="{{ old('nickname') }}">
            @error('nickname')
                <div style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; padding: .75rem 1.25rem; margin-top: .25rem; border-radius: .25rem;">{{ $message }}</div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection