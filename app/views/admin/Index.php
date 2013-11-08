<!--Usuario-->
<div class="container">
    <form role="form" method="post">
        <div class="ajusteTop">
            <section>
                <h2 class="major"><span>Area Restrita de: 
                    <?php if (Auth::isLogged()): ?>
                        <?= Session::get('user')->Nome ?>
                    <?php endif; ?></span>
                </h2>
                <hr />
                <table id="table-perguntas" class="table table-condensed">
                    <?php foreach ($model as $resultado): ?>
                        <tr>
                            <td><?= $resultado->Problema ?></td>
                            <td><?= $resultado->Solucao ?></td>
                            <td><a href=""><span class="glyphicon glyphicon-pencil"> </span>Editar</a></td>
                            <td><a href=""><span class="glyphicon glyphicon-remove"> </span>Excluir</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        </div>

    </form>
</div>