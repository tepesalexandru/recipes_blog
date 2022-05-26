<?php
require 'includes/dbh.inc.php';
require 'includes/articles.inc.php';
require 'header.php';
require 'includes/twig.inc.php';
$myArticles = getBlogsByUserId($conn, $_SESSION['userId']);
?>

<table class="table" style="vertical-align:middle">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Published On</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index = 1;
        foreach ($myArticles as $article) {
            echo $twig->render("article_row.html.twig", [
                'id' => $article['id'],
                'index' => $index,
                'title' => $article['title'],
                'publishedOn' => $article['publishedOn']
            ]);
            $index++;
        }
        ?>

    </tbody>
</table>