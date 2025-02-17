
<header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.ph">
            <span>
              Care
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="doctors.php">Doctors</a>
              </li>
           
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hospital
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="Hospitals in karachi.php">Hospital in Karachi</a>
                  <a class="dropdown-item" href="Hospitals in Lahore .php">Hospital in Lahore</a>
                  <a class="dropdown-item" href="Hospitals in isalamabad.php">Hospital in Islamabad</a>
              </li>
            
              <li class="nav-item">
                <a class="nav-link" href="../index.php#Departments">Departments</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="health blogs.php">Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
            
              
        
              <li class="nav-item dropdown" style="color: white;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               
                Profile

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php"> <?php echo $_SESSION['user_name']?></a>
                <a class="dropdown-item" href="logout.php">Log Out</a>
                  
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Singup
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="Singup.php">Sign in </a>
                  <a class="dropdown-item" href="doctorsing.php">Doctor Sign in </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Login
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="Login.php">Ures Login</a>
                  <a class="dropdown-item" href="Doctor_Panel Login.php">Doctor Login</a>
              </li>

        
              
            </ul>
          </div>
        </nav>
      </div>
    </header>