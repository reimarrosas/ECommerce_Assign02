<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="wrapper">
    <div class="form-group">
        <div class="update-form">
            <form action="">
                <h1>Update Profile</h1>
                <input type="text" class="update-form" placeholder="First Name" name="first_name">
                <input type="text" class="update-form" placeholder="Middle Name [optional]" name="middle_name">
                <input type="text" class="update-form-error" placeholder="Last Name" name="last_name">
                <p class="update-form-error">Please enter Last Name.</p>
                <button class="button-primary" type="submit" name="confirm">Confirm</button>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>