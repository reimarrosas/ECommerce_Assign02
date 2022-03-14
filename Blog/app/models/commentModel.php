<?php

class commentModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function deleteComment($commentId, $profileId)
    {
        $this->query('DELETE FROM publication_comments WHERE publication_comment_id = :commentId AND profile_id = :profileId');
        $this->bind('commentId', $commentId);
        $this->bind('profileId', $profileId);
        return $this->execute();
    }
}