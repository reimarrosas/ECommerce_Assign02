<?php
class Comment extends Controller
{
    public function __construct()
    {
        $this->commentModel = $this->model('commentModel');
    }

    public function index()
    {
        echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '" />';
    }

    // CREATE COMMENT
    public function createComment($publicationId)
    {
        $data = ['process' => 'Create'];
        if (!$this->isAuthorized()) {
            return;
        } else if (!isset($_POST['create_comment'])) {
            $this->view('Comment/populateComment', $data);
        } else {
            $profileId = $_SESSION['profile_id'];

            $comment = $_POST['comment_text'];
            $sanitized_comment = filter_var($comment, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (strlen($sanitized_comment) < 1) {
                $data['error'] = 'Error: Comment does not allow special characters!';
                $this->view('Comment/populateComment', $data);
            } else {
                $isSucc = $this->commentModel->createComment($publicationId, $profileId, $sanitized_comment);
                echo $isSucc;
                if ($isSucc) {
                    echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '/publication/' . $publicationId . '" />';
                } else {
                    echo '<h1 class="text-danger">Internal Server Error: Something Broke!</h1>';
                    echo '<meta http-equiv="refresh" content="2;url=' . URLROOT . '/publication/' . $publicationId . '" />';
                }
            }
        }
    }

    // DELETE COMMENT
    public function deleteComment($commentId)
    {
        if (!$this->isAuthorized()) {
            return;
        } else {
            $profileId = $_SESSION['profile_id'];
            $isSucc = $this->commentModel->deleteComment($commentId, $profileId);

            if ($isSucc) {
                echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERRER'] . '" />';
            } else {
                echo '<h1 class="text-danger">Internal Server Error: Something Broke!</h1>';
                echo '<meta http-equiv="refresh" content="2;url=' . $_SERVER['HTTP_REFERRER'] . '" />';
            }
        }
    }
}
