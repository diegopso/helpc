<div class="row areaMediana">
    <div class="container">    
        <div class="col col-md-12" align="center">
            <form class="col col-md-6" method="POST">
            	<h2>Responda as perguntas</h2>
                <h4>Dessa forma poderemos lhe ajudar</h4>
                <button id="btIniciar" title="Teste" type="button" class="btn btn-large btn-success" onclick="exibirPop('areaDiag')" style="display: none;">
                    <span class="glyphicon glyphicon-play-circle"></span> Iniciar</button>
                <!--Respostas-->    
                <div id="areaDiag" class="well" style="display: inline-block;">
                    <h3 style="color: #39B3D7;">
                        <b><?= $model->Texto ?></b>
                    </h3>
                    <div class="well col col-md-4">
                        <span class="input-group-addon">
                            <label><input type="radio" name="resposta" value="1"> SIM</label>
                        </span>
                    </div>
                    <div class="well col col-md-4">
                        <span class="input-group-addon">
                            <label><input type="radio" name="resposta" value="-1"> NÃO SEI</label>
                        </span>
                    </div>
                    <div class="well col col-md-4">
                        <span class="input-group-addon">
                            <label><input type="radio" name="resposta" value="0"> NÃO</label>
                        </span>
                    </div>
                    <button id="btConfirmar" type="submit" class="btn btn-large btn-info">
                        <span class="glyphicon glyphicon-ok-sign"></span> Confirmar</button>
                </div>
            </form>
            <?php if($provavel): ?>
            <div id="areaView" class="well col col-md-6">
                <h3><?= $provavel->Problema ?></h3>
				<p><?= $provavel->Solucao ?></p>
				<p>Isso resolveu seu problema?</p>
            	<a href="~/help/sucesso">Sim</a> &nbsp;&nbsp;&nbsp;
            	<a href="javascript:void(0);">Não</a>
            </div>
			<?php endif; ?>
        </div>
    </div>
</div>