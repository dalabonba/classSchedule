<div class="bg-dark mb-5 mt-1">
    <ul class="navbar">
        <a class="navbar-brand ms-2" style="color: goldenrod">{{$title}}</a>
        @if ($title=='課表')
            <li class="nav-item me-2">
                <button class="btn btn-outline-light" type="button" onclick="show_setting()">表格設定</button>
            </li>
        @elseif($title=='設定')
            <li class="nav-item me-2">
                <button class="btn btn-outline-danger" type="button" onclick="show_index()">取消。回課表</button>
            </li>
        @endif
    </ul>
</div>


<script>
    function show_setting() {
        window.location.href = '{{route('show_setting')}}';
    }
    function show_index() {
        window.location.href = '{{route('show_index')}}';
    }
</script>
