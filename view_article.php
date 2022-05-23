<?php
require 'header.php';
require './includes/dbh.inc.php';
require './includes/articles.inc.php';
require_once './vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new \Twig\Environment($loader);
$article = getBlogById($conn, $_GET['id']);

echo $twig->render('view_article.html.twig', ['title' => $article['title'], 'content' => $article['content'], 'author' => $article['author'], 'id' => $article['id']]);
?>