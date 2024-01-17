@extends('admin.layouuuut.main')
@section('container')

    <div class="content">
        <div>
            <h1>Data Cabang Outlet</h1>
        </div>
        <hr>
        
@if (session()->has('pesan'))
<div class="alert alert-success mt-3" role="alert">
    {{session('pesan')}}
</div>
@endif

        <a href="/branch-backend/create"><button class="buttonadd"><span>Add Data</span></button></a>
        <div class="table-responsive">
            <table class="table" id="table" >
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Outlet Id</th>
                        <th>Nama Cabang</th>
                        <th>Nomor Telephone</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($branch as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->outlet->id }}</td>
                            <td>{{ $item->branch_name }}</td>
                            <td>{{ $item->telp_number }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <button class="edit"><a href="/branch-backend/{{ $item->id }}/edit">Edit</a></button>
                                <form action="branch-backend/{{ $item->id }}" method="post">
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
        {{ $branch->links() }}
    </div>
@endsection