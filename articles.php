<?php
require './includes/dbh.inc.php';
require './includes/articles.inc.php';
require_once './vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new \Twig\Environment($loader);
$articles = getBlogs($conn);

?>
<div class="container">
    <div class="row">
        <?php
        foreach ($articles as $card) {
            echo $twig->render('blog_card.html.twig', ['name' => $card['Author']]);
        }
        ?>
    </div>
</div>