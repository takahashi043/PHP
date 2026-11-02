<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>アンケート一覧</title>
</head>
<body>
<?php
$dbh = new PDO('sqlite:phpkiso.db');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('CREATE TABLE IF NOT EXISTS anketo (
    id INTEGER PRIMARY KEY,
    nickname TEXT,
    email TEXT,
    goiken TEXT
)');

$sql = 'SELECT * FROM anketo ORDER BY id';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
$dbh = null;
?>

<h1>アンケート一覧</h1>

<?php if (empty($records)): ?>
    <p>まだアンケートの回答がありません。</p>
<?php else: ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ニックネーム</th>
            <th>メールアドレス</th>
            <th>ご意見</th>
        </tr>
        <?php foreach ($records as $rec): ?>
            <tr>
                <td><?php print htmlspecialchars($rec['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php print htmlspecialchars($rec['nickname'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php print htmlspecialchars($rec['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php print htmlspecialchars($rec['goiken'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<br>
<a href="index.php">メニューに戻る</a>
</body>
</html>
