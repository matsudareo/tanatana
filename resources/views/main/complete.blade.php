@extends('layouts.app')
@extends('common.head')
@section('content')



<p class="comp_sentents">登録が完了致しました。</p>

<div class="comp_btn_area">
<form action="top_select.php" method="get">
<input type="hidden" name="fail_id" value="{{ $array['month_id'] }}">
<div class="comp_btn_div">
<input type="submit" name="submit" value="一覧に戻る"  class="back_btn"></div>
</form>

<a href="fail_register.php" class="comp_btn_fail">
ファイル選択に戻る
</a>
</div>


@include('common.footer') 
@endsection