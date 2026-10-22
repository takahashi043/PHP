<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ＰＨＰ基礎</title>
</head>
<body>
<?php
$nickname=$_POST['nickname'];
$email=$_POST['email'];
$goiken=$_POST['goiken'];
$nickname= htmlspecialchars($nickname);
$email= htmlspecialchars($email);
$goiken= htmlspecialchars($goiken);
print $nickname;
print '様<br>';
print 'ご意見ありがとうございました<br>';
print '頂いたご意見『';
print $goiken;
print ']<br>';
print $email;
print 'にメールを送りましたのでご確認ください。';
?>
</body>
</html>