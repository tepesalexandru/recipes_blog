<?php
require 'header.php';
require './includes/dbh.inc.php';
require './includes/articles.inc.php';
require_once './vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new \Twig\Environment($loader);
$article = getBlogById($conn, $_GET['id']);
$dbComments = getArticleComments($conn, $article['id']);
$comments = [];
$the_rows = [];
while ($row = $dbComments->fetch_array()) {
    $the_rows[] = $row;
}
if (!empty($the_rows)) {
    for ($i = 0; $i < count($the_rows); $i++) {
        $newComment = new stdClass();
        $newComment->imageSrc = "data:image/jpeg;base64," . base64_encode($the_rows[$i]['imageBlob']);
        $newComment->name = $the_rows[$i]['name'];
        $newComment->content = $the_rows[$i]['content'];
        $datePosted = date_format(date_create($the_rows[$i]['datePosted']), "M j Y, H:i");
        $newComment->datePosted = $datePosted;
        array_push($comments, $newComment);
    }
}


echo $twig->render(
    'view_article.html.twig',
    [
        'title' => $article['title'],
        'content' => $article['content'],
        'author' => $article['author'],
        'id' => $article['id'],
        'comments' => $comments,
        'imageSrc' => "data:image/jpeg;base64," . base64_encode($article['imageBlob'])
    ]
);
