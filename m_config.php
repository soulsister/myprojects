<?php
 session_start();
 //数据库连接
 $conn=mysql_connect('localhost','xiao','123');
 mysql_select_db('test',$conn);
 //定义常量
 define(ALL_PS,"test100");
 //查看登录状态与权限
 function user_shell($uid,$shell,$m_id){
   $sql="select * from user_list where `uid`='$uid'";
   $query=mysql_query($sql);
   $us=is_array($row=mysql_fetch_array($query));
   $shell=$us ? $shell==md5($row[username].$row[password].ALL_PS):FALSE;
   if($shell){
     if($row[m_id]<=$m_id){//$row[m_id]越小权限越高，为1时权限最高
       return $row;
     }else{
       echo "你的权限不足,不能查看该页面";
       exit();
     }
   }else{
     echo "登录后才能查看该页";
     exit();
   }
 }
 //设置登录超时
 function user_mktime($onlinetime){
    $new_time=mktime();
    echo $new_time-$onlinetime."秒未操作该页面"."<br>";
    if($new_time-$onlinetime>'10'){//设置超时时间为10秒，测试用
      echo "登录超时,请重新登录";
      exit();
      session_destroy();
    }else{
      $_SESSION[times]=mktime();
    }
 }
?>
