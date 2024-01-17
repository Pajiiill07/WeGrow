@extends('admin.layouuuut.main')
@section('container')

<div class="content">
    <div>
        <h1>Data User</h1>
    </div>
    <hr>
    
    <form action="{{ route('user-backend.store') }}" method="post" class="form">
        @csrf
        <h3>Tambahkan Data User</h3>
        <div>
            <label for="username">Username</label>
            <input type="text" class=" @error('username') is-invalid @enderror" name="username" value="{{ old('username')}}">
            @error('username')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}">
            @error('email')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="email_verified_at">Email Verifikasi</label>
            <input type="text" class=" @error('email_verified_at') is-invalid @enderror" name="email_verified_at" value="{{ old('email_verified_at')}}">
            @error('email_verified_at')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" class=" @error('password') is-invalid @enderror" name="password" value="{{ old('password')}}">
            @error('password')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit"><span>Submit</span></button>
    </form>
</div>

@endsection