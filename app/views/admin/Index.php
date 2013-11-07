<!--Usuario-->
<div class="container">
    <form role="form" method="post">
        <div class="row ajusteTop">
            <div class="col-md-7">
                <h2>Resultados</h2>
                <table class="table table-condensed">
                    <table id="table-perguntas" class="table table-condensed">
                        <?php foreach ($model as $resultado): ?>
                            <tr>
                                <td><?= $resultado->Problema ?></td>
                                <td><?= $resultado->Solucao ?></td>
                                <td>Editar</td>
                                <td>Excluir</td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </table>
            </div>
        </div>
    </form>
</div>