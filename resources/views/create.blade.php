@include('layout/header')

@if (session("notification"))
    <div class="notification">{{ session("notification") }}</div>
@endif 

<div class="annonce annonce-create">
    <form method="POST">
    @csrf
        <input type="text" placeholder="Titre" name="title" value="{{ old('title') }}" class="@error('title') is-invalid @enderror">

        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="text" placeholder="Nom du vendeur" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror">

        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="email" placeholder="Email du vendeur" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror">

        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror

        <textarea name="description" placeholder="Description de l'annonce" cols="30" rows="5" class="@error('description') is-invalid @enderror">{{ old('description') }}</textarea>

        @error('description')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="text" placeholder="Ville" name="location" value="{{ old('location') }}" class="@error('location') is-invalid @enderror">

        @error('location')
            <p class="error">{{ $message }}</p>
        @enderror

        <input type="number" placeholder="Prix" step="0.01" name="price" value="{{ old('price') }}" class="@error('price') is-invalid @enderror">

        @error('price')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">Créer</button>
    </form>
</div>

@include('layout/footer')




