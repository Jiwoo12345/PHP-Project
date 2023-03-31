<!Doctype Html>
<Html lang="en">
<Head>
    <Title>Login</Title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="stylesheet" href="main.css">
</Head>

<Body>

<nav>
    <img class="website-logo" src="images/PHP-Project_Logo.png" alt="Logo">
    <ul>
        <li><a href="index.php">Homepage</a></li>
        <li><a href="tweets.php">Tweets</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="profile.php">Account</a></li>
    </ul>
</nav>


<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>

                            <br>
                            <br>

                            <div class="form-outline form-white mb-4">
                                <input type="email" id="typeEmailX" class="form-control form-control-lg"
                                       placeholder="Email"/>
                                <label class="form-label" for="typeEmailX"></label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="typePasswordX" class="form-control form-control-lg"
                                       placeholder="password"/>
                                <label class="form-label" for="typePasswordX"></label>
                            </div>


                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</Body>
</Html>


<?php

