<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ＰＨＰ基礎</title>
</head>
<body>
<?php
$id = $_POST['id'] ?? '';

if (empty($id)) {
    ?>
    ご意見検索
    <br><br>
    <form method="post" action="kensaku.php">
        ご意見コードを入力してください。<br>
        <input name="id" type="text" style="width:50px"><br>
        <br>
        <input type="submit" value="送信">
    </form>
    <br>
    <a href="index.php">メニューに戻る</a>
    <?php
} else {
    $dbh = new PDO('sqlite:phpkiso.db');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->exec('CREATE TABLE IF NOT EXISTS anketo(id INTEGER PRIMARY KEY,nickname TEXT,email TEXT,goiken TEXT)');

    $sql = 'SELECT * FROM anketo WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data = array();
    $data[] = $id;
    $stmt->execute($data);
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    ?>

    <?php if ($rec == false): ?>
        該当するデータはありません。
    <?php else: ?>
        <p>id: <?php print $rec['id']; ?></p>
        <p>nickname: <?php print $rec['nickname']; ?></p>
        <p>email: <?php print $rec['email']; ?></p>
        <p>goiken: <?php print $rec['goiken']; ?></p>
    <?php endif; ?>

    <br>
    <a href="kensaku.php">検索画面に戻る</a>
    <?php
}
?>
</body>
</html>
