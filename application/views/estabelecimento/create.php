
<main role="main" class="container">
<div >
    <h1 class="text-center"><?php echo $title ?></h1>
    <div class="col-md-6 col-md-offset-3">

        <div>
            <ul style="color: #ff0000" id="erros"></ul>
        </div>

        <div class="row">
            <?= form_open('estabelecimento/save')  ?>
            <div class="form-group">
                <label for="nomefantasia">Nome Fantasia</label>
                <input type="text" name="nomefantasia" id="nomefantasia" class="form-control" value="<?= set_value('nomefantasia') ? : (isset($nomefantasia) ? $nomefantasia : '') ?>" autofocus='true' />
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" class="form-control cep" value="<?= set_value('cep') ? : (isset($cep) ? $cep : ''); ?>" />
            </div>
            <div class="form-group">
                <label for="rua">Rua</label>
                <input type="rua" name="rua" id="rua" class="form-control" value="<?= set_value('rua') ? : (isset($rua) ? $rua: '') ; ?>" />
            </div>

            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="bairro" name="bairro" id="bairro" class="form-control" value="<?= set_value('bairro') ? : (isset($bairro) ? $bairro: '') ; ?>" />
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="cidade" name="cidade" id="cidade" class="form-control" value="<?= set_value('cidade') ? : (isset($cidade) ? $cidade: '') ; ?>" />
            </div>
            <div class="form-group">
                <label for="uf">UF</label>
                <input type="uf" name="uf" id="uf" class="form-control" value="<?= set_value('uf') ? : (isset($uf) ? $uf: '') ; ?>" />
            </div>

            <div class="form-group text-right">
                <input id="salvar" type="submit" value="Salvar" class="btn btn-success" />
            </div>

            <input type='hidden' name="estabelecimento_id" value="<?= set_value('estabelecimento_id') ? : (isset($estabelecimento_id) ? $estabelecimento_id: ''); ?>">
            <?= form_close(); ?>
        </div>
        <div class="row"><hr></div>

    </div>
</div>

</main>


<script type="text/javascript" >

    $(document).ready(function() {

        $('.cep').mask('99999-999')

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            $("#erros").html("<li>CEP não encontrado.</li>");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    $("#erros").html("<li>Formato de CEP inválido.</li>");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });

    $("#salvar").click(function(event){
        erros = false;
        mensagem = "";

        var nomefantasia = $("#nomefantasia").val();
        var cep = $("#cep").val().replace(/\D/g, '');
        var rua = $("#rua").val();
        var bairro = $("#bairro").val();
        var cidade = $("#cidade").val();
        var uf = $("#uf").val();

        if (nomefantasia == ""){
            erros = true;
            mensagem += "<li>O Nome Fantasia deve ser preenchido.</li>"
        }
        if (cep != "") {
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(!validacep.test(cep)) {
                  erros = true
                    mensagem += "<li>Formato de CEP inválido.</li>"
                }

                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                    if (("erro" in dados)) {
                        erros = true;
                        mensagem += "<li>CEP não encontrado.</li>"
                    }
                });
            }
        else {
            erros = true;
            mensagem += "<li>CEP deve ser preenchido</li>"
        }
        if (rua == ""){
            erros = true;
            mensagem += "<li>A Rua deve ser preenchida.</li>"
        }
        if (bairro == ""){
            erros = true;
            mensagem += "<li>O Bairro deve ser preenchido.</li>"
        }
        if (cidade== ""){
            erros = true;
            mensagem += "<li>A Cidade deve ser preenchida.</li>"
        }
        if (uf == ""){
            erros = true;
            mensagem += "<li>O Estado (UF) deve ser preenchido.</li>"
        }

        if (erros) {
            event.preventDefault();
            $("#erros").html(mensagem);
        }
    });
</script>