<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント登録</title>
</head>
<body>
    <h2>アカウント登録</h2>
    <form action="register.php" method="post">
        <label for="username">ユーザー名:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="confirm_password">パスワード確認:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        
        <input type="submit" value="登録">
    </form>
</body>
</html>
