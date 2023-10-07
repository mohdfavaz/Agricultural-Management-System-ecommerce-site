<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="index-style.css">
    <title>home</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand text-white" href="#">AMS</a>
            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-white" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link text-white" href="#about-us">About</a>
                    <a class="nav-link text-white" href="#contact-us">Contact</a>
                    <a class="nav-link text-white" href="login.php">Login</a>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="max-height: 500px;">
                    <img src="Images/carousal-1.jpg" class="d-block w-100 h-auto" alt="...">
                    <div class="carousel-caption d-none d-md-block text-white">
                        <h5>Agriculture</h5>
                        <p>"Agriculture is our wisest pursuit, because it will in the end contribute most to real wealth, good morals & happiness." </p>
                    </div>
                </div>
                <div class="carousel-item" style="max-height: 500px;">
                    <img src="Images/carousal-2.jpg" class="d-block w-100 h-auto" alt="...">
                    <div class="carousel-caption d-none d-md-block text-white">
                        <h5>Machinery</h5>
                        <p>We plow the fields on the land and scatter the good see but it is fed and watered by God's almighty hand.</p>
                    </div>
                </div>
                <div class="carousel-item" style="max-height: 500px;">
                    <img src="Images/carousal-3.jpg" class="d-block w-100 h-auto" alt="...">
                    <div class="carousel-caption d-none d-md-block text-white">
                        <h5>Fertilizer</h5>
                        <p> A failure is like fertilizer; it stinks to be sure, but it makes things grow faster in the future.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section id="about-us" class="mt-4 p-4 bg-light container-fluid">
        <h3 class="text-center">About Us</h3>
        <!-- <h3 class="text-center">Agricultural Management System</h3>
        <p class="text-wrap">This is an online portal for the <b>farmers</b> for their farming needs.In this website the the
            farmers can sell their yields at a reasonable price.They can buy fertilizers, machineries.
        </p>
        <p class="text-wrap">
            The <b>Sellers</b> can login to the system and sell fertilizers and machineries.
        </p>
        <p class="text-wrap">
            The <b>Users</b> can login to the system and buy crops,fertilizers and machineries.
        </p> -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="min-height: 30vh; max-height:30vh;">
                    <h5 class="card-title">
                        Farmer
                    </h5>
                    <p class="card-text">Farmers can sell their yields at reasonable prices. They can also buy fertilizers, machiners, hire labours.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="min-height: 30vh; max-height:30vh;">
                    <h5 class="card-title">
                        User
                    </h5>
                    <p class="card-text">Users can buy crops, machineries, fertilizers from Agricultural management system.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="min-height: 30vh; max-height:30vh;">
                    <h5 class="card-title">
                        Seller
                    </h5>
                    <p class="card-text">Sellers can sell machineries, fertilizers in Agricultural management system.</p>
                    </div>
                </div>
            </div>
        <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="min-height: 30vh; max-height:30vh;">
                    <h5 class="card-title">
                        Labour
                    </h5>
                    <p class="card-text">Labours can recieve Job hiring request from Farmers.</p>
                    </div>
                </div>
            </div>
            </div>
    </section>
    <section id="rate-us" class="container-fluid mt-3">
    <div class="review">
        <h3 class="text-center">Rating & Review</h3>
        <form action="review.php" method="POST">
        <div class="form-group">
        <label for="formControlRange">Rate Us(0-5):</label>
        <input type="range" class="form-control-range" id="formControlRange" id="points" name="points" min="0" max="5" required>
        </div>
        <div class="form-group">
            <label for="feedback">Review:</label>
            <textarea class="form-control" rows="5" required name="review"></textarea>
        </div>
        <div class="form group">
            <button class="btn btn-primary form-control">Submit</button>
        </div>
        </form>
    </div>
    </section>
    <section id="reviews" class="container-fluid mt-3">
        <h3 class="text-center">Recent Reviews</h3>
        <div class="row">
            <?php 
            include 'connection.php';
            $query = "SELECT * FROM review ORDER BY id DESC LIMIT 6";
            $results = mysqli_query($conn,$query);
            // $data = mysqli_fetch_assoc($results);
            foreach($results as $datas):
            ?>
            <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $datas['username']; ?> </div>
                    <h6 class="card-subtitle ml-4 mb-2 text-muted">Rating: <?php echo $datas['rating'];?>/5</h6>
                    <p class="card-text ml-4">Review: <?php echo $datas['review'];?></p>
                </div>
            </div>
            </div>
            <?php endforeach; ?>
        </h5>

    </section>

    <section id="contact-us" class="mt-4 container-fluid text-center bg-light">
        <h3 class="text-center">Contact Us</h3>
        <p><b>Address:</b> Agricultural Management System<br>Kalamassery P.O<br>Kochi<br>Pin: 682021</p>
        <p><b>Phone:</b> +91-9876543210</p>
        <p><b>E-mail:</b> amskochi@gmail.com</p>
    </section>

    <footer class="bg-dark text-white container-fluid">
        <span>&copy Agricultural Management System</span>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
</body>

</html>