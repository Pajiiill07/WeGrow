@extends('backend.layoutes.main')
@section('container')


<div class="content">
    <div>
        <h1>Data Pembayaran</h1>
    </div>
    <hr>
    
@if (session()->has('pesan'))
<div class="alert alert-success mt-3" role="alert">
    {{session('pesan')}}
</div>
@endif

    <a href="/bayar-backend/create"><button class="buttonadd"><span>Add Data</span></button></a>
    <div class="table-responsive">
        <table class="table" id="table" >
            <thead>
                <tr>
                    <th class="no">No</th>
                    <th>Reservasi Id</th>
                    <th>Jumlah</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bayar as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->reservation->id }}</td>
                        <td>{{ $item->amount}}</td>
                        <td>{{ $item->payment_methode }}</td>
                        <td>{{ $item->payment_date }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <button class="edit"><a href="/bayar-backend/{{ $item->id }}/edit">Edit</a></button>
                            <form action="bayar-backend/{{ $item->id }}" method="post">
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
    {{ $bayar->links() }}
</div>
@endsection