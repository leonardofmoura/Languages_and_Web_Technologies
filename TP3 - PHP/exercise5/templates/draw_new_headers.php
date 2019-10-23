<?php function draw_new_headers($articles) {
    foreach ($articles as $article) { ?>
        <article>
            <h1><a href="#"><? $article['title'] ?></a></h1>
            <p><? $article['introduction'] ?></p>
        </article>
    <?php } 
} ?>
