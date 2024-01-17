@extends('backend.layoutes.main')
@section('container')

<div class="content">
    <div>
        <h1>Data Pembayaran</h1>
    </div>
    <hr>
    
    <form action="/bayar-backend/{{$bayar->id}}" method="post" class="form">
        @method('PUT')
        @csrf
        <div>
            <label for="reserve_id">Reservasi</label>
            <select class=" @error('reserve_id') is-invalid @enderror" name="reserve_id">
                @foreach($reserves as $reserve)
                @if(old('reserve_id')== $reserve->id)
                <option value="{{$reserve->id}}" selected>{{$reserve->id}}</option>
                @else
                <option value="{{$reserve->id}}">{{$reserve->id}}</option>
                @endif
                @endforeach
              </select>
              @error('reserve_id')
              <div>
                  {{ $message }}
              </div>
              @enderror
        </div>
        <div>
            <label for="amount">Jumlah</label>
            <input type="text" class=" @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount',$bayar->amount)}}">
            @error('amount')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="payment_methode">Metode Pembayaran</label>
            <input type="text" class=" @error('payment_methode') is-invalid @enderror" name="payment_methode" value="{{ old('payment_methode',$bayar->payment_methode)}}">
            @error('payment_methode')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="payment_date">Tanggal Pembayaran</label>
            <input type="text" class=" @error('payment_date') is-invalid @enderror" name="payment_date" value="{{ old('payment_date',$bayar->payment_date)}}">
            @error('payment_date')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="status">Status</label>
            <input type="text" class=" @error('status') is-invalid @enderror" name="status" value="{{ old('status',$bayar->status)}}">
            @error('status')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit"><span>Submit</span></button>
    </form>
</div>

@endsection