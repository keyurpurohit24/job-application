  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applications</title>
    <link rel="stylesheet" href="../Components/StyleSheets/navbar.css">
    <link rel='stylesheet' href='../Components/StyleSheets/form_style.css'>
  </head>
  <header>
  <nav>
    <ul>
      <li><a href="./myApplications.php">My Applications</a></li>
      <li><a href="./user_form.php">Apply For New Job</a></li>
    </ul>
  </nav>
</header>
  <body>
    <?php
      require '../Model/get_applications.php';
    ?>
  </body>
  </html>