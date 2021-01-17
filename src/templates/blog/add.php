<h1><?= $title ?></h1>
<!-- <h1>Adding a new article</h1> -->

<form action="/blog/add" class="col=6" method="POST">
	<div class="form-group">
		<label for="">Article title</label>
		<input type="text" name="name" class="form-control" value="">
	</div>

	<div class="form-group">
		<label for="">Text</label>
		<textarea name="text" class="form-control"></textarea> 
	</div>

	<div class="form-group">
		<label for="">Author</label>
		<select name="author" id="" class="form-control">
			<?php foreach ($users as $user): ?>

			 <option value="<?= $user->getId()?>" >
			 	<?= $user->getName() ?>
			 </option>
			<?php endforeach ?>		

		</select>
	</div>
	<button class="btn btn-primary">Save</button>
</form>