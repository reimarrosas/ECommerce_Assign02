<?php

class publicationModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function markAsOpposite($publicationId, $profileId)
    {
        $this->query('SELECT * FROM publications WHERE publication_id = :publicationId AND profile_id = :profileId');
        $this->bind('publicationId', $publicationId);
        $this->bind('profileId', $profileId);
        $publication = $this->getSingle();
        if (isset($publication)) {
            $this->query('UPDATE publications SET publication_status = :publicationStatus WHERE publication_id = :publicationId AND profile_id = :profileId');
            $this->bind('publicationStatus', $publication->publication_status == 'private' ? 'public' : 'private');
            $this->bind('publicationId', $publicationId);
            $this->bind('profileId', $profileId);
            return $this->execute();
        }

        return false;
    }

    public function deletePublication($publicationId, $profileId)
    {
        $this->query('DELETE FROM publications WHERE publication_id = :publicationId AND profile_id = :profileId');
        $this->bind('publicationId', $publicationId);
        $this->bind('profileId', $profileId);
        return $this->execute();
    }
}
