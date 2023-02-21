@extends('layouts.app')
@extends('common.head')
@section('content')



<div class = "wrapper">


<p class="top_sentents">在庫量を入力し、計上ボタンを押してください<br>最後に表の右下の完了ボタンを押したら計上されます。</p>

<button type="button" onClick="history.back()" class="selection">戻る</button>

<table class="all_list">
  <tr>
    <th>商品ID</th>
    <th>分類</th>
    <th>商品名</th>
    <th>金額</th>
    <th>重さ</th>
    <th>在庫金額</th>
    <th>在庫量（ｇ）</th>
    <th></th>
  </tr>

  @foreach($fails as $fail_value)
  <form  name="{{ $fail_value->id }}" method="post">
  <tr>
  <td>{{ $fail_value->id }}</td>
  <td>{{  $fail_value->categoly_id }}</td>
  <td>{{  $fail_value-> merchandise }}</td>
  <td>{{ $fail_value->amont }}</td>
  <td>{{ $fail_value->all_weight }}</td>  
  <td><div class="ajax_result" id_data="{{ $fail_value->id }}"></div></td>
  <td><input class="ajax_form" name="ajax_form" type="text" ></td>
  <td><button class="ajax_submit" type="submit" name="calcId" id_data="{{ $fail_value->id }}" >計上</button></td>
  </tr> 
  <!-- 送信する値 -->
  
  
  @csrf
  <input type="hidden" name="id" value="{{  $fail_value->id }}">
  <input type="hidden" name="categoly_id" value="{{ $fail_value->categoly_id }}">
  <input type="hidden" name="merchandise" value="{{ $fail_value->merchandise }}">
  <input type="hidden" name="ajax_amont" value="{{ $fail_value->amont }}" >
  <input type="hidden" name="all_weight" value="{{ $fail_value->all_weight }}">

  <input type="hidden" name="fail_id" value="{{$fail_value->month_id}}">

</form>
<script>
    $(function(){
      //let id =  $('.ajax_submit').val();
        $("form[name='{{ $fail_value->id}}']").submit('click', function(e){
          e.preventDefault();
    //       var slug = $(this).attr("id_data");
    // console.log(slug);
        // 入力する値の取得
        let input_value = $('.ajax_form').val();
       // console.log(slug);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},  // CSRFトークンの設定
            url: "{{ route('splite_blade.ajax') }}",
            type: 'POST',
            data: $(this).serialize(),
        })
        .done(function(data){
            // 通信に成功したら、指定したIDにhtmlデータを挿入
            $('.ajax_result[id_data={{ $fail_value->id}}]').html(data['form']);
            
        })
        .fail(function(){
            alert('error');
        })
    });
});
</script>

@endforeach
</table>

<form action="" method="post" class="d_form">
  @csrf
  @if (isset($fail_value))
  <input type="hidden" name="id" value="{{ $fail_value->month_id }}">
  
  <input type="submit" name="submit" value="完了" class="d_btn">
  @endif
</form>


</div>


@include('common.footer') 
@endsection
