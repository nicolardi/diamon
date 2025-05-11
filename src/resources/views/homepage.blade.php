@extends('base')
@section('title', 'Homepage')
@section('content')
    <div class="content">
        <p>Questa è una semplice applicazione di test per visualizzare un elenco di birrifici usando una API che fa da proxy verso il sito openbrewerydb (<a href="https://www.openbrewerydb.org/documentation/">https://www.openbrewerydb.org</a>).</p>
    </div>
    <a href="{{ route('login')}}"><button>Login</button></a>
@endsection