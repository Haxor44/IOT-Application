<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<header role="banner">
  <h1>Home</h1>
  <ul class="utilities">
    <br>
    <li class="users"><a href="#">My Account</a></li>
    <li class="logout warn"><a href="login.html">Log Out</a></li>
  </ul>
</header>

<nav role='navigation'>
  <ul class="main">
    <li class="dashboard"><a href="#">Dashboard</a></li>
</nav>

<main role="main">
  
  
  
  <section class="panel important">
    <h2>Soil Moisture App</h2>
        <div>
           <p>
            <?php 
                    $moisture = "No moisture to display";
                    if (isset($_GET['moisture'])) {
                        // code...
                        $moisture = $_GET['moisture'];
                        $files = file_put_contents('soil.txt', $moisture);
                        echo "Soil moisture level is:".$moisture;
                    }
                    
                    echo $moisture;

                ?>
              </p>
        </div>
        </div>
      </form>
  </section>

</main>
</body>
</html>
