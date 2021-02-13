
<!doctype html>
<html lang = "en">
<head>
  <meta charset = "utf-8">
  <title> Personal Gallery </title>
  <meta name = "description" content = "personal gallery for PNG images only.">
  <meta name = "author" content = "Ismael Ochoa Pelayo">
  <link rel = "stylesheet" href = "css/styles.css?v=1.0">

</head>

<body>
    
    <div class="topnav">
      <h2>Personal Gallery</h2>
    
    </div>

    <div class="content">
      <p>Personal gallery for PNG images only. <br> <em>Max 10Mb</em></p>
      <?php
      if( isset($_GET['alert']) ){
          echo "<p class='alert'>".$_GET['alert']."</p>";
      }?>
      <form method="post" enctype="multipart/form-data" action="service.php" >
      <input type="file" name="image" accept="image/x-png" /><br />
      <input type="submit" class="button" value="Upload" />
      </form>
    </div>

    <div class="gallery">
      <?php
        if (isset($_COOKIE['cookie'])) {
            rsort($_COOKIE['cookie']);
            foreach ($_COOKIE['cookie'] as $name => $value) {
                $name = htmlspecialchars($name);
                $value = htmlspecialchars($value);
                echo "<img src='".$value."' title='".$name."'>";
            }
        }
      ?>
    </div>

    <div class="footer">
    Ismael Ochoa Pelayo
    </div>
</body>
</html>