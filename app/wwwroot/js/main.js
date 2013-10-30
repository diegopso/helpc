$(document).ready(function(){
	$('#salvar-pergunta').click(function(){
		doGet('admin/adicionarPergunta?pergunta=' + $('#pergunta').val(), function(data){
			alert('ola mundo');
			$('#table-perguntas').append('<tr>' +
				'<td style="width: 440px">'+ data.d.Texto +'</td>'+
				'<td>' +
					'<label class="radio-inline"><input type="radio" name="pergunta_'+data.d.Id+'" value="1">Sim</label> ' +
					'<label class="radio-inline"><input type="radio" name="resposta_'+data.d.Id+'" value="0">Não</label> ' +
					'<a href="javascript:void(0);" class="btn-remover"><span id="pergunta_'+data.d.Id+'" title="Remover pergunta deste problema" class="glyphicon glyphicon-remove"></span></a>' +
				'</td>' +
			'</tr>');
		}, function(err){alert(err.responseText);}, function(){}, function(){});
	});
});

function doGet(path, success, error, before) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: ROOT + path,
        beforeSend: function(){
            before();
        },
        success: function(data) {
            success(data);
        },
        error: function(err) {
            error(err);
        }
    });
}