<link rel="stylesheet" href="/css/login-signupad.css">
<body>
    <div id="adm">
        <div class="login">
            <h1>Sign-up</h1>
            <form method="POST" action="/register-admin">
                @csrf
                <input type="text" placeholder="Username" class="un @error('username') is-invalid
                @enderror" value="{{ old('username') }}" name="username" id="username" required autofocus>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                <input type="text" placeholder="E-mail" class="ot @error('email') is-invalid
                @enderror" value="{{ old('email') }}" name="email" id="email" required autofocus>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                <input type="password" placeholder="Password" class="pw" required>
                <button type="submit">Sign-up</button>
            </form>
        </div>
    </div>
</body>