@extends('admin.layouuuut.main')
@section('container')

    <div class="content">
        <div>
            <h1>Data Customer</h1>
        </div>
        <hr>
        
@if (session()->has('pesan'))
<div class="alert alert-success mt-3" role="alert">
    {{session('pesan')}}
</div>
@endif

        <a href="/customer-backend/create"><button class="buttonadd"><span>Add Data</span></button></a>
        <div class="table-responsive">
            <table class="table" id="table" >
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>User Id</th>
                        <th>Nama Lengkap</th>
                        <th>Nomoe Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->id }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->telp_number }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <button class="edit"><a href="/customer-backend/{{ $item->id }}/edit">Edit</a></button>
                                <form action="customer-backend/{{ $item->id }}" method="post">
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
        {{ $customer->links() }}
    </div>
@endsection