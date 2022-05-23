<?php
require './includes/dbh.inc.php';
require './includes/articles.inc.php';
require_once './vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new \Twig\Environment($loader);
$articles = getBlogs($conn);

?>
<a href="create_article.php">Create article</a>
<div class="container">
    <div class="row">
        <?php
        foreach ($articles as $card) {
            echo $twig->render('blog_card.html.twig', ['title' => $card['title'], 'content' => $card['content'], 'author' => $card['author'], 'id' => $card['id']]);
        }
        ?>
    </div>
</div>