<link rel="stylesheet" href="/css/login-signupad.css">
<body>
    <div id="adm">
        <div class="login">
        <form method="POST" action="/login-admin">
            @csrf
            <h1>Login</h1>
            <input type="text" placeholder="Username" class="un @error('username') is-invalid
            @enderror" value="{{ old('username') }}" name="username" id="username" required autofocus>
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            <input type="password" class="pass" placeholder="Password">
            <button type="submit">Login</button>
            <h5>Belum Punya Akun? <a href="/register-admin">Sign Up</a></h5>
        </form>
        </div>
    </div>
</body>