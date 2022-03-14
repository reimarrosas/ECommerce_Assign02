<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="wrapper">
        <div class="form-group">
                <div class="update-form">
                    <form action="" method="POST">
                        <h1>Create Comment</h1>
                        <?php if (isset($data['error'])): ?>
                            <div class="alert alert-danger">
                                <?= $data['error'] ?>
                            </div>
                        <?php endif; ?>
                        <textarea class="update-form-comment" id="pub_comment" maxlength="200" placeholder="Comment here...[Limit:200 Characters]" name="pub_comment" cols="30" rows="10"></textarea>
                        <button class="button-primary" type="submit" name="confirm">Confirm</button>
                    </form>
                </div>
        </div>
    </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>