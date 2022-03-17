<?php
    class profileModel{

        public function __construct(){
            $this->db = new Model;
        }

        public function getProfile($profile_id){
            $this->db->query("SELECT * FROM profiles WHERE profile_id = :profile_id");
            $this->db->bind(":profile_id",$profile_id);

            return $this->db->getSingle();
        }

        public function getMyProfile($author){
            $this->db->query("SELECT * FROM profiles WHERE author_id = :author_id");
            $this->db->bind(":author_id",$author['author_id']);

            return $this->db->getSingle();
        }

        public function getAllProfiles(){
            $this->db->query("SELECT * FROM profiles");
            return $this->db->getResultSet();
        }

        public function createProfile($data,$author){
            $this->db->query("INSERT INTO profiles (author_id, first_name, middle_name, last_name) VALUES (:author_id, :first_name, :middle_name, :last_name)");
            $this->db->bind(":author_id", $author["author_id"]);
            $this->db->bind(":first_name",$data["first_name"]);
            $this->db->bind(":middle_name",$data["middle_name"]);
            $this->db->bind(":last_name",$data["last_name"]);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function updateProfile($data,$author){
            $this->db->query("UPDATE profiles SET first_name=:first_name, middle_name=:middle_name, last_name=:last_name WHERE author_id=:author_id");
            $this->db->bind(":author_id", $author["author_id"]);
            $this->db->bind(":first_name",$data["first_name"]);
            $this->db->bind(":middle_name",$data["middle_name"]);
            $this->db->bind(":last_name",$data["last_name"]);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }
    }
?>