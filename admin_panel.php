<?php
require 'header.php';
require './includes/dbh.inc.php';
require './includes/articles.inc.php';
require './includes/users.inc.php';

$users = getUsers($conn);
$articles = getBlogs($conn);
$tabSelected = "articles";
$isAdmin = $_SESSION['isAdmin'];

if ($isAdmin == 0) {
    header("Location: index.php");
}

if (isset($_GET['tab'])) {
    $tabSelected = $_GET['tab'];
}
?>



<div class="btn-group mt-4 mb-4" role="group" aria-label="Basic example" style="width: 100%; display: flex; justify-content: center; gap: 20px;">
    <a href="admin_panel.php?tab=users">
        <button class=" btn btn-secondary" name="admin-view-users">View users</button>
    </a>
    <a href="admin_panel.php?tab=articles">
        <button class="btn btn-secondary" name="admin-view-articles">View articles</button>
    </a>
</div>

<?php if ($tabSelected == "articles") : ?>
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
<?php else : ?>
    <table class="table" style="vertical-align:middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            foreach ($users as $user) {
                echo $twig->render("user_row.html.twig", [
                    'id' => $user['id'],
                    'index' => $index,
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'isDisabled' => $user['isDisabled']
                ]);
                $index++;
            }
            ?>

        </tbody>
    </table>
<?php endif; ?>