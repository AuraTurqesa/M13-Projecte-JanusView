@extends('contact_form.layout')

@section('content')
<div class="container">

    {{-- 1. Mostrar Mensaje de Éxito (session('success')) --}}
    @if (session('success'))
        <div style="padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; color: #155724; background-color: #d4edda; border-color: #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif
    
    <h1>Formulario de contacto</h1>
    <h2>¡Presentanos tus dudas!</h2>
    <form action="{{ route('contact_form.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        {{-- Campo Nombre del usuario --}}
        <div class="form-group">
            <label for="nickname">Elige tu nickname</label>
            <input type="text" name="nickname" id="nickname" class="form-control @error('nickname') is-invalid @enderror" required value="{{ old('nickname') }}">
            @error('nickname')
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

        {{-- 🚨 CAMPO DESCRIPCIÓN CORREGIDO --}}
        <div class="form-group">
            <label for="description">¡Descríbenos tus dudas!</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description') }}</textarea>
            @error('description')
                <div style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; padding: .75rem 1.25rem; margin-top: .25rem; border-radius: .25rem;">{{ $message }}</div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection