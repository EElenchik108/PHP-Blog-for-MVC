<h1>Registration</h1>
<?php
if(isset($error)): ?>
	<div class="alert alert-danger"><?= $error ?></div>
<?php endif ?>

<form action="/user/registration" class="col=6" method="POST">
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" name="name" class="form-control" value="">
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="text" name="email" class="form-control" value="">
	</div>

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" name="password" class="form-control" value="">
	</div>
	<button class="btn btn-primary">Register</button>
</form>