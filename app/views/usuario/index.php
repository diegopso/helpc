<form role="form" method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Informe o problema:</label>
                <textarea class="form-control" name="problema"></textarea>
            </div>    
            <div class="form-group">
                <label>Informe a solução:</label>
                <textarea class="form-control" name="solucao" ></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <legend>Perguntas</legend>
            <table class="table-striped table-hover">
                <?php foreach ($model->Data as $pergunta): ?>
                <tr>
                    <td style="width: 440px"><?= $pergunta->Texto ?></td>
                    <td>

                        <label class="radio-inline"><input type="radio" name="pergunta_<?= $pergunta->Id ?>" value="1" />Sim</label>
                        <label class="radio-inline"><input type="radio" name="resposta_<?= $pergunta->Id ?>" value="0" />Não</label>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <div style="margin-top: 20px">
                <button class="btn btn-success">Adicionar Pergunta</button>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>