<?php
require 'includes/dbh.inc.php';
require 'includes/articles.inc.php';
require 'includes/twig.inc.php';
$articles = getBlogs($conn);

?>
<div class="container mt-5">
    <div class="row">
        <?php
        foreach ($articles as $card) {
            echo $twig->render(
                'blog_card.html.twig',
                [
                    'title' => $card['title'], 
                    'content' => substr($card['content'], 0, 200), 
                    'author' => $card['author'], 
                    'id' => $card['id'],
                    'imageSrc' => "data:image/jpeg;base64," . base64_encode($card['imageBlob'])
                ]
            );
        }
        ?>
    </div>
    <div class="row">
        <?php
        foreach ($articles as $card) {
            echo $twig->render(
                'blog_card.html.twig',
                [
                    'title' => $card['title'], 
                    'content' => substr($card['content'], 0, 200), 
                    'author' => $card['author'], 
                    'id' => $card['id'],
                    'imageSrc' => "data:image/jpeg;base64," . base64_encode($card['imageBlob'])
                ]
            );
        }
        ?>
    </div>
</div>