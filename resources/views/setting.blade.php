@extends('layouts.master')
@section('content')

    <form action="{{route('store_setting')}}" method="post">

        <div class="row justify-content-center">
            @csrf
            <div class="col-3">
                <select class="form-select my-5" name="week_days">
                    <option @if($week_days==5) selected @endif value="5">星期一到五</option>
                    <option @if($week_days==7) selected @endif value="7">星期一到日</option>
                </select>
            </div>

            <div class="col-3">
                <select class="form-select my-5" name="number_of_class">
                    @for($i=1;$i<=15;$i++)
                        <option @if($i==$number_of_class) selected @endif value="{{$i}}">{{$i}}節</option>
                    @endfor
                </select>
            </div>

            <div class="col-2 text-center mt-5">
                <button type="submit" class="btn btn-success">確認變更</button>
            </div>
        </div>


    </form>


@endsection
