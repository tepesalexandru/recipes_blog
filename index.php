<?php 
include 'models/Blog.php';
include 'seed_database.php';
include 'db_queries.php'; 
?>
<?php
$blogs = array();
$result = getBlogs($conn);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $blog = new Blog();
        $blog->id = $row["id"];
        $blog->title = $row["title"];
        $blog->author = $row["author"];
        array_push($blogs, $blog);
    }
} else {
    echo "0 results";
}
?>
<?php
require_once './vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

echo $twig->render('index.html.twig', ['blogs' => $blogs]);
?>

