<?php
require 'header.php';
require './includes/dbh.inc.php';
require './includes/articles.inc.php';

$articles = getBlogs($conn);

?>

<table class="table" style="vertical-align:middle">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Author</th>
            <th scope="col">Title</th>
            <th scope="col">Published On</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index = 1;
        foreach ($articles as $article) {
            echo $twig->render("article_row.html.twig", [
                'id' => $article['id'],
                'index' => $index,
                'title' => $article['title'],
                'publishedOn' => $article['publishedOn'],
                'author' => $article['author'],
            ]);
            $index++;
        }
        ?>

    </tbody>
</table>