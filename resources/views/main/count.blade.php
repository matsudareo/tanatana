@extends('layouts.app')
@extends('common.head')
@section('content')

<div class = "wrapper">
<p class="top_sentents">カテゴリー別で入力可能です。</p>


<a href="count_fail.php" class="back_btn">
ファイル選択に戻る
</a>

<div class="count">
<div class="count_all"><span>合計額</span>{{ $count_all }}円</div>
</div>

<form action="count_edit.php" method="get">
<div class="imgarea">

<div class="categoly">
<img src ="{{asset('img/super.jpg')}}">
<input type="submit" name="submit" value="全商品" class="list_btn">
<input type="hidden" name="fail_id" value="{{ $fails['id'] }}">
</div>

<div class="categoly">
<img src ="{{asset('img/vege.jpg')}}">
<input type="submit"  name="submit" value="野菜一覧" class="list_btn">
</div>

<div class="categoly">
<img src ="{{asset('img/meat.jpg')}}">
<input type="submit"  name="submit" value="肉類一覧" class="list_btn">
</div>

<div class="categoly">
<img src ="{{asset('img/seafood.jpg')}}">
<input type="submit"  name="submit" value="海鮮類一覧" class="list_btn">
</div>

<div class="categoly">
<img src ="{{asset('img/cabinet.jpg')}}">
<input type="submit"  name="submit" value="調味料全品" class="list_btn">
</div>

<div class="categoly">
<img src ="{{asset('img/alcohol.jpg')}}">
<input type="submit"  name="submit" value="ドリンク一覧" class="list_btn">
</div>

<div class="categoly">
<img src ="{{asset('img/kitchen.jpg')}}">
<input type="submit"  name="submit" value="消耗品一覧" class="list_btn">
</div>

</form>




</div><!-- imgarea -->

</div><!-- warapper -->

@include('common.footer') 
@endsection