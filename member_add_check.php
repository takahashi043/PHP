<!doctype html">
<html lang="ja">
<head>
    <meta charset="UTF-8">
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
 
    if($nickname=='') {
        print '会員名が入力されていません。<br>';
    } else {
        print 'ようこそ';
        print $nickname;
        print '様'; print '<br>';
    }
    if($pass=='') {
        print 'パスワードが入力されていません。<br>';
    } else {
        print 'パスワード：';
        print $pass;
        print '<br>';
    }
    if($email=='') {
        print 'メールアドレスが入力されていません。<br>';
    } else {
        print 'メールアドレス：';
        print $email;
        print '<br>';
    }
    if($zyuusyo=='') {
        print '住所が入力されていません。<br>';
    } else {
        print '住所：';
        print $zyuusyo;
        print '<br>';
    }
    if($nickname==''||$pass==''||$email==''||$zyuusyo=='') {
        print'<form>';
        print'<input type="button" onclick="history.back()" value="戻る">';
        print'</form>';
    } else {
        print'<form method="post" action="member_add_done.php">';
        print'<input name="nickname" type="hidden" value="'.$nickname.'">';
        print'<input name="pass" type="hidden" value="'.$pass.'">';
        print'<input name="email" type="hidden" value="'.$email.'">';
        print'<input name="zyuusyo" type="hidden" value="'.$zyuusyo.'">';
        print'<input type="button" onclick="history.back()" value="戻る">';
        print'<input type="submit" value="OK">';
        print'</form>';
    }    
?>
</body>
</html>