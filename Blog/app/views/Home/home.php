<?php require APPROOT . '/views/includes/header.php'; ?>
    
            
<?php
    foreach(array_reverse($data['publications']) as $publication){ // array_reverse() allows to show latest publications at the top
        if($publication->publication_status=="public"){ // only show public publications on home page
            echo '<div class= "wrapper">';
            echo '<div class="publication-link">';
            echo '<h1><a class="publication-title" href="/ECommerce_Assign02/Blog/Publication/'.$publication->publication_id.'"> ';
            echo $publication->publication_title . '</a></h1>';
            echo '<p class="publication-info">by <a href="/ECommerce_Assign02/Blog/Profile/index/'.$publication->profile_id.'">';
            echo $publication->first_name . ' '. $publication->last_name . '</a>';
            echo '</p>';
            echo '<p class="publication-info">'.$publication->timestamp ;
            echo '</p>';
            echo '</div> </div>';
        }
    };
?>


<?php require APPROOT . '/views/includes/footer.php'; ?>