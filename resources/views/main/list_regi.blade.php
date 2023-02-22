@extends('layouts.admin')
@extends('common.head')
@section('content')
<body>


<div class = "wrapper">

<div class="list_regi_sentents">
<p>商品の登録に必要な項目を入力してください。</p>
</div>

<!-- エラーが出たら表示 -->
@if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="err_msg">{{ $error }}</div>
        @endforeach
@endif
<form action="list_regi.php" method="post">

<div class="form">
<input type="form" name="name" placeholder="商品名"  value="{{ old('name') }}" class="list_regi_form">
</div>

<div class="form">
<select name="categolise" class="list_select_form" >
<option value="">カテゴリー選択</option>
<option value="1" @if( old("categolise") === "1") selected @endif>野菜類</option>
<option value="2" @if( old("categolise") === "2") selected @endif>肉類</option>
<option value="3" @if( old("categolise") === "3") selected @endif>海鮮類</option>
<option value="4" @if( old("categolise") === "4") selected @endif>調味料</option>
<option value="5" @if( old("categolise") === "5") selected @endif>消耗品</option>
<option value="6" @if( old("categolise") === "6") selected @endif>ドリンク</option>
</select>
</div>

<div class="form">
<input type="form" name="amont" placeholder="商品金額(円)" class="list_regi_form" value="{{ old('amont') }}">
</div>

<div class="form">
<input type="form" name="weight" placeholder="商品の重さ(g)" class="list_regi_form" value="{{ old('weight') }}">
</div>

{{ csrf_field() }}


<div class="list_btn_area">
<input type="submit" name='submit' class="selection" value="登録">
</div>

<input type="hidden" name="fail_id" value="{{ $months['id'] }}">
</form>

<form action="top_select.php" method="get">
<div class="list_back_btn_area">
<input type="hidden" name="fail_id" value="{{ $months['id'] }}">
<input type="submit" name="submit" value="戻る"  class="back_btn">
</form>
</div>



</div><!--main -->
</body>
@include('common.footer') 
@endsection