<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>会員登録</title>
</head>
<body>
<?php
    $nickname=$_POST['nickname'];
    $pass=$_POST['pass'];
    $email=$_POST['email'];
    $zyuusyo=$_POST['zyuusyo'];
   
    $nickname= htmlspecialchars($nickname);
    $pass= htmlspecialchars($pass);
    $email= htmlspecialchars($email);
    $zyuusyo= htmlspecialchars($zyuusyo);

    print '下記の内容で登録しました。<br>';
    print '氏名：';
    print $nickname;
    print '<br>';
    print 'パスワード：';
    print $pass;
    print '<br>';
    print 'メールアドレス：';
    print $email;
    print '<br>';
    print '住所：';
    print $zyuusyo;
    
?>
</body>
</html>