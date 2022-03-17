<?php
    class publicationModel{
        public function __construct(){
            $this->db = new Model;
        }

        public function getEveryPublications(){
            $this->db->query("SELECT * FROM publications 
                              INNER JOIN profiles 
                              ON publications.profile_id=profiles.profile_id");

            return $this->db->getResultSet();
        }
        public function getAllPublications(){
            $this->db->query("SELECT * FROM publications");
            return $this->db->getResultSet();
        }

        public function getPublication($publication_id){
            $this->db->query("SELECT * FROM publications 
                             INNER JOIN profiles 
                             ON publications.profile_id=profiles.profile_id 
                             WHERE publication_id = :publication_id");

            $this->db->bind(':publication_id',$publication_id);
            return $this->db->getSingle();
        }

        public function getProfilePublications($profile){
            $this->db->query("SELECT * FROM publications 
                             INNER JOIN profiles 
                             ON publications.profile_id=profiles.profile_id
                             WHERE publications.profile_id = :profile_id");
            $this->db->bind(':profile_id',$profile->profile_id);
            return $this->db->getResultSet();
        }

        public function createPublication($data,$profile){
            $this->db->query("INSERT INTO publications (profile_id, publication_title, publication_text, publication_status) VALUES (:profile_id, :publication_title, :publication_text, :publication_status)");
            $this->db->bind(':profile_id', $profile->profile_id);
            $this->db->bind(':publication_title', $data['publication_title']);
            $this->db->bind(':publication_text', $data['publication_text']);
            // $this->db->bind(':timestamp',$data['timestamp']);
            $this->db->bind(':publication_status',$data['publication_status']);
            

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function updatePublication($data){
            $this->db->query("UPDATE publications SET publication_title=:publication_title, publication_text=:publication_text, publication_status=:publication_status WHERE publication_id=:publication_id");
            $this->db->bind(':publication_title', $data['publication_title']);
            $this->db->bind(':publication_text', $data['publication_text']);
            // $this->db->bind(':timestamp',$data['timestamp']);
            $this->db->bind(':publication_status',$data['publication_status']);
            $this->db->bind(':publication_id',$data['publication_id']);
            

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deletePublication($publication_id){
            $this->db->query('DELETE FROM publications WHERE publication_id=:publication_id');
            $this->db->bind(':publication_id',$publication_id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
