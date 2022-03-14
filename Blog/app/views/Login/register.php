<?php require APPROOT . '/views/includes/header.php'; ?>
    
    
        
            
        
<div class="form-container">
        <form action="" method="POST">
            <h1 class="form-title">Sign Up</h1>
            <div class="form-group<?php echo (!empty($data['username_error'])) ? '-error' : ''; ?>">
                <input type="text" name="username" placeholder="Username">
                <p><?php echo (!empty($data['username_error'])) ? $data['username_error'] : ''; ?></p>
            </div>
            <div class="form-group<?php echo (!empty($data['password_len_error'])) ? '-error' : ''; ?>">
                <input type="password" name="password" placeholder="Password">
                <p><?php echo (!empty($data['password_len_error'])) ? $data['password_len_error'] : ''; ?></p>
            </div>

            <div class="form-group<?php echo (!empty($data['password_match_error'])) ? '-error' : ''; ?>">
                <input type="password" name="verify_password" placeholder="Re-type Password">
                <p><?php echo (!empty($data['password_len_error'])) ? $data['password_match_error'] : ''; ?></p>
            </div>
                
            <button class="button-primary" name="register" type="submit">REGISTER</button>
            
            
            <p class="form-text">Already have an account?
            <br>
            <a class="form-link" href="/ECommerce_Assign02/Blog/Login/index">LOGIN HERE!</a>
        </p>

        </form>
    </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>