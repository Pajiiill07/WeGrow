@extends('backend.layoutes.main')
@section('container')

<div class="content">
    <div>
        <h1>Data Order</h1>
    </div>
    <hr>
    
    <form action="/order-backend/{{$order->id}}" method="post" class="form">
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
            <label for="menu_id">Menu</label>
            <select class=" @error('menu_id') is-invalid @enderror" name="menu_id">
                @foreach($menus as $menu)
                @if(old('menu_id')== $menu->id)
                <option value="{{$menu->id}}" selected>{{$menu->menu_name}}</option>
                @else
                <option value="{{$menu->id}}">{{$menu->menu_name}}</option>
                @endif
                @endforeach
              </select>
              @error('menu_id')
              <div>
                  {{ $message }}
              </div>
              @enderror
        </div>
        <div>
            <label for="quantity">Jumlah</label>
            <input type="text" class=" @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity',$order->quantity)}}">
            @error('quantity')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit"><span>Submit</span></button>
    </form>
</div>

@endsection