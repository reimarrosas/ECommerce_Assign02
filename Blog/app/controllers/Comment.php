<?php

class Comment extends Controller
{
    public function __construct()
    {
        $this->commentModel = $this->model('commentModel');
    }

    // DELETE COMMENT
    public function deleteComment($commentId)
    {
        $profileId = $_SESSION['profile_id'];
        if (!$this->isAuthorized($profileId)) {
            return;
        } else {
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
