<h1>Edit</h1>

<form action="/post/<?= $post->getId() ?>/edit" class="col=6" method="POST">
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" name="name" class="form-control" value="<?= $post->getName() ?>">
	</div>

	<div class="form-group">
		<label for="">Text</label>
		<textarea name="text" class="form-control"> <?= $post->getText() ?> </textarea> 
	</div>

	<div class="form-group">
		<label for="">Author</label>
		<select name="author" id="" class="form-control">
			<?php foreach ($users as $user): ?>

			 <option value="<?= $user->getId()?>" <?= $user->getId() == $post->getAuthorId() ? 'selected' : '' ?> >
			 	<?= $user->getName() ?>
			 </option>
			<?php endforeach ?>		

		</select>
	</div>
	<button class="btn btn-primary">Save</button>
</form>