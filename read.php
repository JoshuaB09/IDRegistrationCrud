<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 5;
$stmt = $pdo->prepare('SELECT * FROM student_info ORDER BY id_no LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$student_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

$num_student_info = $pdo->query('SELECT COUNT(*) FROM student_info')->fetchColumn();
?>

<?=template_header('Read')?>

<div class="content read">
	<h2>Read student_info</h2>
	<a href="create.php" class="create-contact">Enroll New Student</a>
	<table>
        <thead>
            <tr>
                <td>id #</td>
                <td>First Name</td>
                <td>Middle Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Sex</td>
                <td>Course</td>
                <td>Password</td>
                <td>Created</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($student_info as $info): ?>
            <tr>
                <td><?=$info['id_no']?></td>
                <td><?=$info['F_name']?></td>
                <td><?=$info['M_name']?></td>
                <td><?=$info['L_name']?></td>
                <td><?=$info['email']?></td>
                <td><?=$info['phone']?></td>
                <td><?=$info['address']?></td>
                <td><?=$info['sex']?></td>
                <td><?=$info['course']?></td>
                <td><?=$info['password']?></td>
                <td><?=$info['created']?></td>
				
                <td class="actions">
                    <a href="update.php?id_no=<?=$info['id_no']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id_no=<?=$info['id_no']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_student_info): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>