<?php

    session_start();

    function isLoggedIn(){
        if(isset($_SESSION['author_id'])){
          return true;
        } else {
          return false;
        }
      }

?>