@extends('backend.layoutes.main')
@section('container')

    <div class="content">
        <div>
            <h1>Data Meja</h1>
        </div>
        <hr>
        
@if (session()->has('pesan'))
<div class="alert alert-success mt-3" role="alert">
    {{session('pesan')}}
</div>
@endif

        <a href="/meja-backend/create"><button class="buttonadd"><span>Add Data</span></button></a>
        <div class="table-responsive">
            <table class="table" id="table" >
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Nomor Meja</th>
                        <th>Kapasitas</th>
                        <th>Lokasi Meja</th>
                        <th>Gambar Meja</th>
                        <th>Cabang Outlet</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meja as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_desk }}</td>
                            <td>{{ $item->capacity }}</td>
                            <td>{{ $item->lokasi_meja }}</td>
                            <td><img src="{{ asset('images/' . $item['file_upload'])}}" style="width: 180px;" alt="Uploaded Image"></td>
                            <td>{{ $item->branchOutlet->branch_name }}</td>
                            <td>
                                <button class="edit"><a href="/meja-backend/{{ $item->id }}/edit">Edit</a></button>
                                <form action="meja-backend/{{ $item->id }}" method="post">
                                    @method('DELETE')
                                    @csrf 
                                    <button class="delete" onclick="return confirm('Yakin akan menghapus data ?')"><span>Delete</span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $meja->links() }}
    </div>
@endsection