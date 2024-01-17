@extends('backend.layoutes.main')
@section('container')


<div class="content">
    <div>
        <h1>Data Menu</h1>
    </div>
    <hr>
    
@if (session()->has('pesan'))
<div class="alert alert-success mt-3" role="alert">
    {{session('pesan')}}
</div>
@endif

    <a href="/menu-backend/create"><button class="buttonadd"><span>Add Data</span></button></a>
    <div class="table-responsive">
        <table class="table" id="table" >
            <thead>
                <tr>
                    <th class="no">No</th>
                    <th>Nama Menu</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Cabang Outlet</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menu as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->menu_name }}</td>
                        <td>{{ $item->description}}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->branchOutlet->branch_name }}</td>
                        <td>
                            <button class="edit"><a href="/menu-backend/{{ $item->id }}/edit">Edit</a></button>
                            <form action="menu-backend/{{ $item->id }}" method="post">
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
    {{ $menu->links() }}
</div>
@endsection