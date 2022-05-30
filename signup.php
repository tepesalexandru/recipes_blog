<?php
require 'header.php';
?>
<main style="min-height: 100vh; display: flex; align-items: center">
    <div id="main-wrapper" class="container" >
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Signup</h3>
                                    </div>
                                    <h6 class="h5 mb-0">Welcome back!</h6>
                                    <p class="text-muted mt-2 mb-5">Enter your credentials in order to create a new account.</p>

                                    <form action="includes/signup.inc.php" method="POST">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="name">
                                        </div>
                                        <div class="form-group ">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="password-repeat">Repeat password</label>
                                            <input type="password" class="form-control" id="password-repeat" name="password-repeat">
                                        </div>
                                        <button type="submit" name="signup-submit" class="btn btn-theme">Signup</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">Family Recipes for everyone!</h4>
                                        <p class="lead text-white">"Best blogging platform for recipes out there, I've recommened it to all my friends!"</p>
                                        <p>- Tepes Alexandru</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <p class="text-muted text-center mt-3 mb-0">Already have an account? <a href="index.php" class="text-primary ml-1">Login</a></p>
            </div>
        </div>
    </div>
</main>