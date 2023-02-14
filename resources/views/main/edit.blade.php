@extends('layouts.app')
@extends('common.head')
@section('content')


<div class="list_regi_sentents">
<p>商品の登録に必要な項目を編集してください。</p>
</div>

<!-- エラーが出たら表示 -->

@if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="err_msg">{{ $error }}</div>
        @endforeach
@endif

@foreach($edit as $edit_value)
<form action="edit_conf.php" method="POST">
<div class="form">
  <p class="edit_list">商品名</p>
<input type="form" name="name" value="{{ $edit_value->merchandise }}" class="edit_form">
</div>

<div class="form">
<p class="edit_list">分類選択</p>
<input type="form" name="categolise" value="{{ $edit_value->categoly_id }}"   placeholder="分類選択" class="edit_form">
</div>
<!-- <div class="form">
<select name="categolise" class="list_select_form" >
<option value="">カテゴリー選択</option>
<option value="1" @if( old("categolise") === "1") selected @endif>野菜類</option>
<option value="2" @if( old("categolise") === "2") selected @endif>肉類</option>
<option value="3" @if( old("categolise") === "3") selected @endif>海鮮類</option>
<option value="4" @if( old("categolise") === "4") selected @endif>調味料</option>
<option value="5" @if( old("categolise") === "5") selected @endif>消耗品</option>
<option value="6" @if( old("categolise") === "6") selected @endif>ドリンク</option>
</select>
</div> -->

<div class="form">
<p class="edit_list">商品金額</p>
<input type="form" name="amont" value="{{ $edit_value->amont }}" placeholder="商品金額" class="edit_form">
</div>

<div class="form">
<p class="edit_list">商品の重さ</p>
<input type="form" name="weight" value="{{ $edit_value->all_weight }}" placeholder="商品の重さ" class="edit_form">
</div>

{{ csrf_field() }}


<div class="list_btn_area">
<input type="submit" name="submit" value="編集完了" class="selection">
</div>

<div class="list_back_btn_area">
<button type="button" onClick="history.back()" class="back_btn">戻る</button>
</div>


  <!-- めっちゃ大事 -->
  <input type="hidden" name="id" value="{{ $edit_value->id }}">
  <input type="hidden" name="month_id" value="{{ $edit_value->month_id }}">
  <!-- <input type="hidden" name="merchandise" value="{{ $edit_value->merchandise }}">
  <input type="hidden" name="amont" value="{{ $edit_value->amont }}">
  <input type="hidden" name="all_weight" value="{{ $edit_value->all_weight }}"> -->

</form>

@endforeach



@include('common.footer') 
@endsection