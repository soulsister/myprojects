<?php
 include("m_config.php");
 $arr=user_shell($_SESSION[uid],$_SESSION[user_shell],1);//设置该页面只有权限为1时即最高权限的才能访问
  
 user_mktime($_SESSION[times]);//判断是否超时10秒
  
 //echo $_SESSION[times]."<br>";//登录时该的时间
 //echo mktime()."<br>";//当前日期
 //echo $arr[username]."<br>";
 //echo $arr[uid]."<br>";
  
?>
