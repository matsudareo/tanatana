@include('common.head')

<?php
if (!function_exists('e')) {
  function e($value) {
      return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  }
}

  if(!isset($_SESSION)){ 
    session_start(); 
    session_regenerate_id(TRUE);
  }

if(isset($submit) && $submit == "ログイン"){
  $submit = NULL;

  $user = isset($user) ? $user : '';
  $password = isset($password) ? $password
: '';

  $user = e($user);
  // $password = e($password);

  $error = 0;
  $user_er = NULL;
  // $password_er = NULL;

  if ($user == '') {
    $user_er = '氏名は必須入力です。';
    $_SESSION['user_er'] = $user_er;
    $error++;
    unset($_SESSION['user']);
  } else if (mb_strlen($user) > 3) {
    $user_er = '氏名は3文字以内でご入力ください。';
    $_SESSION['user_er'] = $user_er;
    $error++;
    unset($_SESSION['user']);
  } else {
    $_SESSION['user'] = $user;
    unset($_SESSION['user_er']);
  }

}


?>
@if (Route::has('login')) 
                 <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
@include('common.header') 

<body>
<div class="area" >
  <div class="login">

    <h1>Welcome</h1>
    <p>利用するにはログインしてください</p>

    
    <div class="form">
    <form method="post" action="sign.php" >
    @csrf
    <div class="placeholder">ユーザー名</div>
    <?php if (isset($_SESSION['user_er'])) { echo '<p class="error">'.$_SESSION['user_er'].'</p>'; } ?>
      <input class="user" type="user" placeholder="ユーザー名" value="<?php if(isset ($_SESSION["user"])){echo $_SESSION["user"];} ?>">
      </form>
    </div>
    

    <div class="form">
    <div class="placeholder">パスワード</div>
      <input class="password" type="password" placeholder="パスワード">
      </div>

      <div class="form">
      <input type="submit" class="btn"  name="login" value="ログイン">
      </div>
      </div>

  <div class="s">
  <a href="sign.php">新規登録はこちら</a>
  </div>
<div class="s">
  <a href="login.php">パスワードを忘れた方はこちら</a>
</div>
  <!-- 背景 -->
  
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    
            </ul>
    </div >  <!-- area -->
</body>

@include('common.footer') 