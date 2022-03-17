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

        
    }
?>