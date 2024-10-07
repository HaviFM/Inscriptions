@extends('template')

@section('content')

<h1>Créer Compte Utilisateur</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
Erreur Detectée
    </div>
@endif

{{-- @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('form.store') }}" method="post">
    @method('post')
    @csrf

    <div>
        <label for="name">NOM</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="NOM">
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="surname">PRÉNOM</label>
        <input type="text" name="surname" id="surname" value="{{ old('surname') }}" placeholder="PRÉNOM">
        @error('surname')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email">EMAIL</label>
        <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="EMAIL">
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="username">NOM D'UTILISATEUR</label>
        <input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="NOM D'UTILISATEUR">
        @error('username')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="tel">TÉLÉPHONE</label>
        <input type="text" name="tel" id="tel" value="{{ old('tel') }}" placeholder="TÉLÉPHONE">
        @error('tel')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password">MOT DE PASSE</label>
        <input type="password" name="password" id="password" placeholder="*****">
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit">Enregistrer</button>
    </div>
</form>
@endsection