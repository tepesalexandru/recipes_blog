<?php
require 'header.php';
?>

<div class="p-5">
    <div class="mb-1">
        <h3 class="h4 font-weight-bold text-theme">Create a new article</h3>
    </div>
    <p class="text-muted mt-2 mb-5">Easily create new articles by simply filling the form down below.</p>

    <form action="includes/articles/create_article.inc.php" method="POST" enctype="multipart/form-data">
        <div class="container col-md-6">
            <div class="mb-5">
                <label for="Image" class="form-label">Upload article cover</label>
                <input class="form-control" type="file" id="formFile" onchange="preview()" name="article-cover">
            </div>
            <img id="frame" src="" class="img-fluid" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="title">
        </div>
        <div class="form-group mb-5">
            <label for="exampleInputPassword1">Content</label>
            <textarea type="text" class="form-control" id="exampleInputPassword1" name="content" rows="10"></textarea>
        </div>
        <button type="submit" name="create-article-submit" class="btn btn-theme">Create</button>
    </form>

</div>

<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>