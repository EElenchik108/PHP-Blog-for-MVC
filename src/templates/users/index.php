<h1 style="margin: 30px;"><?= $title ?></h1>
<?php foreach ($stringUsers as $user): ?>
	<article class="mb-3 border-bottom">	
		<h4><?= $user->getName() ?></h4>		
		<p><?= $user->getEmail() ?></p>
	</article>
<?php endforeach ?>

