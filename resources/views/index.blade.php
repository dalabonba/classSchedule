@extends('bootstrap')
@section('content')

        <div class="row justify-content-center">
            <div class="col-2 align-self-center text-center bg-light">
                <h1 class="display-5">第一節</h1>
            </div>
            <div class="col-2">
                <div class="card MousePointer text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <a class="card-body">
                        <h5 class="card-title">課程名稱</h5>
                        <ul class="list-group">
                            <li class="list-group-item">老師名</li>
                            <li class="list-group-item">教室位置</li>
                        </ul>
                    </a>
                </div>
            </div>

        </div>
@endsection
