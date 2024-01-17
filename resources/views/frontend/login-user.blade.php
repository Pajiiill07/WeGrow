@section('title','Login')

<link rel="stylesheet" href="/css/login-signup.css">

<div id="Login">
        <h1 class="h1">Login</h1>
        <form method="POST" action="/login">
            @csrf
            <input type="text" placeholder="Username" class="username @error('username') is-invalid
            @enderror" value="{{ old('username') }}" name="username" id="username" required autofocus>
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            <input class="password" type="password" placeholder="Password" name="password">
            <button class="button" type="submit">Login</button>
            
            <h5 class="h5">Belum Punya Akun? <a href="/register">Sign Up</a></h5>
        </form>
        <img src="/images/login_us.png" alt ="wegrow" class="img">
</div>
 
 