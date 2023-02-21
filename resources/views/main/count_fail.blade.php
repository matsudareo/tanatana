@extends('layouts.app')
@extends('common.head')
@section('content')

<div class = "wrapper">
<div class = "fail_regi_area">
<p class="sentents">棚卸ファイルを選択してください。</p>

<!-- エラーが出たら表示 -->
@if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="err_msg">{{ $error }}</div>
        @endforeach
@endif
<form action="count.php" method="get">
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
<input type="submit" name="count" class="count_fail_select_btn" value="このファイルを計上する">
</div>
</form>

</div><!-- fail_regi_area -->

</div>
@include('common.footer') 
@endsection





