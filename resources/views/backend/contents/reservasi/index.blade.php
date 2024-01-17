@extends('backend.layoutes.main')
@section('container')


<div class="content">
    <div>
        <h1>Data Reservasi</h1>
    </div>
    <hr>
    
@if (session()->has('pesan'))
<div class="alert alert-success mt-3" role="alert">
    {{session('pesan')}}
</div>
@endif

    <a href="/reserve-backend/create"><button class="buttonadd"><span>Add Data</span></button></a>
    <div class="table-responsive">
        <table class="table" id="table" >
            <thead>
                <tr>
                    <th class="no">No</th>
                    <th>Tanggal Reservasi</th>
                    <th>Waktu Reservasi</th>
                    <th>Jumlah Tamu</th>
                    <th>Meja</th>
                    <th>Cabang Outlet</th>
                    <th>Customer</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reserve as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->reserve_date }}</td>
                        <td>{{ $item->reserve_time}}</td>
                        <td>{{ $item->num_visitors }}</td>
                        <td>{{ $item->meja->no_desk }}</td>
                        <td>{{ $item->branchOutlet->branch_name }}</td>
                        <td>{{ $item->customer->full_name }}</td>
                        <td>
                            <button class="edit"><a href="/reserve-backend/{{ $item->id }}/edit">Edit</a></button>
                            <form action="reserve-backend/{{ $item->id }}" method="post">
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
    {{ $reserve->links() }}
</div>
@endsection