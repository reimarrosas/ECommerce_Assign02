<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="wrapper">
        <div class="form-group">
                <div class="update-form">
                    <form action="">
                        <h1>Create Publication</h1>
                        <input type="text" class="update-form-error" placeholder="Publication Title" name="pub_title">
                        <p class="update-form-error">Please enter a Title.</p>
                        <textarea name="pub_text" id="pub_text" placeholder="Publication Text[Limit:1000 Characters]" cols="30" rows="10"></textarea>
                        <label>
                            <input type="checkbox" name="private_check">Private?
                        </label>
                        <button class="button-primary" type="submit" name="confirm">Confirm</button>
                    </form>
                </div>
        </div>
    </div>
    
        
            
        
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>