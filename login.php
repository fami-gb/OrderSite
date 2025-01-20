<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ログインページ</title>
</head>
<body>
    <h1>ログイン</h1>
    <form method="post" action="login.php">
        名前:&emsp; <input type="text" name="name"><br>
        パスワード: <input type="password" name="password"><br>
        <input type="submit" value="ログイン">
    </form>
    <?php
    session_start();
    // html側のformでログインボタンが押されたらPOSTというリクエストを受け取る。
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // form側のinputからnameとpasswordのデータを受け取る。
        $name = $_POST['name'];
        $password = $_POST['password'];

        $db = new SQLite3('database.db');

        // usersテーブルから一致するデータを取得するクエリ
        $result = $db->query("SELECT * FROM users WHERE name = '$name' AND password = '$password'");

        if ($result->fetchArray()) {
            // ログインしたユーザー名をサーバー上で保存
            $_SESSION['user_name'] = $name;
            // ログイン成功後select_product.phpに遷移する。
            header('Location: select_product.php');
        } else {
            echo "認証に失敗しました。";
        }
    }
    ?>
</body>
</html>
