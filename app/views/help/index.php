<div id="main" class="areaMediana">
    <section class="is-highlight container">    
        <!--Respostas-->    
        <div id="areaDiag">
            <h2>Responda as perguntas</h2>
            <h4>Dessa forma poderemos lhe ajudar</h4>
            <button id="btIniciar" title="Teste" type="button" class="btn btn-large btn-success" onclick="exibirPop('areaDiag')" style="display: none;">
                <span class="glyphicon glyphicon-play-circle"></span> Iniciar</button>

            <div class="well" style="display: inline-block;">
                <h2 style="color: #D73952;">
                    <b><?= $model->Texto ?></b>
                </h2>
                <form class="formPerguntas" method="POST">
                    <div class="well 4u">
                        <span class="textResponda input-group-addon">
                            <input type="radio" name="resposta" value="1"> SIM</span>
                    </div>
                    <div class="well 4u">
                        <span class="textResponda input-group-addon">
                            <input type="radio" name="resposta" value="-1"> NÃO SEI</span>
                    </div>
                    <div class="well 4u">
                        <span class="textResponda input-group-addon">
                            <input type="radio" name="resposta" value="0"> NÃO</span>
                    </div>
                    <button id="btConfirmar" type="submit" class="button">
                        <span class="glyphicon glyphicon-ok-sign"></span> Confirmar</button>
                </form>
            </div>
        </div>
    </section>
    <section id="ocultarPerguntas" class="is-highlight container">
        <?php if ($provavel): ?>
            <div id="areaView" class="well is-highlight">
                <h3>Problema:</h3>
                <h2><?= $provavel->Problema ?></h2>
                <h3>Possível Solução:</h3>
                <h2><?= $provavel->Solucao ?></h2>
                <h3>Isso resolveu seu problema?</h3>
                <a class="button" href="~/help/sucesso">Sim</a> &nbsp;&nbsp;&nbsp;
                <a class="button" href="javascript:void(0);">Não</a>
            </div>
        <?php endif; ?>
    </section>

</div>