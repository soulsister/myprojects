<?php
 include("m_config.php");
 //echo md5("admin2".ALL_PS);
 if($_POST[submit]){
  $username=str_replace(" ","","$_POST[username]");
  $sql="select * from user_list where `username`='$username'";
  $query=mysql_query($sql);
  $us=is_array($row=mysql_fetch_array($query));
  $ps=$us ? md5($_POST[password].ALL_PS)==$row[password] : FALSE;
  if($ps){
    $_SESSION[uid]=$row[uid];
    $_SESSION[user_shell]=md5($row[username].$row[password].ALL_PS);
    $_SESSION[times]=mktime();//取得登录时忘该的时间
    echo "登录成功";
    echo "<br>";
    echo $_POST[password].ALL_PS;
  }else{
      echo "用户名或密码错误<br>";
    session_destroy();//密码错误时消除所有的session
  }
 }
?>
<form action="" method="post">
 用户名：<input name="username" type="text" /><br />
 密码  ：<input name="password" type="password" /><br />
 验证码：<input name="code" type="code" />5213<br /><br />
 <input name="submit" type="submit" value="登录" />
</form>
