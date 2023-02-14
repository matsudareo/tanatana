@extends('layouts.app')
@extends('common.head')
@section('content')


<div class="list_regi_sentents">
<p>これでよろしければ完了を押してください。</p>
</div>


<form action="complete.php" method="post">
@csrf
<div class="edit_conf_area">
<p>商品ID</p>
<div class="edit_conf">{{ $array["id"]}}</div>
</div>

<div class="edit_conf_area">
<p class="edit_conf">商品名</p>
<div class="edit_conf">{{ $array["merchandise"]}}</div>
</div>

<div class="edit_conf_area">
<p class="edit_conf">分類</p>
<div class="edit_conf">{{ $array["categoly_id"]}}</div>
</div>

<div class="edit_conf_area">
<p class="edit_conf">金額</p>
<div class="edit_conf">{{ $array["amont"]}}</div>
</div>

<div class="edit_conf_area">
<p class="edit_conf">重さ</p>
<div class="edit_conf">{{ $array["all_weight"]}}</div>
</div>

<div class="list_btn_area">
<input type="submit" name="submit" value="完了" class="selection">
</div>

<input type="hidden" name="id" value="{{  $array['id'] }}">
<input type="hidden" name="month_id" value="{{  $array['month_id'] }}">
<input type="hidden" name="merchandise" value="{{  $array['merchandise'] }}">
<input type="hidden" name="categoly_id" value="{{  $array['categoly_id'] }}">
<input type="hidden" name="amont" value="{{  $array['amont'] }}">
<input type="hidden" name="all_weight" value="{{  $array['all_weight'] }}">

</form>

<div class="list_back_btn_area">
<button type="button" onClick="history.back()" class="back_btn">戻る</button>
</div>


@include('common.footer') 
@endsection