<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="form-container">
    <form action="" method="POST">
        <h1 class="form-title">Login</h1>
        <div class="form-group<?php echo (!empty($data['username_error'])) ? '-error' : ''; ?>">
            <input type="text" name="username" placeholder="Username">
            <p><?php echo (!empty($data['username_error'])) ? $data['username_error'] : ''; ?></p>
        </div>
        <div class="form-group<?php echo (!empty($data['password_error'])) ? '-error' : ''; ?>">
            <input type="password" name="password" placeholder="Password">
            <p><?php echo (!empty($data['password_error'])) ? $data['password_error'] : ''; ?></p>
        </div>

        <button class="button-primary" name="login" type="submit">SIGN IN</button>

        <p class="form-text">Don't have an account?
            <br>
            <a class="form-link" href="/ECommerce_Assign02/Blog/Login/register">SIGN UP NOW!</a>
        </p>
    </form>
</div>



</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>