$(document).ready(function(){
	$('#salvar-pergunta').click(function(){
		doGet(ROOT + '/admin/adicionarPergunta?pergunta=' + $('#pergunta').val(), function(data){
			alert('deu certo...');
			console.log(data);
		}, function(){}, function(){}, function(){});
	});
});

function doGet(path, success, error, before, dataType, async) {   
    $.ajax({
        type: "GET",
        dataType: dataType || "json",
        url: ROOT + path,
        async: async !== false ? true : false,
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