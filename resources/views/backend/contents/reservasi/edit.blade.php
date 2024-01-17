@extends('backend.layoutes.main')
@section('container')

<div class="content">
    <div>
        <h1>Data Reservasi</h1>
    </div>
    <hr>
    
    <form action="/reserve-backend/{{$reserve->id}}" method="post" class="form">
        @method('PUT')
        @csrf
        <div>
            <label for="reserve_date">Tanggal Reservasi</label>
            <input type="text" class=" @error('reserve_date') is-invalid @enderror" name="reserve_date" value="{{ old('reserve_date',$reserve->reserve_date)}}">
            @error('reserve_date')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="reserve_time">Waktu Reservasi</label>
            <input type="text" class=" @error('reserve_time') is-invalid @enderror" name="reserve_time" value="{{ old('reserve_time',$reserve->reserve_time)}}">
            @error('reserve_time')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="num_visitors">Jumlah Tamu</label>
            <input type="text" class=" @error('num_visitors') is-invalid @enderror" name="num_visitors" value="{{ old('num_visitors',$reserve->num_visitors)}}">
            @error('num_visitors')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="meja_id">Meja</label>
            <select class=" @error('meja_id') is-invalid @enderror" name="meja_id">
                @foreach($mejas as $meja)
                @if(old('meja_id')== $meja->id)
                <option value="{{$meja->id}}" selected>{{$meja->no_desk}}</option>
                @else
                <option value="{{$meja->id}}">{{$meja->no_desk}}</option>
                @endif
                @endforeach
              </select>
              @error('meja_id')
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
        <div>
            <label for="customer_id">Customer</label>
            <select class=" @error('customer_id') is-invalid @enderror" name="customer_id">
                @foreach($customers as $customer)
                @if(old('customer_id')== $customer->id)
                <option value="{{$customer->id}}" selected>{{$customer->full_name}}</option>
                @else
                <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                @endif
                @endforeach
              </select>
              @error('customer_id')
              <div>
                  {{ $message }}
              </div>
              @enderror
        </div>
        <button type="submit"><span>Submit</span></button>
    </form>
</div>

@endsection