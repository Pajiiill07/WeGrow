@extends('backend.layoutes.main')
@section('container')

<div class="content">
    <div>
        <h1>Data Menu</h1>
    </div>
    <hr>
    
    <form action="{{ route('menu-backend.store') }}" method="post" class="form">
        @csrf
        <h3>Tambahkan Data Menu</h3>
        <div>
            <label for="menu_name">Nama Menu</label>
            <input type="text" class=" @error('menu_name') is-invalid @enderror" name="menu_name" value="{{ old('menu_name')}}">
            @error('menu_name')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="description">Deskripsi</label>
            <input type="text" maxlength="50" class=" @error('description') is-invalid @enderror" name="description" value="{{ old('description')}}">
            @error('description')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="price">Harga</label>
            <input type="text" class=" @error('price') is-invalid @enderror" name="price" value="{{ old('price')}}">
            @error('price')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="branch_id">Cabang Outlet</label>
            <select class=" @error('branch_id') is-invalid @enderror" name="branch_id">
                @foreach($branchs as $branch)
                @if(old('branch_id')== $branch->id)
                <option value="{{$branch->id}}" selected>{{$branch->branch_name}}</option>
                @else
                <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                @endif
                @endforeach
              </select>
              @error('branch_id')
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