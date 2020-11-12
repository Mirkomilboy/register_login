<?php include_once 'header.php'; ?>
    
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="img/logo.jpg" class="brand_logo" alt="logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="includes/signup.inc.php" method="post">
                        <!-- <h5 id="register_text">Register here</h5> -->
                        <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == "emptyinput") {
                                    echo "<p id='register_text'>Fill in all fields!</p>";
                                } 
                                else if ($_GET['error'] == "invalidusername") {
                                    echo "<p id='register_text'>Insert proper username!</p>";
                                }
                                else if ($_GET['error'] == "invalidemail") {
                                    echo "<p id='register_text'>Insert valid email!</p>";
                                }
                                else if ($_GET['error'] == "passwordsdontmatch") {
                                    echo "<p id='register_text'>Passwords should match!</p>";
                                }
                                else if ($_GET['error'] == "stmtfailed") {
                                    echo "<p id='register_text'>Something went wrong, Try again!</p>";
                                }
                                else if ($_GET['error'] == "emailnametaken") {
                                    echo "<p id='register_text'>Email already used!</p>";
                                }
                                else if ($_GET['error'] == "none") {
                                    echo "<p id='register_text'>You have successfully signed up!</p>";
                                }
                            }
                        ?>
                        <!-- Username -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control input_user required" placeholder="username">
                        </div>
                        <!-- Email -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control input_user required" placeholder="email">
                        </div>
                        <!-- Password -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" name="password_1" class="form-control input_pass required" placeholder="password">
                        </div>
                        <!-- Confirm Password -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" name="password_2" class="form-control input_pass required" placeholder="confirm password">
                        </div>
                        </div>
                        <!-- Sign Up -->
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="submit" class="btn signup_btn">Sign Up</button>
                        </div>
                    </form>
                    <!-- redirecting to login page -->
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            Have an account already? <a href="login.php" class="ml-2">Login</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

<?php include_once 'footer.php'; ?>