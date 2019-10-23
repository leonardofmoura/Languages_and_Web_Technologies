<?php
    include_once('database/connection.php');

    function list_news() {
        global $db;

        $stmt = $db->prepare('SELECT * FROM news');
        $stmt->execute();
        $articles = $stmt->fetchAll();
    
        foreach ($articles as $article) {
            echo '<h1>' . $article['title'] . '</h1>';
            echo '<p>' . $article['introduction'] . '</p>';
        }
    }
?>


