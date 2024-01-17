@extends('admin.layouuuut.main')
@section('container')

    <div class="content">
        <div>
            <h1>Data User</h1>
        </div>
        <hr>
        
@if (session()->has('pesan'))
<div class="alert alert-success mt-3" role="alert">
    {{session('pesan')}}
</div>
@endif

        <a href="/user-backend/create"><button class="buttonadd"><span>Add Data</span></button></a>
        <div class="table-responsive">
            <table class="table" id="table" >
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Email Verifikasi</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->email_verified_at }}</td>
                            <td>{{ $item->password }}</td>
                            <td>
                                <button class="edit"><a href="/user-backend/{{ $item->id }}/edit">Edit</a></button>
                                <form action="user-backend/{{ $item->id }}" method="post">
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
        {{ $user->links() }}
    </div>
@endsection