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
                            <span id="pergunta_<?= $pergunta->Id ?>" title="Remover pergunta deste problema" class="glyphicon glyphicon-remove-circle" style="margin-left: 5px"></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div style="margin-top: 20px">
                <a data-toggle="modal" href="#modalPergunta" class="btn btn-success">Adicionar Pergunta</a>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<!--Modal adicionar pergunta-->
<div id="modalPergunta" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Nova Pergunta</h4>
            </div>
            <div class="modal-body">
                <label>Digite a pergunta:</label>
                <textarea id="pergunta" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="adicionarPergunta()" data-dismiss="modal">Salvar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    function adicionarPergunta() {
        var pergunta = $("#pergunta").val();
        $.ajax({
            type: "POST",
            url: ROOT + "usuario/adicionarPergunta",
            data: {pergunta: pergunta},
            beforeSend: function() {

            },
            error: function(x, e, t) {
                alert("Ocorreu um erro no ajax");
            },
            success: function(data) {
                var idPergunta = data.d;
                alert(idPergunta);
            }
        });
    }
</script>
