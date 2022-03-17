<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="wrapper">
    <div class="form-group">
        <div class="update-form">
            <form action="" method="POST">
                <h1>Update Profile</h1>
                <input type="text" class="update-form<?php echo (!empty($data['first_name_error'])) ? '-error' : ''; ?>" placeholder="First Name" name="first_name" value="<?php echo (!empty($data['author']->first_name)) ? $data['author']->first_name : ''; ?>">
                <p class="update-form-error"><?php echo (!empty($data['first_name_error'])) ? $data['first_name_error'] : ''; ?></p>
                <input type="text" class="update-form" placeholder="Middle Name [optional]" name="middle_name" value="<?php echo (!empty($data['author']->middle_name)) ? $data['author']->middle_name : ''; ?>">
                
                <input type="text" class="update-form<?php echo (!empty($data['last_name_error'])) ? '-error' : ''; ?>" placeholder="Last Name" name="last_name" value="<?php echo (!empty($data['author']->last_name)) ? $data['author']->last_name : ''; ?>">
                <p class="update-form-error"><?php echo (!empty($data['last_name_error'])) ? $data['last_name_error'] : ''; ?></p>
                <button class="button-primary" type="submit" name="confirm">Confirm</button>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>

