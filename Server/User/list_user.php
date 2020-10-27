<?php 
	include_once '../../Controller/User_c.php';
	$user = new User_c();
	
	if (isset($_POST['key'])) {
		$key = $_POST['key'];
		$rs = $user->searchUser($key);
	} else {
		$rs = $user->getUser();
	}

	$stt = 0;
	foreach ($rs as $value) {
		$stt+=1;
?>
	<tr>
		<td><?php echo $stt; ?></td>
		<td><?php echo $value['name']; ?></td>
		<td><?php echo $value['title']; ?></td>
		<td><?php echo $value['email']; ?></td>
		<td><?php echo $value['addres']; ?></td>	
		<td><?php echo $value['salary']; ?></td>	
		<td>
			<button class="btn btn-danger del_user" value="<?php echo $value['tbl_user.id']; ?>">Xóa</button>
		</td>
	</tr>

<?php
	}


 ?>