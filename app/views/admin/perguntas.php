<form method="POST">
    <input type="submit" />

    <table>
        <thead>
            <tr>
                <td>Pergunta</td>
            </tr>
        </thead>
        <tbody>
            <?php if ($model->Count): ?>
                <?php foreach ($model->Data as $p): ?>
                    <tr>
                        <td><input name="<?= $p->Id ?>" style="width: 700px" type="text" value="<?= $p->Texto ?>" /></a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td>Nenhum resultado</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</form>