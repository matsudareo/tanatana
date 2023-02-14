@include('common.head')
@include('common.header') 
<body>
<div class="area" >
   <h1>パスワードリセット画面</h1>

   <form action = "" method = "POST">
  
    <div class="form">
    <div class="placeholder">新たなパスワード</div>
      <input class="password" type="password" placeholder="新たなパスワード">
      </div>

      <div class="form">
    <div class="placeholder">確認用パスワード</div>
      <input class="password" type="password-conf" placeholder="確認用パスワード">
      </div>


      <!-- <div class="btn">
        <input class="btn" type="submit" name="sign" value="登録">
      </div> -->
      <div class="form">
      <button type="submit" class="submit"  id="sign-button">登録</button>
      </div>

   </form>
   

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