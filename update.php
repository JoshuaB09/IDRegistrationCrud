<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id_no'])) {
    if (!empty($_POST)) {
        $id_no = isset($_POST['id_no']) ? $_POST['id_no'] : NULL;
        $F_name = isset($_POST['F_name']) ? $_POST['F_name'] : '';
        $M_name = isset($_POST['M_name']) ? $_POST['M_name'] : '';
        $L_name= isset($_POST['L_name']) ? $_POST['L_name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
        $course = isset($_POST['course']) ? $_POST['course'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        // Update the record
        $stmt = $pdo->prepare('UPDATE student_info SET id_no = ?, F_name = ?, M_name = ?, L_name = ?, email = ?, phone = ?, address = ?, sex = ?, course = ?, password = ?, created = ? WHERE id_no = ?');
        $stmt->execute([$id_no, $F_name, $M_name, $L_name, $email, $phone, $address, $sex, $course, $password, $created, $_GET['id_no']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM student_info WHERE id_no = ?');
    $stmt->execute([$_GET['id_no']]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$student) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('ID is Unspecified!');
}
?>


<?=template_header('Read')?>

<div class="content update">
	<h2>Update student #<?=$student['id_no']?></h2>
    <form action="update.php?id_no=<?=$student['id_no']?>" method="post">
        <label for="id">ID</label>
		<label for="F_name">First Name</label>
		<input type="text" name="id_no"  placeholder="1" value="<?=$student['id_no']?>" id="id_no">
        <input type="text" name="F_name"  value="<?=$student['F_name']?>" id="F_name">
		
		<label for="M_name">Middle Name</label>
		<label for="L_name">Last Name</label>
		<input type="text" name="M_name" value="<?=$student['M_name']?>" id="M_name">
		<input type="text" name="L_name" value="<?=$student['L_name']?>" id="L_name">
		
		<label for="email">Email</label>
		<label for="phone">Phone</label>	
		<input type="text" name="email" value="<?=$student['email']?>" id="email">
        <input type="text" name="phone" value="<?=$student['phone']?>" id="phone">
		
        <label for="course">Address</label>
        <label for="course">Sex</label>
		<br><input type="text" name="address" value="<?=$student['address']?>" id="address">
		<br><input type="text" name="sex" value="<?=$student['sex']?>" id="sex">
        
		
		<label for="course">Courses</label>
		<br><input type="text" name="course" value="<?=$student['course']?>" id="course">
		<label for="password">Password</label>
		<label for="repassword">Re-enter Password</label>
				
		<input type="text" name="password" value="<?=$student['password']?>" id="password">
       
		
		<label for="created">Date Registered</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <input type="submit" value="Update">
		
		<!--
		<label for="id">ID</label>
        <label for="name">Name</label>
        <input type="text" name="id" placeholder="1" value="<?=$student['id']?>" id="id">
        <input type="text" name="name" placeholder="Joshua" value="<?=$student['name']?>" id="name">
        <label for="email">Email</label>
        <label for="phone">Phone</label>
        <input type="text" name="email" placeholder="Balagbaganj09@gmail.com" value="<?=$student['email']?>" id="email">
        <input type="text" name="phone" placeholder="0987652" value="<?=$student['phone']?>" id="phone">
        <label for="title">Title</label>
        <label for="created">Created</label>
        <input type="text" name="title" placeholder="Employee" value="<?=$student['title']?>" id="title">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i', strtotime($student['created']))?>" id="created">
        <input type="submit" value="Update"> -->
		
    </form>
	
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>