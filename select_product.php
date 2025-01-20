<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>注文ページ</title>
</head>
<body>
    <h1>商品を選択</h1>
    <form method="post" action="select_product.php">
        <?php
        $db = new SQLite3('database.db');

        // 商品一覧を取得するクエリ
        $results = $db->query('SELECT * FROM products');

        // 取得した商品の個数分checkboxを生成する。
        while ($products = $results->fetchArray()) {
            // nameで[]に指定して、product[]という配列で送信する。
            echo '<input type="checkbox" name="product[]" value="' . $products['id'] . '">' . $products['name'] . '<br>';
        }
        ?>
        <input type="submit" value="選択">
    </form>
    <?php
    session_start(); // セッションを使ってログインしたユーザーの名前をページ遷移後でも使ってる。
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $selected_products = $_POST['product']; // products.id
        $name = $_SESSION['user_name'];         // ログインしたユーザー名

        // 選択した商品のをDBに保存する
        foreach ($selected_products as $product_id) {
            $db->query("INSERT INTO selected_products (id, customer) VALUES ('$product_id', '$name')");
        }

        // show_list.phpに遷移する。
        header('Location: show_list.php');
    }
    ?>
</body>
</html>
