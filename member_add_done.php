
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>会員登録</title>
</head>
<body>

<?php
    $nickname = $_POST['nickname'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $zyuusyo = $_POST['zyuusyo'];

    $nickname = htmlspecialchars($nickname, ENT_QUOTES, 'UTF-8');
    $pass = htmlspecialchars($pass, ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $zyuusyo = htmlspecialchars($zyuusyo, ENT_QUOTES, 'UTF-8');

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

    $dbh = new PDO('sqlite:kadai.db');

    $dbh->exec('CREATE TABLE IF NOT EXISTS member (
        id INTEGER PRIMARY KEY,
        name TEXT,
        pass TEXT,
        email TEXT,
        address TEXT
    )');

    $sql = 'INSERT INTO member(name,pass,email,address)
            VALUES(:name,:pass,:email,:address)';

    $stmt = $dbh->prepare($sql);

    $stmt->execute([
        ':name' => $nickname,
        ':pass' => $pass,
        ':email' => $email,
        ':address' => $zyuusyo
    ]);

    print '<br>データベースへの保存が完了しました。';

?>

</body>
</html>
