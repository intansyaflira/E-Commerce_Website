<!DOCTYPE html>

<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">

    <title></title>

</head>

<body>

<div class="login-card">
<form action="proses_loginpelanggan.php" method="post">
    <h1>Log-in</h1><br>
  <form>
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>
    
  <div class="login-help">
    <p>Don't have any account?</p>
    <a href="tambahpelanggan.php"><u>Register Here</u></a> 
  </div>
</div>

</body>

</html>