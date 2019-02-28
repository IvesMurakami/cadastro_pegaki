<main role="main" class="container">

<h1>Estabelecimentos</h1>
    <table class="table">
        <tr>
            <td><strong>Nome Fantasia</strong></td>
            <td><strong>CEP</strong></td>
            <td><strong>Rua</strong></td>
            <td><strong>Bairro</strong></td>
            <td><strong>Cidade</strong></td>
            <td><strong>UF</strong></td>
            <td><strong>Ações</strong></td>
        </tr>
        <?php foreach ($estabelecimentos -> result() as $estabelecimento) { ?>
        <tr>
            <td><?php echo $estabelecimento->nomefantasia; ?></td>
            <td><?php echo $estabelecimento->cep; ?></td>
            <td><?php echo $estabelecimento->rua; ?></td>
            <td><?php echo $estabelecimento->bairro; ?></td>
            <td><?php echo $estabelecimento->cidade; ?></td>
            <td><?php echo $estabelecimento->uf; ?></td>

            <td>

                <?php
                echo "<a href='estabelecimento/edit/$estabelecimento->estabelecimento_id' class='fas fa-pencil-alt' style='color:blue' title='Editar'></a>";
                ?>
                |
                <a href="#" class="confirma_exclusao fas fa-times" style="color: #ff0000" title="Excluir" data-estabelecimento_id="<?= $estabelecimento->estabelecimento_id ?>" data-nomefantasia="<?= $estabelecimento->nomefantasia ?>"></a>
            </td>
            <?php } ?>
        </tr>
    </table>


    <div class="modal fade" id="modal_confirmation">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmação de Exclusão</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir o estabelecimento "<strong><span id='nome_exclusao'></span></strong>"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Não</button>
                    <button type="button" class="btn btn-outline-danger" id="btn_excluir">Sim</button>
                </div>
            </div>
        </div>
    </div>

    <script>
            var base_url = "<?= base_url(); ?>";
            $(function(){
                $('.confirma_exclusao').on('click', function(e) {
                    e.preventDefault();

                    var nomefantasia = $(this).data('nomefantasia');
                    var estabelecimento_id = $(this).data('estabelecimento_id');

                    $('#modal_confirmation').data('nomefantasia', nomefantasia);
                    $('#modal_confirmation').data('estabelecimento_id', estabelecimento_id);
                    $('#modal_confirmation').modal('show');
                });

                $('#modal_confirmation').on('show.bs.modal', function () {
                    var nomefantasia = $(this).data('nomefantasia');
                    var estabelecimento_id = $(this).data('estabelecimento_id');
                    $('#nome_exclusao').text(nomefantasia);
                });

                $('#btn_excluir').click(function(){
                    var id = $('#modal_confirmation').data('estabelecimento_id');
                    document.location.href = base_url + "estabelecimento/delete/"+id;
                });
        });
    </script>

    </main>