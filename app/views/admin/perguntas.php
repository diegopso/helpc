<form method="POST">
	<input name="Texto" type="text" />
	<input type="submit" />
</form>

<table>
	<thead>
		<tr>
			<td>Pergunta</td>
		</tr>
	</thead>
	<tbody>
		<?php if($model->Count): ?>
			<?php foreach($model->Data as $p): ?>
				<tr>
					<td><?= $p->Texto ?></td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td>Nenhum resultado</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>