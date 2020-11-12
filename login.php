<?php include_once 'header.php'; ?>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card_login">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="img/logo.jpg" class="brand_logo" alt="logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="includes/login.inc.php" method="post">
                        <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == "emptyinput") {
                                    echo "<p id='register_text'>Fill in all fields!</p>";
                                } 
                                else if ($_GET['error'] == "wronglogin") {
                                    echo "<p id='register_text'>Incorrect email or password!</p>";
                                }  
                            }
                        ?>
                        <!-- Email -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control input_user required" placeholder="email">
                        </div>
                        <!-- Password -->
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass required" placeholder="password">
                        </div>
                        <!-- Remember me -->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
                                <label for="customControlInline" class="custom-control-label">Remember me</label>
                            </div>
                        </div>
                        <!-- Login -->
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="submit" class="btn login_btn">Login</button>
                        </div>
                    </form>
                </div>
                <!-- Rediricting to sign up page and forgot password -->
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="signup.php" class="ml-2">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'footer.php'; ?>