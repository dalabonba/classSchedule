@extends('layouts.master')
@section('content')

    @for($i=1;$i<=$number_of_class;$i++){{-- $i:第幾節課、$number_of_class:有幾節課，1節課一個row --}}
    <div class="row justify-content-center mb-2">
        <div class="col-2 align-self-center text-center bg-light">{{--每個row開頭插一個節次--}}
            <h1 class="display-5">第{{$i}}節</h1>
        </div>

        {{-- 假如$week_days=5，代表每5筆class的資料，就要換下一個row --}}
        @for($j=($i-1)*$week_days+1;$j<=($week_days*$i);$j++)  {{-- 假如$week_days=5，在$i=1時，$j會是1~5，$i=2時，$j是6~10，以此類推  --}}
        <div @if($week_days==5) class="col-2" @else class="col-1" @endif>
            <div class="card MousePointer text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <a class="card-body">
                    <h5 class="card-title">{{$db_class_table[$j-1]->class_name}}</h5> {{-- 第1筆資料索引值是0所以要減1 --}}
                    <ul class="list-group">
                        <li class="list-group-item">{{$db_class_table[$j-1]->professor}}</li>
                        <li class="list-group-item">{{$db_class_table[$j-1]->classroom}}</li>
                    </ul>
                </a>
            </div>
        </div>
        @endfor
    </div>
    @endfor

    @include('modal')
@endsection
