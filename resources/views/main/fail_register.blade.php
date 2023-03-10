@extends('layouts.admin')
@extends('common.head')
@section('content')

<div class = "wrapper">

<div class = "fail_regi_area">
<p class="sentents">ファイルの登録はこちらから行えます。<br>ファイル名を記入し、新規登録ボタンを押してください。</p>

<!-- エラーが出たら表示 -->
@if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="err_msg">{{ $error }}</div>
        @endforeach
@endif

<form action="" method="POST">
<div class="form">
<input type="form" name="fail" class="fail_regi_form">
    {{ csrf_field() }}
<input type="submit" name='submit' class="fail_regi_btn btn--shadow" value="新規登録">

</form>
</div>
</div><!-- fail_regi_area -->

<div class = "fail_regi_area">
<p class="sentents">新規作成し以前のファイルをコピーする場合はこちらからお願いします。<br>ファイル名を記入し、コピーするファイル選択後、登録ボタンを押してください。</p>

<!-- エラーが出たら表示 -->
@if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="err_msg">{{ $error }}
        </div>
        @endforeach
@endif

<form action="" method="POST">
<div class="form">
<input type="form" name="fail" class="fail_regi_form">

<select name="fail_id[]" class="copy_select_form" multiple >
@php
if(isset($months)){
foreach($months as $fail_value) {
    echo '<option value='.$fail_value["id"].'>'.$fail_value["fail_name"].'</option>';}
}
@endphp
</select>
    {{ csrf_field() }}
<button type="submit" class="fail_regi_btn btn--shadow">登録</button>

</form>
<p class="sentent">コピーファイルを複数選択する際はctrlキーを押しながら2個目をクリックしてください。</p>
</div>
</div><!-- fail_regi_area -->

<div class = "fail_regi_area">
<p class="sentents">月末ファイルを選択してください。</p>

<form action="top_select.php" method="get">

<div class="form">
<select name="fail_id" class="fail_select_form">
<option value="">ファイル名</option>
@php
if(isset($months)){
foreach($months as $fail_value) {
    echo '<option value='.$fail_value["id"].'>'.$fail_value["fail_name"].'</option>';
}

}
@endphp
</select>
<input type="submit" value="選択" class="fail_select_btn btn--shadow">
</div>
<!-- 選択ボタンが押されたらそのファイルの値を取得 -->
</form>
</div><!-- fail_regi_area -->
</div><!-- fail_regi_area -->


</div><!--wrapper-->

@include('common.footer') 
@endsection