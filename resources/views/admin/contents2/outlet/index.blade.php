@extends('admin.layouuuut.main')
@section('container')

    <div class="content">
        <div>
            <h1>Data Outlet</h1>
        </div>
        <hr>
        
@if (session()->has('pesan'))
<div class="alert alert-success mt-3" role="alert">
    {{session('pesan')}}
</div>
@endif

        <a href="/outlet-backend/create"><button class="buttonadd"><span>Add Data</span></button></a>
        <div class="table-responsive">
            <table class="table" id="table" >
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Nama Outlet</th>
                        <th>Logo</th>
                        <th>Nomor Telephone</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($outlet as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->outlet_name }}</td>
                            <td><img src="{{ asset('images/' . $item['file_upload'])}}" style="width: 180px;" alt="Uploaded Image"></td>
                            <td>{{ $item->telp_number }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <button class="edit"><a href="/outlet-backend/{{ $item->id }}/edit">Edit</a></button>
                                <form action="outlet-backend/{{ $item->id }}" method="post">
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
        {{ $outlet->links() }}
    </div>
@endsection