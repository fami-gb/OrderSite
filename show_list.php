<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>注文一覧</title>
</head>
<body>
    <?php
    session_start();
    $name = $_SESSION['user_name'];

    echo '<h1>' . $name . 'さんの購入履歴</h1>';
    ?>
    <ul>
        <?php
        $db = new SQLite3('database.db');
        $name = $_SESSION['user_name'];

        // 選択したidと一致する商品かつログインしたユーザーのレコードの商品名を取得するクエリ
        $results = $db->query("SELECT
                                    products.name

                                FROM
                                    selected_products

                                INNER JOIN
                                    products

                                ON selected_products.id = products.id

                                WHERE selected_products.customer = '$name'
                            ");

        // 
        while ($products = $results->fetchArray()) {
            echo '<li>' . $products['name'] . '</li>';
        }
        ?>
    </ul>
</body>
</html>
