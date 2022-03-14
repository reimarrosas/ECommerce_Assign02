<?php
    class loginModel{

        public function __construct(){
            $this->db = new Model;
        }

        public function getAuthor($username){
            $this->db->query("SELECT * FROM authors WHERE username = :username");
            $this->db->bind(":username",$username);
            
            return $this->db->getSingle();
        }

        public function getProfile($author){
            $this->db->query("SELECT * FROM profiles WHERE author_id = :author_id");
            $this->db->bind(":author_id",$author["author_id"]);

            return $this->db->getSingle();
        }

        public function createAuthor($data){
            $this->db->query("INSERT INTO authors (username,password_hash) VALUES (:username, :password_hash)");
            $this->db->bind(":username",$data["username"]);
            $this->db->bind(":password_hash",$data["password_hash"]);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
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
    }
?>