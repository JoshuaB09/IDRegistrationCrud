<!DOCTYPE html>
<html>
<head>
	<title>login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <div class="login-box">
  <div class="row">
  <div class="col-md-6">
<h2>University of Cordillera</h2>

      <form action="Welcome.php" method="post">
        <div class="style" class="text">
          <label for="SIDN">Student ID Number</label><br>
          <input type="text" id="SIDN" name="SIDN" maxlength="11" placeholder="00-0000-000"  required><br>
          <label for="pass">Password</label><br>
          <input type="Password" id="pass" name="pass" placeholder="Password"  required><br><br>
          <input type="submit" value="Login now"><br><br>
          <a href="Registration.php" style="color: black;">Register now!</a>
        </div>
      </form> 
  </div>
  </div>
  </div>
</div>
<style
</body>
</html>
