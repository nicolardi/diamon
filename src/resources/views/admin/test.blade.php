@extends('base')

@section('title', 'Elenco birrifici')

@section('content')
    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="button">Logout</button>
</form>

    <p>Questa pagina testa l'api interna api/v1/test-breweries la base api url è definita nel .env (API_URL) </p>

    <a href="{{ route('api-docs') }}">API Documentation</a>
    
    <h2>Lista birrifici</h2>

    <ul>
        @foreach ($breweries as $brewery)
            <li><strong>{{ $brewery['name'] }}</strong> – {{ $brewery['city'] }}, {{ $brewery['state'] }}</li>
        @endforeach
    </ul>

    <div>
        <a href="{{ route('testbreweries', ['page' => $page - 1]) }}" @if ($page <= 1) style="visibility: hidden;" @endif>← Prev</a>
        <span> Pagina {{ $page }} </span>
        <a href="{{ route('testbreweries', ['page' => $page + 1]) }}">Next →</a>
    </div>
@endsection
