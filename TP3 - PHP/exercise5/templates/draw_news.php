<?php function draw_news($articles) {
    foreach ($articles as $article) { 
        $tags = explode(',',$article['tags']); ?>
        <article>
            <header>
                <h1><a href="item.html"> <?= $article['title'] ?></a></h1>
            </header>
            <img src="img/<?= $article['id'] ?>.jpg" alt="">
            <p> <?= $article['introduction'] ?> <p>
            <p> <?= $article['fulltext'] ?> </p>
            <footer>
                <span class="author"><?= $article['name'] ?> </span>
                <span class="tags">
                <?php foreach($tags as $tag) { ?>
                    <a href="index.php"><?= $tag ?></a>
                <?php } ?>
                </span>
                <span class="date"><?= date("d-m-Y H:i:s", substr($article['published'],0,10)) ?></span>
                <a class="comments" href="item.html#comments"><?= $article['comments'] ?></a>
            </footer>
      </article>
    <?php } 
} ?>