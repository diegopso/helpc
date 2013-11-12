<!--Usuario-->
<div class="container">
    <form role="form" method="post">
        <div class="ajusteTop">
            <section>
                <h2 class="major">
                    <span>Area Restrita de: <?= Session::get('user')->Nome ?></span>
                </h2>
                <div class="form-group">
                    <a href="admin/problema" class="btn btn-primary">Nova Solução</a>
                </div>
                <hr />                
                <table id="table-perguntas" class="table table-condensed">
                    <tr>
                        <th>Problema</th>
                        <th>Solução</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    <?php foreach ($model as $resultado): ?>
                        <tr>
                            <td><?= $resultado->Problema ?></td>
                            <td><?= $resultado->Solucao ?></td>
                            <td><a href="admin/problema/<?= $resultado->Id ?>"><span class="glyphicon glyphicon-pencil"> </span>Editar</a></td>
                            <td><a href=""><span class="glyphicon glyphicon-remove"> </span>Excluir</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        </div>

    </form>
</div>