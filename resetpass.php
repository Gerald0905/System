<?php
session_start();

?>

<div class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">

				<?php
					if(isset($_SESSION['sid']))
					{
						?>
						<div class="alert alert-success">
		s					<h5><?= $_SESSION['sid']; ?> </h5>
						</div>
						<?php
						    unset($_SESSION['sid']);
					}

				?>


				<div class="card">
					<div class="card-header">
						<h5> Reset Password</h5>
					</div>
					
					<div class="card-body p-4">

						<form action="password-reset-code.php" method="POST">
							<div class="form-group mb-3">
								<label>Email</label>
								<input type="text" name="email_address" class="form-control" placeholder="Enter email address">
							</div>
							<div class="form-group mb-3">
								<button type="submit" name="password_reset_link" class="btn btn-primary">Send Password reset link</button>


						</form>
