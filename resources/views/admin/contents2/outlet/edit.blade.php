@extends('admin.layouuuut.main')
@section('container')

<div class="content">
    <div>
        <h1>Data Outlet</h1>
    </div>
    <hr>
    
    <form action="/outlet-backend/{{$outlet->id}}" method="post" class="form">
        @method('PUT')
        @csrf
        <div>
            <label for="outlet_name">Nama Outlet</label>
            <input type="text" class=" @error('outlet_name') is-invalid @enderror" name="outlet_name" value="{{ old('outlet_name',$outlet->outlet_name)}}">
            @error('outlet_name')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <input type="hidden" name="image_old" value="{{$outlet->file_uplod}}">
            <label for="file_upload" >Logo</label>
            @if($outlet->file_upload)
            <img id="file-preview" src="/images/{{$outlet->file_upload}}" height="100" >
            @else
            <img id="file-preview" height="100" >
            @endif
            <input type="file" class=" @error('file_upload') is-invalid @enderror" name="file_upload" id="file_upload">
            @error('file_upload')
                  <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
        <div>
            <label for="telp_number">Nomor Telepon</label>
            <input type="text" class=" @error('telp_number') is-invalid @enderror" name="telp_number" value="{{ old('telp_number',$outlet->telp_number)}}">
            @error('telp_number')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="address">Alamat</label>
            <input type="text" class=" @error('address') is-invalid @enderror" name="address" value="{{ old('address',$outlet->address)}}">
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