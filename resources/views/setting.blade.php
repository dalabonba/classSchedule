@extends('layouts.master')
@section('content')

    <form action="{{route('store_setting')}}" method="post">

        <div class="row justify-content-center">
            <div class="col-3">
                <select class="form-select my-5" name="week_days">
                    <option selected value="5天">星期一到五</option>
                    <option value="7天">星期一到日</option>
                </select>
            </div>

            <div class="col-3">
                <select class="form-select my-5" name="number_of_class">
                    <option value="1">1節</option>
                    <option value="2">2節</option>
                    <option value="3">3節</option>
                    <option value="4">4節</option>
                    <option value="5">5節</option>
                    <option value="6">6節</option>
                    <option value="7">7節</option>
                    <option selected value="8">8節</option>
                    <option value="9">9節</option>
                    <option value="10">10節</option>
                    <option value="11">11節</option>
                    <option value="12">12節</option>
                    <option value="13">13節</option>
                    <option value="14">14節</option>
                    <option value="15">15節</option>
                </select>
            </div>

            <div class="col-2 text-center mt-5">
                <button type="submit" class="btn btn-success">確認變更</button>
            </div>
        </div>


    </form>


@endsection
