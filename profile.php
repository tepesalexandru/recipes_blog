<?php
require 'header.php';
$imageSrc = "";
?>

<div class="p-5">
    <div class="mb-1">
        <h3 class="h4 font-weight-bold text-theme">Your profile</h3>
    </div>
    <p class="text-muted mt-2 mb-5">Swap your profile picture or change your username!</p>

    <form action="includes/save_profile.php" method="POST" enctype="multipart/form-data">
        <div class="container col-md-6">
            <div class="mb-5">
                <label for="Image" class="form-label">Upload new profile picture</label>
                <input class="form-control" type="file" id="formFile" onchange="preview()" name="article-cover">
            </div>
            <img id="frame" src="assets/default_profile_picture.jpg" class="rounded mx-auto d-block" height="256px" width="256px" style="object-fit: cover;" />
        </div>
        <div class="form-group">
            <label for="usernameInput">Username</label>
            <input type="text" class="form-control" id="usernameInput" name="username">
        </div>
        <div class="form-group mb-5">
            <label for="emailInput">Email</label>
            <input type="text" class="form-control" id="emailInput" name="email" disabled value="123">
        </div>
        <button type="submit" name="create-article-submit" class="btn btn-theme">Save changes</button>
    </form>

</div>

<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>