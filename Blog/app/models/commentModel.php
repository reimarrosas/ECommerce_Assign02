<?php

class commentModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllComments($publicationId)
    {
        $this->query('SELECT publication_comment_id, comment, pc.profile_id as profile_id, publication_id, timestamp, first_name, middle_name, last_name FROM publication_comments AS pc JOIN profiles AS p ON pc.profile_id = p.profile_id WHERE publication_id = :publicationId');
        $this->bind('publicationId', $publicationId);
        return $this->getResultSet();
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
