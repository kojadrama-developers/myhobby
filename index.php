<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Start Bootstrap-->
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--End Bootstrap-->

    <!--My css file-->
    <link rel="stylesheet" href="css/custom.css">



    <title>MyHobby</title>
</head>
<body>

<!--Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">LOGO<!--<img src="img/logo/logo.png">--></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Contact
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#SignInModal">Sign in</button>
            </li>
           <!-- <li class="nav-item">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#RegModal">Registration</button>
            </li>-->

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<!--End Navigation-->

<!--Carousel-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/knjiga.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <button type="button" class="btn btn-success btn-lg">More information</button>

            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/foto.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <button type="button" class="btn btn-success btn-lg">Get started!</button>

            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/mapa.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#RegModal">Registration</button>
                <p id="aboutReg">Registration and  </p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--End Carousel-->

<!--Sign In Modal-->
<div class="modal fade" id="SignInModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" >
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <br />
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Sign In Modal-->

<!--Registration Modal-->
<div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputPassword1">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="FirstName">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">MIddle Name</label>
                        <input type="text" class="form-control" id="MiddleName" placeholder="MIddleName">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="LastName">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="ConfirmPassword">
                    </div>
                    <div class="form-group">
                        <label class="example-date-input">Date of birth</label>
                        <input type="date" class="form-control" id="date">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">Sex</label><br/>
                        <input type="radio" class="form-check-input" id="radio1" name="radio" value="Male">Male<br/>
                        <input type="radio" class="form-check-input" id="radio2" name="radio" value="Female">Female
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Registration Modal-->










<!--Start Bootstrap-->
<!--JS, Propper.js, and Jquery-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--End Bootstrap-->
</body>
</html>