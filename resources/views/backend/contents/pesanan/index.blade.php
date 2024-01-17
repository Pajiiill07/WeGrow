@extends('backend.layoutes.main')
@section('container')


<div class="content">
    <div>
        <h1>Data Pesanan</h1>
    </div>
    <hr>
    
@if (session()->has('pesan'))
<div class="alert alert-success mt-3" role="alert">
    {{session('pesan')}}
</div>
@endif

    <a href="/order-backend/create"><button class="buttonadd"><span>Add Data</span></button></a>
    <div class="table-responsive">
        <table class="table" id="table" >
            <thead>
                <tr>
                    <th class="no">No</th>
                    <th>Reservasi</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->reservation->id }}</td>
                        <td>{{ $item->menu->menu_name}}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            <button class="edit"><a href="/order-backend/{{ $item->id }}/edit">Edit</a></button>
                            <form action="order-backend/{{ $item->id }}" method="post">
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
    {{ $order->links() }}
</div>
@endsection