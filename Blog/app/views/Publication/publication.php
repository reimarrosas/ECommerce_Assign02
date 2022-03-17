<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="wrapper">
        <div class="publication-container">
            <h1><a class="publication-title" href="/ECommerce_Assign02/Blog/Publication/<?php echo $data['publication']->publication_id?>"><?php echo $data['publication']->publication_title?></a></h1>
            <p class="publication-info">
                by <a href="/ECommerce_Assign02/Blog/Profile/index/<?php echo $data['publication']->profile_id?>"><?php echo $data['profile']->first_name. ' '. $data['profile']->last_name;?></a>
            </p>
            <p class="publication-info">
            <?php echo $data['publication']->timestamp?>
            </p>

            <p class="publication-text">;
            <?php echo $data['publication']->publication_text?>
            </p>
            <?php 
            if(!empty($_SESSION['author_id'])){
                if($_SESSION['author_id']==$data['publication']->author_id){
                    echo '<form action="/ECommerce_Assign02/Blog/Publication/deletePublication/'.$data['publication']->publication_id.'">
                    <input class="delete-button" type="submit" value="Delete Post" /></form>';
                    echo '<form action="/ECommerce_Assign02/Blog/Publication/updatePublication/'.$data['publication']->publication_id.'">
                    <input class="edit-button" type="submit" value="Edit Post" />
                    </form> </div>';
                }
            }
                
            ?>
        </div>
    </div>

    <br><br>

    <div class="wrapper">
        <div class="publication-comment">
            <h1>Comments</h1>
            <button class="button-primary">Create Comment</button>
            <div class="comment-container">
                <h3>Jane Doe [Placeholder]</h3>
                <h6>February 28th 2022 14h23</h6>
                <p>
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. 
                </p>
            </div>

            <div class="comment-container">
                <h3>John Smith</h3>
                <h6>February 28th 2022 16h37</h6>
                <p>
                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. 
                </p>
                <button class="delete-button">Delete</button>
                <button class="edit-button">Edit</button>
            </div>
        </div>
    </div>
    
        
            
        
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>