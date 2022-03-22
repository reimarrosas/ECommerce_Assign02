<?php require APPROOT . '/views/includes/header.php'; ?>
    <h1 class="container">Search View</h1>
    <div class="jumbotron container">
  
 <?php
    foreach($data as $publication){
        if($publication->publication_status=="public"){
            echo '<div class= "wrapper">';
            echo '<div class="publication-link">';
            echo '<h1><a class="publication-title" href="/ECommerce_Assign02/Blog/Publication/'.$publication->publication_id.'"> ';
            echo $publication->publication_title . '</a></h1>';
            
            echo '<p class="publication-info">'.$publication->timestamp ;
            echo '</p>';
            echo '</div> </div>';
        }
    };
?>
        
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
