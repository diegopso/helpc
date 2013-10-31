
<div class="container">
    <div class="row ajusteTop">
        <div class="7u">
            <table class="table table-condensed" style="margin-top: -5px;">
                <thead>
                    <tr>
                        <td><h2>Perguntas</h2></td>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($model->Count): ?>
                        <?php foreach ($model->Data as $p): ?>
                            <tr>
                                <td><a href="~/admin/respostas/<?= $p->Id ?>"><?= $p->Texto ?></a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td>Nenhum resultado</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <h3>Informar outra pergunta</h3>
        <form method="POST" class="5u">
            <textarea class="form-control areaInput" name="Texto" type="text" ></textarea>
            <br />
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>