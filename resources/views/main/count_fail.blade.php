@extends('layouts.app')
@extends('common.head')
@section('content')

<!-- @php
// アクセス制限
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : NULL;
if (!(strpos($referer, '/home') !== false|| strpos($referer, 'count.php') !== false )) {
    header("Location:/");
    exit;
}
@endphp -->
<div class = "wrapper">
<div class = "fail_regi_area">
<p class="sentents">棚卸ファイルを選択してください。</p>

<form action="count.php" method="get">
<div class="form">
<select name="fail_id" class="fail_select_form">
<option value="0">ファイル名</option>
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





