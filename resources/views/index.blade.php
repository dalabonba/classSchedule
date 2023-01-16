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
            <div class="card MousePointer text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$j}}">
                <a class="card-body">
                    <h5 class="card-title">{{$db_class_table[$j-1]->class_name}}</h5> {{-- 第1筆資料索引值是0所以要減1 --}}
                    <ul class="list-group">
                        <li class="list-group-item">{{$db_class_table[$j-1]->professor}}</li>
                        <li class="list-group-item">{{$db_class_table[$j-1]->classroom}}</li>
                    </ul>
                </a>
            </div>
        </div>

        {{-- Modal --}}
        <div class="modal fade" id="staticBackdrop{{$j}}" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">編輯課程{{$j}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{route('store_class')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$j}}">
                        <div class="container">
                            <div class="row mt-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="class_name{{$j}}" name="class_name"
                                           maxlength="20" placeholder="ex:課程名稱"
                                           value="{{$db_class_table[$j-1]->class_name}}">
                                    <label class="ms-2" for="class_name{{$j}}">輸入課程名稱</label>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="professor{{$j}}" name="professor"
                                           maxlength="30" placeholder="ex:教授名字"
                                           value="{{$db_class_table[$j-1]->professor}}">
                                    <label class="ms-2" for="professor{{$j}}">輸入教授名字</label>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="classroom{{$j}}" name="classroom"
                                           maxlength="20" placeholder="ex:教室位置"
                                           value="{{$db_class_table[$j-1]->classroom}}">
                                    <label class="ms-2" for="classroom{{$j}}">輸入教室位置</label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-primary">確認編輯</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- endModal --}}
        @endfor
    </div>
    @endfor

@endsection
