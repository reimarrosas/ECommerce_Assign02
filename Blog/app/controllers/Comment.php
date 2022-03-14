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
        } else if (!isset($_POST['confirm'])) {
            $this->view('Comment/createComment', $data);
        } else {
            $profileId = $_SESSION['profile_id'];

            $comment = $_POST['pub_comment'];
            $sanitized_comment = filter_var($comment, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (strlen($sanitized_comment) < 1) {
                $data['error'] = 'Error: Comment does not allow special characters!';
                $this->view('Comment/createComment', $data);
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

    // UPDATE COMMENT
    public function updateComment($publicationId, $commentId)
    {
        $data = ['process' => 'Update'];
        if ($this->isAuthorized()) {
            $profileId = $_SESSION['profile_id'];
            if (!isset($_POST['confirm'])) {
                $pub_comment = $this->commentModel->getComment($commentId, $profileId);
                if (isset($pub_comment)) {
                    $data['pub_comment'] = $pub_comment;
                    $this->view('Comment/updateComment', $data);
                } else {
                    echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '/publication/' . $publicationId . '" />';
                }
            } else {
                $comment = $_POST['pub_comment'];
                $sanitized_comment = filter_var($comment, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if (strlen($sanitized_comment) < 1) {
                    $data['error'] = 'Error: Comment does not allow special characters';
                    $this->view('Comment/updateComment', $data);
                } else {
                    $isSucc = $this->commentModel->updateComment($commentId, $profileId);

                    if ($isSucc) {
                        echo '<meta http-equiv="refresh" content="0;url=' . URLROOT . '/publication/' . $publicationId . '" />';
                    } else {
                        echo '<h1 class="text-danger">Internal Server Error: Something Broke!</h1>';
                        echo '<meta http-equiv="refresh" content="2;url=' . URLROOT . '/publication/' . $publicationId . '" />';
                    }
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
