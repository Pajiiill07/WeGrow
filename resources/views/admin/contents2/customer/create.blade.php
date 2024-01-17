@extends('admin.layouuuut.main')
@section('container')

<div class="content">
    <div>
        <h1>Data Customer</h1>
    </div>
    <hr>
    
    <form action="{{ route('customer-backend.store') }}" method="post" class="form">
        @csrf
        <h3>Tambahkan Data customer</h3>
        <div>
            <label for="user_id">User Id</label>
            <select class=" @error('user_id') is-invalid @enderror" name="user_id">
                @foreach($users as $user)
                @if(old('user_id')== $user->id)
                <option value="{{$user->id}}" selected>{{$user->id}}</option>
                @else
                <option value="{{$user->id}}">{{$user->id}}</option>
                @endif
                @endforeach
              </select>
              @error('user_id')
              <div>
                  {{ $message }}
              </div>
              @enderror
        </div>
        <div>
            <label for="full_name">Nama Lengkap</label>
            <input type="text" class=" @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name')}}">
            @error('full_name')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="telp_number">Nomor Telepon</label>
            <input type="text" class=" @error('telp_number') is-invalid @enderror" name="telp_number" value="{{ old('telp_number')}}">
            @error('telp_number')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="address">Alamat</label>
            <input type="text" class=" @error('address') is-invalid @enderror" name="address" value="{{ old('address')}}">
            @error('address')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit"><span>Submit</span></button>
    </form>
</div>

@endsection