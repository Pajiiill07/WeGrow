@extends('backend.layoutes.main')
@section('container')

<div class="content">
    <div>
        <h1>Data Meja</h1>
    </div>
    <hr>
    
    <form action="/meja-backend/{{$meja->id}}" method="post" class="form">
        @method('PUT')
        @csrf
        <div>
            <label for="no_desk">Nomor Meja</label>
            <input type="text" class=" @error('no_desk') is-invalid @enderror" name="no_desk" value="{{ old('no_desk',$meja->no_desk)}}">
            @error('no_desk')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="capacity">Kapasitas</label>
            <input type="text" class=" @error('capacity') is-invalid @enderror" name="capacity" value="{{ old('capacity',$meja->capacity)}}">
            @error('capacity')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="lokasi_meja">Lokasi Meja</label>
            <input type="text" class=" @error('lokasi_meja') is-invalid @enderror" name="lokasi_meja" value="{{ old('lokasi_meja',$meja->lokasi_meja)}}">
            @error('lokasi_meja')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <input type="hidden" name="image_old" value="{{$meja->file_upload}}">
            <label for="file_upload">Gambar</label>
            <img id="file-preview" src="/images/{{$meja->file_upload}}" height="100">
            <input type="file" class=" @error('file_upload') is-invalid @enderror" name="file_upload" id="file_upload" value="{{$meja->file_upload}}">
            @error('file_upload')
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