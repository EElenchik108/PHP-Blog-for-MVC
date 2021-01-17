<!-- <h1><?= $vars['title'] ?></h1> -->
<div style="display: flex;flex-direction: row;justify-content: space-between;height: 50px; margin-bottom: 30px; align-items: center; margin-top: 30px;">			
	<h1 ><?= $title ?></h1>
	<a style="height: 42px;" class="btn btn-outline-primary" href="/blog/add">Add new article</a>	
</div>
<?php foreach ($posts as $post): ?>	
	<article class="mb-3 border-bottom" >	
		<h3 class="text-center"><a href="post/<?= $post->getId() ?>"><?= $post->getName() ?></a></h3>
		<div style="display: flex;flex-direction: row;justify-content: space-between;height: 50px; margin-bottom: 10px; align-items: center; margin-top: 10px;">
			<a class="btn btn-outline-primary" href="/post/<?= $post->getId() ?>/edit">Edit</a>
			<small><?= $post->getCreatedAt() ?></small>
			<a class="btn btn-outline-warning delete-ajax" href="#" data-id="<?= $post->getId() ?>">Delete AJAX</a>	
			<a class="btn btn-outline-warning" href="/post/<?= $post->getId() ?>/delete">Delete article</a>		
		</div>
		<p><?= $post->getText() ?></p>

	</article>
<?php endforeach;?>
