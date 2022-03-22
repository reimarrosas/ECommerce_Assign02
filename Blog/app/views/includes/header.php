<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css?<?php echo time(); ?>">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <title><?php echo SITENAME; ?></title>
</head>

<body>

  <div class="nav-bar">
    <div class="wrapper">
      <nav>
        <div class="logo">
          <a href="/ECommerce_Assign02/Blog/Home">Blog.IO</a>
        </div>
        
        <form class="form-inline" action="/ECommerce_Assign02/Blog/Search/getResultByTitle/" method="POST">
          <div class="search-bar">
            
            <input type="text" name="search_text" placeholder="Search Publication...">
            <select name="search_type" <?php ?>>
              <option value="Title" selected>By Tilte</option>
              <option value="Content">By Content</option>
              <option value="Latest">Latest</option>
            </select>
            <button type="submit" name="search"> Search</button>
          </div>
        </form>
        <div class="nav-items">
          <ul>
            <?php

            if (isLoggedIn()) {
              echo '<li><a href="/ECommerce_Assign02/Blog/Profile/myProfile" name="profile"> Profile</a></li>
              <li><a href="/ECommerce_Assign02/Blog/Login/logout" name="logout"> Logout</a></li>';
            } 
            else {

              echo '<li><a href="/ECommerce_Assign02/Blog/Login/register" name="signup"> Sign Up</a></li>
                  <li><a href="/ECommerce_Assign02/Blog/Login/index" name="signin"> Login</a></li>';
            }
            ?>
          </ul>
        </div>
      </nav>
    </div>
  </div>




</body>
