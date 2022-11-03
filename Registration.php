<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>

<div>
	<form action="RegistrationData.php" method="post">
		<div class="container">
		<div class="login-box">
		<div class="row">
		<div class="col-md-6">
			<h2>Registration form</h2>
			<label for="IDN">ID Number</label><br>
			<input type="text" name="ID Number" required><br>

			<label for="LName">Last Name</label><br>
			<input type="text" name="Lname" required><br>

			<label for="Fname">First Name</label><br>
			<input type="text" name="Fname" required><br>

			<label for="Mname">Middle Name</label><br>
			<input type="text" name="Mname" required><br>

  			<label for="field1">Birthday:</label><br>
 			<input type="date" id="birthday" name="birthday"><br>
            <label><span>
 			<h4>Parent Names</h4><br>
			<label for="Nfather">Name of Father</label><br>
			<input type="text" name="Nfather" required><br>

			<label for="Nmother">Name of Mother</label><br>
			<input type="text" name="Nmother" required><br>		<input type="submit" name="Submit" value="Submit"><br>
			            
            <label for="course">Courses</label>
            	<select name="language" id="course">
                	<option value="col">College of law</option>
                    <option value="con">College of Nursing</option>
                    <option value="coa">College of Accountancy</option>
                    <option value="citcs">College of Information Technology and Computer Science</option>
                    <option value="cas">College of Arts and Sciences</option>
                    <option value="chtm">College of Hospitality and Tourism Hotel Management</option>
                    <option value="coc">College of Criminology</option>
                    <option value="cea">College of Engineering and Architecture</option>
                    <option value="cte">College of Teacher Education</option><br><br>
                   
			<a href="Login.php" style="color: black;">Click to Login</a>
		</form>
	</div>	
	</div>
	</div>
	</div>
</div>
</body>
</html>
