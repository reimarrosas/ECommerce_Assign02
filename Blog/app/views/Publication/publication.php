<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="wrapper">
        <div class="publication-container">
            <h1><a class="publication-title" href="#">Publication Title Link</a></h1>
            <p class="publication-info">
                by <a href="#">John Smith</a>
            </p>
            <p class="publication-info">
                February 28th, 2022
            </p>

            <p class="publication-text">
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. 
                Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
                commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt 
                condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. 
                Donec non enim in turpis pulvinar facilisis. Ut felis. 
                Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. 
                Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
            </p>
        </div>
    </div>


    <div class="wrapper">
        <div class="publication-comment">
            <h1>Comments</h1>
            <button class="button-primary">Create Comment</button>
            <div class="comment-container">
                <h3>Jane Doe</h3>
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