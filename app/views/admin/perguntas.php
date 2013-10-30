
<div class="container">
    <div class="row" style="margin-top: 25px;">
        <form method="POST" class="col-md-5">
            <input class="form-control areaInput" name="Texto" type="text" />
            <br />
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <div class="col-md-7 well">
            <table class="table table-condensed" style="margin-top: -5px;">
                <thead>
                    <tr>
                        <td><p class="textTitulo">Perguntas</p></td>
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
    </div>
</div>