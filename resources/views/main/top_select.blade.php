@extends('layouts.admin')
@extends('common.head')
@section('content')


<div class = "wrapper">

<p class="top_sentents">項目ごとに一覧表示可能です。<br>また一覧から編集・削除できます。<div class=""></div></p>
@foreach($months as $fail_value)

<div class="btn_text"></div>
<div class="btn_link">
<form action="list_regi.php" method="get">
<input type="submit"  class="selection" value="商品登録">
<input type="hidden" name="fail_id" value="{{ $fail_value->id }}">
@endforeach
</form>



<a href="fail_register.php" class="back_btn">
ファイル選択に戻る
</a>

</div>


@foreach($months as $fail_value)
<form action="list.php" method="get">
<div class="imgarea">
<div class="categoly">
<img src ="{{asset('img/super.jpg')}}">
<!-- <p class="categoly_sentents">全商品</p> -->
<input type="submit" name="submit" value="全商品" class="list_btn">
<input type="hidden" name="fail_id" value="{{ $fail_value->id }}">
</div>

<div class="categoly">
<img src ="{{asset('img/vege.jpg')}}">
<!-- <p class="categoly_sentents">野菜類</p> -->
<input type="submit"  name="submit" value="野菜" class="list_btn">
</div>


<div class="categoly">
<img src ="{{asset('img/meat.jpg')}}">
<!-- <p class="categoly_sentents">肉全般</p> -->
<input type="submit"  name="submit" value="肉類" class="list_btn">
</div>

<div class="categoly">
<img src ="{{asset('img/seafood.jpg')}}">
<!-- <p class="categoly_sentents">海鮮類</p> -->
<input type="submit"  name="submit" value="海鮮類" class="list_btn">
</div>

<div class="categoly">
<img src ="{{asset('img/alcohol.jpg')}}">
<!-- <p class="categoly_sentents">ドリンク</p> -->
<input type="submit"  name="submit" value="ドリンク" class="list_btn">
<input type="hidden" name="fail_id" value="{{ $fail_value->id }}">
</div>

<div class="categoly">
<img src ="{{asset('img/cabinet.jpg')}}">
<!-- <p class="categoly_sentents">調味料</p> -->
<input type="submit"  name="submit" value="調味料" class="list_btn">
</div>


<div class="categoly">
<img src ="{{asset('img/kitchen.jpg')}}">
<!-- <p class="categoly_sentents">消耗品</p> -->
<input type="submit"  name="submit" value="消耗品" class="list_btn">
@endforeach

</form>
</div>

</div><!-- imgarea -->

<div class="amont">
  
</div>

</div><!-- warapper -->

@include('common.footer') 
@endsection