@extends('base')
@section('title', 'Login')
@section('content')
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
         @error('username')
                <div class="error">{{ $message }}</div>
            @enderror
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Invia</button>
         <a href="{{ route('homepage') }}"><button>Back</button></a>
    </form>
   

@endsection
