@extends('layouts.admin')
@extends('common.head')
@section('content')
<script>
$(function () {
  $(".delete_btn").click(function(){
    alert('本当に削除してよろしいですか');
  })
});
</script>
<div class = "wrapper">

<table class="all_list">
  <tr>
    <th>商品ID</th>
    <th>分類</th>
    <th>商品名</th>
    <th>金額(円)</th>
    <th>重さ(g)</th>
    <th>編集</th>
    <th>削除</th>
  </tr>


  @foreach($month_manege as $value_mane)
  <form action="" method="get">
  <tr>
  <td>{{ $value_mane->id }}</td>
  <td>{{  $value_mane->categoly_id }}</td>
  <td>{{  $value_mane-> merchandise }}</td>
  <td>{{ $value_mane->amont }}</td>
  <td>{{ $value_mane->all_weight }}</td>

  @csrf
  <td><input type="submit" name="sub" value="編集" class="edit_btn" formaction="edit.php"></td>
  <!-- <th><button  onclick="location.hreaf='./edit}'">編集</button></th> -->
  
  @csrf
  <td><input type="submit" name="sub" value="削除" class="delete_btn" formaction="delete_complete.php"></td>
  </tr>
  <!-- めっちゃ大事 -->
  <input type="hidden" name="id" value="{{  $value_mane->id }}">
  <input type="hidden" name="categoly_id" value="{{ $value_mane->categoly_id }}">
  <input type="hidden" name="merchandise" value="{{ $value_mane->merchandise }}">
  <input type="hidden" name="amont" value="{{ $value_mane->amont }}">
  <input type="hidden" name="all_weight" value="{{ $value_mane->all_weight }}">
  <input type="hidden" name="month_id" value="{{  $value_mane->month_id }}">
 
</form>
  @endforeach

</table>

<div class="top_back">
<button type="button" onClick="history.back()" class="top_back_btn">TOPに戻る</button>
</div>


</div>
@include('common.footer') 
@endsection