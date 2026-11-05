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

$dbh=new PDO('sqlite:phpkiso.db');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('CREATE TABLE IF NOT EXISTS anketo(id INTEGER PRIMARY KEY,nickname TEXT,email TEXT,goiken TEXT)');
$sql='INSERT INTO anketo(nickname,email,goiken)VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
$stmt=$dbh->prepare($sql);
$stmt->execute();
$dbh=null;

print $nickname;
print '様<br>';
print 'ご意見ありがとうございました<br>';
print '頂いたご意見『';
print $goiken;
print '』<br>';
print $email;
print 'にメールを送りましたのでご確認ください。';
?>
</body>
</html>