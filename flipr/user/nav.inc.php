<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="posts.php">
                  <span data-feather="file"></span>
                  All lists
                </a>
              </li>
              <?php 
			  if(isset($_SESSION['user_role'])){
				  if($_SESSION['user_role']=="admin"){
					  ?>
					  
					  <!--ONLY ADMIN LINKS HERE-->
				<li class="nav-item">
                <a class="nav-link" href="mytodos.php">
                  <span data-feather="file"></span>
                  my todos
                </a>
				</li>
			
				<!-- <li class="nav-item">
                <a class="nav-link" href="settings.php">
                  <span data-feather="file"></span>
                  Settings
                </a>
				</li> -->
					  <?php
				  }
			  }
			  ?>
            </ul>

            
          </div>
        </nav>