<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="wrapper">
        <div class="form-group">
                <div class="update-form">
                    <form action="" method="POST">
                        <h1>Create Publication</h1>
                        <input type="text" class="update-form<?php echo (!empty($data['publication_title_error'])) ? '-error' : ''; ?>" placeholder="Publication Title" name="publication_title">
                        <p class="update-form-error"><?php echo (!empty($data['publication_title_error'])) ? $data['publication_title_error'] : ''; ?></p>
                        <textarea class="update-form<?php echo (!empty($data['publication_text_error'])) ? '-error' : ''; ?>" name="publication_text" id="publication_text" placeholder="Publication Text[Limit:1000 Characters]" cols="30" rows="10"></textarea>
                        <p class="update-form-error"><?php echo (!empty($data['publication_text_error'])) ? $data['publication_text_error'] : ''; ?></p>
                        <label>
                            <input type="checkbox" name="private_check">Private?
                        </label>
                        <button class="button-primary" type="submit" name="confirm">Confirm</button>
                    </form>
                </div>
        </div>
    </div>
    
        
<?php require APPROOT . '/views/includes/footer.php'; ?>