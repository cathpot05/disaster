<?php
include "../../connect.php";
$id = $_GET['id'];
$type =$_GET['actiontype'];

if($type=="delete"){
    echo $id;
}
else if($type =="edit")
{
$sql = "Select *from user where id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

	?>
	<form class="form-horizontal" action="editStudent.php?id=<?php echo $id; ?>" method=post > 
		<input type="text" class="form-control"  name="studNoTxt" placeholder="Student No." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Student No. '" value="<?php echo $row['studNo']; ?>"><br>								
		<input type="text" class="form-control" name="nameTxt" placeholder="Name " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name '" value="<?php echo $row['name']; ?>"><br>
		<input type="text" class="form-control" name="emailTxt" placeholder="Email Address " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" value="<?php echo $row['email']; ?>"><br>
		<input type="text" class="form-control" name="usernameTxt" placeholder="Username " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username '" value="<?php echo $row['username']; ?>"><br>
		<input type="password" class="form-control" name="passwordTxt" placeholder="Password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password '"><br>		
		<button type="submit" name="registerSubmit" class="genric-btn info text-uppercase form-control">Save</button>							
	</form>
	
	<?php
	
}
?>