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

<div style="width:100%;" class="box">
        <canvas id="myChart" width="800px" height="300px"></canvas>
    </div>
    <script>
const ctx = document.getElementById('myChart');
var month_array = @json($months);
var na = @json($name);
for (var key in na){
console.log(na[key].fail_name);
var l = na[key].fail_name;

const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [@php  
            foreach($months as $fail_value) {
                echo '"'.($fail_value["fail_name"]).'",';} @endphp],
            datasets: [{
                label: '各月の棚卸合計額',
                data: [@php foreach($months as $fail_value) {
                echo $fail_value["amont_all"].",";} @endphp],
                backgroundColor: 
                'rgba(54, 162, 235, 0.5)',
                borderColor: 
                    'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        }
    })
}

    </script>
  
</div>
@include('common.footer') 
@endsection





