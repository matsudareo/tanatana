@include('common.head')
@include('common.header') 
<body>
<div class="area" >
   <h1>新規登録確認</h1>

   <form action = "" method = "POST">
   <div class="form">
    <div class="placeholder">ユーザー名</div>
      <input class="user" type="user" placeholder="ユーザー名">
    </div>

    <div class="form">
    <div class="placeholder">パスワード</div>
      <input class="password" type="password" placeholder="パスワード">
      </div>

     
      <!-- <div class="btn">
        <input class="btn" type="submit" name="sign" value="登録">
      </div> -->
      <div class="form">
      <button type="submit" class="submit"  id="send-button">登録</button>
      </div>
      </form>
      <div class="form">
      <button type="submit" class="submit"  id="back-button">戻る</button>
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