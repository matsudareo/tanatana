@extends('layouts.app')
@extends('common.head')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

            
                    <div class="s">
                   
              
   <div class="s">
   <a href="count_fail.php">計上トップ画面へ移る</a></div>
                </div>
            </div>
        </div>
        <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    </ul>

    </div>
</div>
@endsection
@extends('common.footer')
