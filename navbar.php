 <nav class="navbar navbar-expand-sm">
      <!-- Brand/logo -->
        <a class="navbar-brand" href="#"><img src="images/CVpro_Logo.png" class="img-fluid" width='60' alt="" title=""></a>
      
      <!-- Links -->
      <ul class="navbar-nav ml-auto list-group-horizontal">
        <li class="">
            <?php
				if(isset($_SESSION['email']) and in_array($_SESSION['email'],$admin))
				{
					?>
					<a href="deep_search.php"><button class="btn btn-secondary">Search </button></a>		
					<?php
				}
				?>	
            <div class="btn-group">
                <button type="button" class="btn btn-secondary">
                  <?php echo htmlentities($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?><i class='fa fa-user-circle-o' style="font-size:20px;"></i>
                </button>
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['userid']; ?>">Profile</a>
                  <a class="dropdown-item" href="sign-out.php?id=<?php echo $_SESSION['userid']; ?>">Sign out</a>
                </div>
              </div>
        </li>
      </ul>
    </nav>
    
      