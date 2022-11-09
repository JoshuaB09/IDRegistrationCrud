<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    $id_no= isset($_POST['id_no']) && !empty($_POST['id_no']) && $_POST['id_no'] != 'auto' ? $_POST['id_no'] : NULL;
    $F_name = isset($_POST['F_name']) ? $_POST['F_name'] : '';
    $M_name = isset($_POST['M_name']) ? $_POST['M_name'] : '';
    $L_name = isset($_POST['L_name']) ? $_POST['L_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
    $course = isset($_POST['course']) ? $_POST['course'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    $stmt = $pdo->prepare('INSERT INTO student_info VALUES (?, ?, ?, ?, ?, ?, ?, ? , ?, ?, ?)');
    $stmt->execute([$id_no, $F_name, $M_name, $L_name, $email, $phone, $address, $sex, $course,$password, $created]);
    $msg = 'Created Successfully!';
}
?>
<?=template_header('Create')?>

<div class="content update">
	<h2>Register New Student</h2>
    <form action="create.php" method="post">
	<table>
	
		<label for="id_no">ID</label>
		<label for="F_name">First Name</label>
		<input type="text" name="id_no" placeholder="6789" value="auto" id="id_no">
        <input type="text" name="F_name" placeholder="Joshua" id="F_name">
		
		<label for="M_name">Middle Name</label>
		<label for="L_name">Last Name</label>
		<input type="text" name="M_name" placeholder="Aloot" id="M_name">
		<input type="text" name="L_name" placeholder="Balagbagan" id="L_name">
		
		<label for="email">Email</label>
		<label for="phone">Phone</label>	
		<input type="text" name="email" placeholder="Balagbaganj09@gmail.com" id="email">
        <input type="text" name="phone" placeholder="09876452" id="phone">
		
        <label for="course">Address</label>
        <label for="course">Sex</label>
		<br><input type="text" name="address" placeholder="Address" id="address">
		<br><input type="text" name="sex" placeholder="sex" id="sex">
        
		
		<label for="course">Courses</label>
		<br><input type="text" name="course" placeholder="course" id="course">
		<label for="password">Password</label>
		<label for="repassword">Re-enter Password</label>
				
		<input type="text" name="password" placeholder="*******" id="password">
        <input type="text" name="repassword" placeholder="re enter" id="repassword">
		
		<label for="created">Date Registered</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <input type="submit" value="Register">
	<table>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>