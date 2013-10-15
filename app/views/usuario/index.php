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
            <table>
                <tr>
                    <td>A tomada está conectada?</td>
                    <td>
                        <label class="radio"><input type="radio" class="radio" name="resposta1" value="1" />Sim</label>
                        <label class="radio"><input type="radio" class="radio" name="resposta1" value="0" />Não</label>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
</form>