<?php
    class searchModel{
        public function __construct(){
            $this->db = new Model;
        }

        public function getResultByTitle($title){
            $this->db->query("SELECT * 
                                FROM publications 
                                WHERE publication_title = :publication_title
                            ");
            $this->db->bind(':publication_title', $title);
            return $this->db->getResultSet();
        }

        public function getResultByContent($content){
            $this->db->query("SELECT *
                                FROM   publications
                                WHERE  ' ' + publication_text + ' ' LIKE '% :content %'
                            ");
            $this->db->bind(':content', $content);
            return $this->db->getResultSet();                
        }

        public function getResultByLatest(){
            $this->db->query("SELECT * FROM publications
                                WHERE publication_status = 'public'
                                ORDER BY timestamp");
            return $this->db->getResultSet();
        }
    }
?>
