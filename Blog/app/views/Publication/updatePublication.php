<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="wrapper">
        <div class="form-group">
                <div class="update-form">
                    <form action="" method="POST">
                        <h1>Update Publication</h1>
                        <input type="text" class="update-form<?php echo (!empty($data['publication_title_error'])) ? '-error' : '';
                                                                   echo (!empty($data['publication_title_len_error'])) ? '-error' : ''; ?>" placeholder="Publication Title" name="publication_title" value="<?php echo (!empty($data['publication']->publication_title)) ? $data['publication']->publication_title : ''; ?>">
                        <p class="update-form-error"><?php echo (!empty($data['publication_title_error'])) ? $data['publication_title_error'] : '';
                                                           echo (!empty($data['publication_title_len_error'])) ? $data['publication_title_len_error'] : ''; ?>
                        </p>
                        <textarea class="update-form<?php echo (!empty($data['publication_text_error'])) ? '-error' : '';echo (!empty($data['publication_text_len_error'])) ? '-error' : ''; ?>" name="publication_text" id="publication_text" placeholder="Publication Text[Limit:1000 Characters]" cols="30" rows="10"><?php echo (!empty($data['publication']->publication_text)) ? $data['publication']->publication_text : ''; ?></textarea>
                        <p class="update-form-error"><?php echo (!empty($data['publication_text_error'])) ? $data['publication_text_error'] : ''; 
                                                           echo (!empty($data['publication_text_len_error'])) ? $data['publication_text_len_error'] : '';?>
                        </p>
                        <label>
                            <input type="checkbox" name="private_check" <?php if(($data['publication']->publication_status)=='private'){echo 'checked';};?>>Private Post?
                        </label>
                        <button class="button-primary" type="submit" name="confirm">Confirm</button>
                    </form>
                </div>
        </div>
    </div>
    
        
<?php require APPROOT . '/views/includes/footer.php'; ?>