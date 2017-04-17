
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/index.php"><img src="/ISU_PD_LOGO.png" width="20px"></a>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/search.php">Search All Records</a>
      </li>
      <li class="nav-item dropdown hidden-xs-up app-logged-in">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create Record</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="/create_licenseplate.php">License Plate</a>
          <a class="dropdown-item" href="/create_person.php">Person</a>
          <a class="dropdown-item" href="/create_policereport.php">PoliceReport</a>
          <a class="dropdown-item" href="/create_warrant.php">Warrants</a>
        </div>
      </li>
      <li class="nav-item app-logged-out">
        <a class="nav-link" href="/login.php">Log In</a>
      </li>
      <li class="nav-item hidden-xs-up app-logged-in">
        <a class="nav-link" href="/logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>

    <div class="container">
