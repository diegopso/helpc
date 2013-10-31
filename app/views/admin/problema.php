<!--Usuario-->
<div class="container">
    <form role="form" method="post">
        <div class="row ajusteTop">
            <div class="col-md-7">
                <h2>Perguntas</h2>
                <table class="table table-condensed">
                    <?php foreach ($model->Data as $pergunta): ?>
                        <tr>
                            <td style="width: 440px"><?= $pergunta->Texto ?></td>
                            <td>
                                <label class="radio-inline"><input type="radio" name="pergunta_<?= $pergunta->Id ?>" value="1" />Sim</label>
                                <label class="radio-inline"><input type="radio" name="resposta_<?= $pergunta->Id ?>" value="0" />Não</label>
                                <span id="pergunta_<?= $pergunta->Id ?>" title="Remover pergunta deste problema" class="glyphicon glyphicon-remove" style="margin-left: 5px"></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div style="margin-top: 20px">
                    <a data-toggle="modal" href="#modalPergunta" class="btn btn-success">Adicionar Pergunta</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <h3>Informe o problema</h3>
                    <textarea class="form-control areaInput" name="problema"></textarea>
                </div>  
                <br />
                <div class="form-group">
                    <h3>Informe a Solução</h3>
                    <textarea class="form-control areaInput" name="solucao" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
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
</div>
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
