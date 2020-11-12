<?php include_once 'header.php'; ?>
    <!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">Mirkomilboy
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="float:right;" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <?php
                        if(isset($_SESSION['email'])) {
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">Profile</a></li>";
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"includes/logout.inc.php\">Log out</a></li>";
                        } else {
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"signup.php\">Sign Up</a></li>";
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"login.php\">Login</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </nav>
        <?php  if (isset($_SESSION['email'])) : ?> 
            <p>Welcome  
                <strong><?php echo $_SESSION['email']; ?></strong> 
            </p> 
        <?php endif; ?>
    </div>
    
<?php include_once 'footer.php'; ?>