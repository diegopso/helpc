<!--Home-->
    <!--Início area central-->
    <div class="row">
        <div class="col col-md-12 areaCentral">
            <img id="imgCenter" class="col col-md-6" src="~/img/img_Center.png" />
            <div class="container">
                <div class="row">
                    <div align="center" class="col col-md-6">
                        <h1 id="tituloInfo">Obtenha diagnósticos rápidos do seu PC com o 'HelpC Diagnóstico'</h1>
                        <h3 id="subTituloInfo">Está cansado de perder tempo aguardando o diagnóstico do seu PC?
                            que tal experimentar o HelpC!
                        </h3>
                        <br>
                        <!--Botão - Modal Descrição-->
                        <a data-toggle="modal" href="#ModalInfo" class="btn btn-info btn-large"><b>Saiba mais</b></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row areaMediana">
        <div class="container">    
            <div class="col col-md-12" align="center">
                <div class="col col-md-6">
                    <h2>Vamos iniciar o diagnóstico de seu computador?</h2>
                    <h4>Quando estiver pronto! clique em Iniciar.</h4>
                    <button id="btIniciar" title="Teste" type="button" class="btn btn-large btn-success" onclick="exibirPop('areaDiag')">
                        <span class="glyphicon glyphicon-play-circle"></span> Iniciar</button>
                    <!--Respostas-->    
                    <div id="areaDiag" class="well">
                        <h3 style="color: #39B3D7;">
                            <b>Seu computador está ligando?</b>
                        </h3>
                        <div class="well col col-md-4">
                            <span class="input-group-addon">
                                <label><input type="radio" name="optionsRadios"> SIM</label>
                            </span>
                        </div>
                        <div class="well col col-md-4">
                            <span class="input-group-addon">
                                <label><input type="radio" name="optionsRadios"> NÃO SEI</label>
                            </span>
                        </div>
                        <div class="well col col-md-4">
                            <span class="input-group-addon">
                                <label><input type="radio" name="optionsRadios"> NÃO</label>
                            </span>
                        </div>
                        <button id="btConfirmar" type="button" class="btn btn-large btn-info">
                            <span class="glyphicon glyphicon-ok-sign"></span> Confirmar</button>
                        <button type="button" class="btAux btn btn-large btn-info" onclick="exibirPop2('areaView')">
                            <span class="glyphicon glyphicon-th-list"></span></button>
                        <button type="button" class="btAux btn btn-large btn-default" onclick="reset()" style="background-color: gainsboro;">
                            <span class="glyphicon glyphicon-arrow-left"></span></button>
                    </div>
                </div>
                <div id="areaView" class="well col col-md-6">
                    ..
                </div>
            </div>
        </div>
    </div>
    <!--MODAL-->

    <!--Modal Login-->
    <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 350px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Área Restrita / Login</h4>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="text" placeholder="E-mail">
                    <br>
                    <input class="form-control" type="text" placeholder="Senha">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Entrar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Descrição do HelpC-->
    <div class="modal fade" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 70%;">
            <div class="modal-content" style=" line-height: 25px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><b>Conheça mais sobre HelpC Diagnósticos Inteligentes</b></h4>
                </div>
                <div class="modal-body">
                    <p align="justify">A aplicação HelpC consiste em um sistema especialista que visa fornecer diagnósticos a usuários 
                        de computadores sobre possíveis problemas que podem estar presentes nas suas máquinas. Visando 
                        propor uma alternativa aos métodos convencionais de diagnósticos de problemas ocorridos em computadores, 
                        o HelpC consiste em fazer o mesmo procedimento, no entanto, utilizando técnicas da IA juntamente com 
                        outros recursos e tecnologias da informação, para apresentar um diagnóstico, mediante as informações 
                        previamente informada pelo usuário, que possa explicitar e informar ao mesmo, o real problema que 
                        ocorre com sua máquina, podendo tomar uma ação, mediante o resultado adquirido.</p>
                    <br>
                    <p align="justify">Aplicação utiliza uma interface clara e objetiva, que consiste em contribuir em uma melhor experiência 
                        de uso do usuário com o sistema. Inicialmente, o diagnóstico se dá por meio de perguntas que são 
                        apresentadas ao usuário, no qual este interage inferindo suas respostas, ou seja, selecionando as 
                        opções exibidas pela aplicação de acordo com o seu conhecimento sobre o problema ocorrido. A aplicação 
                        se encarrega de cruzar as informações apresentadas pelo usuário com a sua base de conhecimento, que de 
                        acordo com essas informações tende a chegar em um resultado que retrate o real problema presente na 
                        máquina ou algo o mais próximo possível disto.</p>
                    <br>
                    <p align="justify">Este processo de diagnóstico se dá por meio de uma técnica da IA, conhecida como “sistemas especialistas”, 
                        que faz uso de um domínio específico (Diagnóstico de computadores), juntamente base de conhecimento 
                        aplicado a este domínio e demais tecnologias da informações. Juntos todos estes recursos operam a favor 
                        de um propósito: encontrar uma solução para uma real situação ou problema presente na máquina do usuário.</p>
                    <br>
                    <p align="justify">A aplicação, posteriormente, irá atribuir características de inteligência, partindo do pressuposto que 
                        pode aprender uma solução, caso não esteja, ou que ainda não pertença a sua base de conhecimento, 
                        ou mesmo melhorar a eficácia do diagnóstico. Contudo, a aplicação também irá permitir a intervenção 
                        de usuário que tem conhecimento do domínio para incremento manual da base de conhecimento. Este 
                        comportamento por parte da aplicação, possibilita a maximização da base de conhecimento, logo também 
                        das soluções que podem ser apresentadas. Desta forma a aplicação estará sempre convergindo a uma ótima 
                        solução, consideração que caso a aplicação desconheça a solução baseado na informações cedidas, a HelpC 
                        captar os dados, levanta informações referente ao problema, cruza estas informações, propondo uma 
                        solução o que outrora poderá ser utilizada.</p>       
                    <br>
                    <p align="justify">A aplicação HelpC, visa trazer comodidade e facilidade aos usuários que possuem interesse em conhecer 
                        ou obter maiores informações sobre determinado problema que possa está ocorrendo em sua máquina. 
                        Podendo o próprio usuário executar o reparo do problema, ou obter informações necessárias sobre o 
                        ocorrido com o computador, facilitando sua comunicação com profissional especializado na área de 
                        manutenção de computadores.</p> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Entendi!</button>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="col col-md-12 areaRodape">
        <div class="container">
            <div class="col-md-3">
                <h4 class="tituloRodape">Suporte da Base de Conhecimento</h4>
                <div class="textoRodape">
                    <ul>
                        <li>PROBLEMAS GERAIS DA CPU</li>
                        <li>Memoria</li>
                        <li>Disco Rigido (HD)</li>
                        <li>Fonte de alimentação</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="tituloRodape">Suporte da Base de Conhecimento</h4>
                <div class="textoRodape">
                    <ul>
                        <li>Memoria</li>
                        <li>Disco Rigido (HD)</li>
                        <li>Fonte de alimentação</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    $('#areaDiag').hide();
    $('#areaView').hide();
    
    function exibirPop(id) {
        $("#" + id).slideToggle("slow");
        //$("#areaView").slideToggle("slow");
        $("#btIniciar").hide();
    };
    function exibirPop2(id) {
        $("#" + id).slideToggle("slow");
    };
    function reset() {
        $('#areaDiag').hide();
        $('#areaView').hide();
        $("#btIniciar").slideToggle("slow");
    };
    
        $('#activeHome').attr('class', 'active');   
</script>
