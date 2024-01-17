@extends('admin.layouuuut.main')
@section('container')

<div class="content">
    <div>
        <h1>Data Outlet</h1>
    </div>
    <hr>
    
    <form action="{{ route('outlet-backend.store') }}" method="post" class="form">
        @csrf
        <h3>Tambahkan Data outlet</h3>
        <div>
            <label for="outlet_name">Nama Outlet</label>
            <input type="text" class=" @error('outlet_name') is-invalid @enderror" name="outlet_name" value="{{ old('outlet_name')}}">
            @error('outlet_name')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="file_upload">Logo</label>
            <img id="file-preview" height="100">
            <input type="file" class=" @error('file_upload') is-invalid @enderror" name="file_upload" accept="image/x-png,image/gif,image/jpeg" id="file_upload">
            @error('file_upload')
            <div class="invalid-feedback">
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
    <script>
        const input = document.getElementById('file_upload');
        const previewPhoto = () => {
            const file = input.files;
            if (file) {
                const fileReader = new FileReader();
                const preview = document.getElementById('file-preview');
        fileReader.onload = function (event) {
                    preview.setAttribute('src', event.target.result);
                }
                fileReader.readAsDataURL(file[0]);
            }
        }
        input.addEventListener("change", previewPhoto);
    </script>
</div>

@endsection