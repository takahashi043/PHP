<?php
$dbh = new PDO('sqlite:kadai.db');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('CREATE TABLE IF NOT EXISTS member (
    id INTEGER PRIMARY KEY,
    name TEXT,
    pass TEXT,
    email TEXT,
    address TEXT
)');

$sql = 'SELECT * FROM member ORDER BY id';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
$dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>会員一覧</title>
</head>
<body>
    <h1>会員一覧</h1>

    <?php if (empty($records)): ?>
        <p>会員情報はまだありません。</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>氏名</th>
                <th>メールアドレス</th>
                <th>住所</th>
            </tr>
            <?php foreach ($records as $rec): ?>
                <tr>
                    <td><?php print htmlspecialchars($rec['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php print htmlspecialchars($rec['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php print htmlspecialchars($rec['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php print htmlspecialchars($rec['address'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <br>
    <a href="index.php">メニューに戻る</a>
</body>
</html>