<h1><?= $model->Texto ?></h1>
<form method="POST">
	<ul>
		<?php foreach($respostas as $r): ?>
		<li><input type="text" name="<?= $r->Id ?>" value="<?= $r->Resposta == 'Sim' ? 'Sim' : 'Não' ?>" /></li>
		<?php endforeach; ?>
	</ul>
	<input type="submit" />
</form>