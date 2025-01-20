<?php
// データベースの接続
$db = new SQLite3('database.db');

// テーブルの作成
$db->exec('CREATE TABLE IF NOT EXISTS users (name TEXT, password TEXT)');
$db->exec('CREATE TABLE IF NOT EXISTS products (id INTEGER PRIMARY KEY, name TEXT)');
$db->exec('CREATE TABLE IF NOT EXISTS selected_products (id INTEGER, customer TEXT)');

// 取り敢えずテストデータ入れておく
$db->exec('INSERT INTO users (name, password) VALUES ("admin", "password")');
$db->exec('INSERT INTO products (name) VALUES ("Product 1"), ("Product 2"), ("Product 3")');

echo "データベースの初期化が完了しました。";
?>
