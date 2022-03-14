<?php require APPROOT . '/views/includes/header.php'; ?>

<main class="container w-75">
  <h1 class="mt-5 h2 font-weight-bold"><?= $data['process'] ?> Comment</h1>
  <?php if (isset($data['error'])): ?>
    <div class="alert alert-danger">
      <?= $data['error'] ?>
    </div>
  <?php endif; ?>
  <form action="" method="POST" class="form mt-3">
    <div class="form-group">
      <textarea placeholder="Comment Text..." name="comment_text" id="comment_text" cols="30" rows="3" class="form-control" required></textarea>
    </div>
    <div class="form-group text-center">
      <button type="submit" name="create_comment" class="btn btn-primary">Create Comment</button>
    </div>
  </form>
</main>

<?php require APPROOT . '/views/includes/footer.php'; ?>