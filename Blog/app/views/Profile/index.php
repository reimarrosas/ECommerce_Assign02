<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="wrapper">
        <div class="profile-name">
            <h1><?php echo $data['author']->first_name .' '; 
                      echo (empty($data['author']->middle_name)) ? '' : ($data['author']->middle_name .' ');
                      echo $data['author']->last_name; 
                    ?></h1>
            <?php if(!empty($_SESSION['author_id'])){ // check if any user has signed in
                if($_SESSION['author_id']==$data['author']->author_id){  // show edit profile and create publication buttons if correct user has signed in
                    echo '<a href="/ECommerce_Assign02/Blog/Profile/updateProfile/'.$data['author']->profile_id.'">[Edit]</a>';
                    echo '<button onclick="location.href=\'/ECommerce_Assign02/Blog/Publication/createPublication\'" name="create">Create Publication</button>';
                };
            } ?>
            
        </div>
        <br>
        <hr>

        <?php
                foreach(array_reverse($data['profile']) as $publication){ // array_reverse() allows to show latest publications at the top

                    if(!empty($_SESSION['author_id'])){ // only check if any user has signed in
                        if($_SESSION['author_id']==$publication->author_id){ // if signed in, show every publications and edit functions
                            echo '<div class="publication-link">
                        <h1><a class="publication-title" href="/ECommerce_Assign02/Blog/Publication/'.$publication->publication_id.'">'. $publication->publication_title .'</a></h1>
                        <p class="publication-info">
                            by <a href="/ECommerce_Assign02/Blog/Profile/index/'.$publication->profile_id.'">'.$data['author']->first_name . " " . $data['author']->last_name .'</a>
                        </p>
                        <p class="publication-info">
                            '. $publication->timestamp .'
                        </p>';
                        
                              echo '<form action="/ECommerce_Assign02/Blog/Publication/deletePublication/'.$publication->publication_id.'">
                                <input class="delete-button" type="submit" value="Delete" /></form>';
                                echo '<form action="/ECommerce_Assign02/Blog/Publication/updatePublication/'.$publication->publication_id.'">
                                   <input class="edit-button" type="submit" value="Edit" />
                                </form> </div>';
                        }
                        else{
                            if($publication->publication_status=="public"){ // only show public publications 
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
                        }
                    }
                    else { // only show public posts if not signed in
                        if($publication->publication_status=="public"){ // only show public publications 
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
                        // if($publication->publication_status=="public"){
                        //     echo '<div class="publication-link">
                        //     <h1><a class="publication-title" href="/ECommerce_Assign02/Blog/Publication/'.$publication->publication_id.'">'. $publication->publication_title .'</a></h1>
                        //     <p class="publication-info">
                        //         by <a href="/ECommerce_Assign02/Blog/Profile/index/'.$publication->profile_id.'">'.$data['author']->first_name . " " . $data['author']->last_name .'</a>
                        //     </p>
                        //     <p class="publication-info">
                        //         '. $publication->timestamp .'
                        //     </p></div>';
                        // }
                            
                        

                    }
                    
                }
                ;

            
        ?>

        
</div>    
    
<?php require APPROOT . '/views/includes/footer.php'; ?>