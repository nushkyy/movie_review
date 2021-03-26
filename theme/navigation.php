<body>

	<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <div class="container">
	    <?php
				if(isset($_SESSION['admin_data']['logged'])){?>
					<a href="admin_dashboard.php" class="navbar-brand"><?php echo $web_title;?></a>
				<?php }else{?>
				        <a href="index.php" class="navbar-brand"><?php echo $web_title;?></a>

				
				<?php } ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
          
          </ul>

          <ul class="nav navbar-nav ml-auto">
		  <?php
				if(!isset($_SESSION['user_data']['logged'])){?>
					<li class="nav-item">
					  <a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="register.php">Register</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="admin_panel.php">Admin</a>
					</li>
			<?php
				}else{
			?>
					<li class="nav-item">
					  <a class="nav-link" style="text-align:center;" href="#">Welcome <?php echo htmlentities($_SESSION['user_data']['username']);?> </a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" style="text-align:center;" href="logout.php">(Logout)</a>
					</li>
			
			<?php
				}
			?>
          </ul>

        </div>
      </div>
    </div>
	
	<div style="clear:both;"><br/><br/><br/><br/></div>

