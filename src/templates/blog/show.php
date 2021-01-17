	<article class="mb-3 border-bottom">	
		<h1 class="title-post"  data-id="<?= $post->getId() ?>"> <?= $post->getName() ?> </h1>
		<div id="container"><input id="field" type="text" name="name" class="form-control" data-id="<?= $post->getId() ?>" value="<?= $post->getName() ?>"></div>
		<small>
			Date :<?= $post->getCreatedAt() ?>
			Author: <?= $post->getAuthor()->getName() ?>
		</small>
		<p><?= $post->getText() ?></p>

	</article>

	<!-- <?php echo $post->getId();
	?> -->

