<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#"><img width="80" src="img/logo/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <?php
            session_start();
            if(isset($_SESSION['user_session']))
            {
                echo "<a class='btn btn-danger' href='user/logout.php'>Logout</a>";
                echo "<p class=''> Hello: {$_SESSION['user_session']} </p>";
            }
            else {
                ?>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#SignInModal">Sign in</button>
                </li>
                <?php
            }
            ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>