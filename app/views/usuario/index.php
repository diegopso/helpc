<!--usuario-->
<div class="container">
    <form role="form" method="post">
        <div class="row" style="margin-top: 25px;">
            <div class="col-md-6">
                <div class="form-group">
                    <legend>Informe o problema:</legend>
                    <textarea class="form-control areaInput" name="problema"></textarea>
                </div> 
                <br />
                <div class="form-group">
                    <legend>Informe a solução:</legend>
                    <textarea class="form-control areaInput" name="solucao" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            <div class="col-md-6">
                <legend>Perguntas</legend>
                <table class="table-striped table-hover">
                    <?php foreach ($model->Data as $pergunta): ?>
                        <tr>
                            <td style="width: 440px"><?= $pergunta->Texto ?></td>
                            <>
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
    </form>
</div>
<script>
    $('#activeSobre').attr('class', 'active');   
</script>