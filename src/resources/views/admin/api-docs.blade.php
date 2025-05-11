@extends('base')
@section('title','API Documentation')
@section('content')
     <h1>Documentazione API</h1>
    <a href="{{ route('testbreweries') }}"><button>Back</button></a>
    <h2>GET <code>/api/v1/breweries</code></h2>
    <p>Restituisce una lista paginata di birrifici.</p>

    <h3>📍 Endpoint completo</h3>
    <pre><code>GET http://127.0.0.1:9090/api/v1/breweries?page=1&per_page=50</code></pre>

    <h3>🔐 Autenticazione</h3>
    <p>L'accesso richiede un token JWT nel seguente header:</p>
    <pre><code>Authorization: Bearer &lt;token&gt;</code></pre>

    <h3>📤 Parametri Query</h3>
    <table border="1" cellpadding="6">
        <thead>
            <tr>
                <th>Parametro</th>
                <th>Tipo</th>
                <th>Default</th>
                <th>Descrizione</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>page</code></td>
                <td>integer</td>
                <td>1</td>
                <td>Numero della pagina da recuperare</td>
            </tr>
            <tr>
                <td><code>per_page</code></td>
                <td>integer</td>
                <td>10</td>
                <td>Numero di risultati per pagina (max: 50)</td>
            </tr>
        </tbody>
    </table>

    <h3>✅ Risposta <code>200 OK</code></h3>
    <pre><code>{
  "status": "OK",
  "message": "success",
  "data": [
    {
      "id": "5128df48-79fc-4f0f-8b52-d06be54d0cec",
      "name": "(405) Brewing Co",
      "brewery_type": "micro",
      "address_1": "1716 Topeka St",
      "city": "Norman",
      "state_province": "Oklahoma",
      "postal_code": "73069-8224",
      "country": "United States",
      "longitude": -97.46818222,
      "latitude": 35.25738891,
      "phone": "4058160490",
      "website_url": "http://www.405brewing.com",
      "state": "Oklahoma",
      "street": "1716 Topeka St"
    },
    ...
  ]
}</code></pre>

    <h3>❌ Risposta <code>401 Unauthorized</code></h3>
    <p>In caso di token assente o non valido:</p>
    <pre><code>{
  "status": "KO",
  "message": "unauthenticated"
}</code></pre>

    <h3>🧪 Esempio cURL</h3>
    <pre><code>curl -H "Authorization: Bearer &lt;token&gt;" \
     -H "Accept: application/json" \
     "http://127.0.0.1:9090/api/v1/breweries?page=1&per_page=50"</code></pre>

@endsection
