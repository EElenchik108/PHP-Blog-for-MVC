<h1><?= $title ?></h1>
<?php
if(isset($error)): ?>
	<div class="alert alert-danger"><?= $error ?></div>
<?php endif ?>

<form action="/user/entrance" class="col=6" method="POST">
	<div class="form-group">
		<label for="">Email</label>
		<input type="text" name="email" class="form-control" value="">
	</div>	

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" name="password" class="form-control" value="">
	</div>
	<button class="btn btn-primary">Entrance</button>
</form>