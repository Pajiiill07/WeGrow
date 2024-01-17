@section('title','Register')

<link rel="stylesheet" href="/css/login-signup.css">

<div class="Regis">
    <h1>Sign-Up</h1>
    <form method="POST" action="/register">
        @csrf
        <input type="text" placeholder="Username" class="un @error('username') is-invalid
        @enderror" value="{{ old('username') }}" name="username" id="username" required autofocus>
        @error('username')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        <input type="text" placeholder="E-mail" class="email @error('email') is-invalid
        @enderror" value="{{ old('email') }}" name="email" id="email" required autofocus>
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        <input class="pass" type="password" placeholder="Password" name="password" required>
        <button class="btn" type="submit">Sign-Up</button>
    </form>
    <img src="/images/login_us.png" alt ="wegrow" class="gambar">
</div>