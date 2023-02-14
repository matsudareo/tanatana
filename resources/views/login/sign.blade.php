@include('common.head')
@include('common.header') 
<body>
<div class="area" >
   <h1>新規登録</h1>

   <form action = "" method = "POST">
   <div class="form">
    <div class="placeholder">ユーザー名</div>
      <input class="user" type="user" placeholder="ユーザー名">
    </div>

    <div class="form">
    <div class="placeholder">パスワード</div>
      <input class="password" type="password" placeholder="パスワード">
      </div>

      <div class="form">
    <div class="placeholder">確認用パスワード</div>
      <input class="password" type="password-conf" placeholder="確認用パスワード">
      </div>

        <p>登録するユーザーの種類を選択してください。</p>
    
  
    <div class="placeholder">ユーザー選択</div>    
    <select name="role" id="role">
            <option value="0">在庫管理者</option>
            <option value="1">計上登録ユーザー</option>
    </select>
   
 
     
      <!-- <div class="btn">
        <input class="btn" type="submit" name="sign" value="登録">
      </div> -->
      <div class="form">
      <button type="submit" class="submit"  id="sign-button">登録</button>
      </div>

   </form>
   <div class="s">
   <a href="login.php">ログイン画面へ戻る</a></div>

     <!-- 背景 -->
  
     <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    
            </ul>
    </div > 
  
</body>

@include('common.footer') 