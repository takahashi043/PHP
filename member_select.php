<?php
$id = $_POST['id'] ?? '';

$dbh = new PDO('sqlite:kadai.db');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('CREATE TABLE IF NOT EXISTS member (
    id INTEGER PRIMARY KEY,
    name TEXT,
    pass TEXT,
    email TEXT,
    address TEXT
)');

$sql = 'SELECT * FROM member WHERE id=?';
$stmt = $dbh->prepare($sql);
$data = array();
$data[] = $id;
$stmt->execute($data);
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>会員検索結果</title>
</head>
<body>
<?php if ($rec == false): ?>
    該当する会員はありません。
<?php else: ?>
    <p>ID: <?php print $rec['id']; ?></p>
    <p>氏名: <?php print $rec['name']; ?></p>
    <p>メールアドレス: <?php print $rec['email']; ?></p>
    <p>住所: <?php print $rec['address']; ?></p>
<?php endif; ?>

<br>
<a href="member_select.html">会員検索画面に戻る</a>
<br><br>
<a href="index.php">メニューに戻る</a>
</body>
</html>
