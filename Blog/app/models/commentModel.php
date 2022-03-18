<?php

class commentModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getComment($commentId, $profileId)
    {
        $this->query('SELECT * FROM publication_comments WHERE publication_comment_id = :commentId AND profile_id = :profileId');
        $this->bind('commentId', $commentId);
        $this->bind('profileId', $profileId);
        return $this->getSingle();
    }

    public function createComment($publicationId, $profileId, $commentText)
    {
        $this->query('INSERT INTO publication_comments (publication_id, profile_id, comment) VALUES (:pubId, :profId, :comment)');
        $this->bind('pubId', $publicationId);
        $this->bind('profId', $profileId);
        $this->bind('comment', $commentText);
        return $this->execute();
    }

    public function updateComment($commentId, $profileId, $comment)
    {
        $this->query('UPDATE publication_comments SET comment = :comment WHERE publication_comment_id = :commentId AND profile_id = :profileId');
        $this->bind('comment', $comment);
        $this->bind('commentId', $commentId);
        $this->bind('profileId', $profileId);
        return $this->execute();
    }

    public function deleteComment($commentId, $profileId)
    {
        $this->query('DELETE FROM publication_comments WHERE publication_comment_id = :commentId AND profile_id = :profileId');
        $this->bind('commentId', $commentId);
        $this->bind('profileId', $profileId);
        return $this->execute();
    }
}