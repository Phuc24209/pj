@extends('index2')
@section('chooseWarehouse')

    <style>
        .bg-default {
            background-color: #1d1d1d !important;
        }

        #chooseWarehouse {
            margin-top: 110px;
            margin-bottom: 100px;
            min-height: 72vh;
        }

        .choosedWareHouse {
            color: #13112e !important;
            font-size: 2rem;
            background-color: #eaeaea;
        }

        .choosedWareHouse:hover {
            transform: scale(1.1, 1.1);
            transform: translateX(20);
            transition: 0.2s;
            box-shadow: -10px 10px #757575fe;
        }

    </style>

    <div class="container" id='chooseWarehouse'>
        <form method="POST" class="row block justify-content-around align-items-center h-70vh">
            @csrf
            @forelse ($warehouseList as $item)
                <button type="submit"
                class="font-weight-bold rounded col-sm-3 m-4 p-4 text-xl-center border-0 choosedWareHouse"
                name="id"
                value="{{$item->id}}-{{$item->name}}">
                {{$item->name}}</button>
            @empty
                <h2 class="text-uppercase text-danger">Không có dữ liệu kho hàng</h2>
            @endforelse
        </form>
    </div>
@endsection
