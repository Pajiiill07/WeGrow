@extends('admin.layouuuut.main')
@section('container')

<div class="content">
    <div>
        <h1>Data Cabang branch</h1>
    </div>
    <hr>
    
    <form action="{{ route('branch-backend.store') }}" method="post" class="form">
        @csrf
        <h3>Tambahkan Data Branch</h3>
        <div>
            <label for="outlet_id">Outlet Id</label>
            <select class=" @error('outlet_id') is-invalid @enderror" name="outlet_id">
                @foreach($outlets as $outlet)
                @if(old('outlet_id')== $outlet->id)
                <option value="{{$outlet->id}}" selected>{{$outlet->id}}</option>
                @else
                <option value="{{$outlet->id}}">{{$outlet->id}}</option>
                @endif
                @endforeach
              </select>
              @error('outlet_id')
              <div>
                  {{ $message }}
              </div>
              @enderror
        </div>
        <div>
            <label for="branch_name">Nama branch</label>
            <input type="text" class=" @error('branch_name') is-invalid @enderror" name="branch_name" value="{{ old('branch_name')}}">
            @error('branch_name')
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