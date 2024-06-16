
<div class="rx">
	<center>
		<h3>Change Your Password</h3>
	</center>
	<form action="" method="post">
		<div class="roup">
			<label>Enter Your Current Password</label>
			<input type="text" name="old_password" class="form-control">
		</div>
		<div class="roup">
			<label>Enter New Password</label>
			<input type="password" name="new_password" class="form-control">
		</div>
	<div class="roup">
		<label>Confirm new password</label>
		<input type="password" name="c_n_password" class="form-control">
	</div>
	<div class="text-center">
		<center><button class="btn btn-primary btn-lg" name="update" type="submit">Update Now</button></center>
	</div>
</form>
</div>

<?php
if (isset($_POST['update'])) {
    $c_email = $_SESSION['customer_email'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $c_n_password = $_POST['c_n_password'];

    // Check old password
    $select_cust = "SELECT * FROM customers WHERE customer_email='$c_email' AND customer_pass='$old_password'";
    $run_q = mysqli_query($con, $select_cust);
    $check_old_pass = mysqli_num_rows($run_q);

    if ($check_old_pass == 0) {
        echo "<script> alert('Invalid current password'); </script>";
        exit();
    } elseif ($new_password!= $c_n_password) {
        echo "<script> alert('New password does not match confirm password'); </script>";
        exit();
    } else {
        // Update password
        $update_q = "UPDATE customers SET customer_pass='$new_password' WHERE customer_email='$c_email'";
        mysqli_query($con, $update_q);

        echo "<script> alert('Password changed successfully'); </script>";
        echo "<script> window.open('my_account.php?my_order'); </script>";
    }
}

  ?>
