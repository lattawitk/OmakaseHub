<!--<body>
  <nav class="navbar navbar-dark bg-dark" style="font-family: 'Mitr';" >
      <div class="container-fluid" >
        <div class="navbar-header">
          <a class="navbar-brand" style="color:#D4B22C" href="#"> OmakaseHub </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" style="color:#D4B22C"><span class="fas fa-sign-in-alt"></span> Sign In </a></li>
        </ul>

      </div>
    </nav>
</body>-->

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="font-family: 'Mitr';">
      <div class="container-fluid" >
        <div class="navbar-header">
          <a class="navbar-brand" style="color:#D4B22C" href="index.php"> OmakaseHub </a>
        </div>
        <?php
          session_start();
          if(isset($_SESSION["cus_id"]))
          {
            echo'
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav w-100">
                    <li class="nav-item dropdown ml-auto">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#D4B22C">';
                        echo $_SESSION["username"];
                        echo'</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="index.php"> Home </a>
                            <a class="dropdown-item" href="history.php"> History </a>
                            <a class="dropdown-item" href="signOut.php"> Sign Out </a>
                        </div>
                    </li>
                </ul>
            </div>
            ';
          }
          else
          {
            echo'
             <ul class="nav navbar-nav navbar-right">
              <li><a href="signin.php" style="color:#D4B22C"><span class="fas fa-sign-in-alt"></span> Sign In </a></li>
            </ul>
            ';  
          }
        
        ?>
        
        
      </div>
      
  </nav>
</body>
