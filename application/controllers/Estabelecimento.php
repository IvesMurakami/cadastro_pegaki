<?php
class Estabelecimento extends CI_Controller{

    function master($page, $data){
        $this->load->view('templates/header');
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }

    function index(){
        $data['estabelecimentos'] = $this->estabelecimento_model->get();
        $this->master('estabelecimento/index', $data);
    }

    function create($title = 'Novo Registro'){

        $data['title'] = $title;
        $this->master('estabelecimento/create', $data);
    }

    public function save(){
        $id = $this->input->post('estabelecimento_id');

        $dados = array(
            $nomefantasia = $this->input->post('nomefantasia'),
            $cep = $this->input->post('cep'),
            $rua = $this->input->post('rua'),
            $bairro = $this->input->post('bairro'),
            $cidade = $this->input->post('cidade'),
            $uf = $this->input->post('uf')
        );

        $this->estabelecimento_model->save($dados, $id);

        $data['estabelecimentos'] = $this->estabelecimento_model->get(null);
        $this->master('estabelecimento/index', $data);
    }

    public function edit($id = null){
        if ($id) {
            $estabelecimento = $this->estabelecimento_model->get($id);

            if ($estabelecimento->num_rows() > 0 ) {
                $data['title'] = 'Editar Registro';

                $data['estabelecimento_id'] = $estabelecimento->row()->estabelecimento_id;
                $data['nomefantasia'] =$estabelecimento->row()->nomefantasia;
                $data['cep'] = $estabelecimento->row()->cep;
                $data['rua'] = $estabelecimento->row()->rua;
                $data['bairro'] = $estabelecimento->row()->bairro;
                $data['cidade'] = $estabelecimento->row()->cidade;
                $data['uf'] = $estabelecimento->row()->uf;

                $this->master('estabelecimento/create', $data);
            }
        }
    }

    public function delete($id = null) {
        if ($this->estabelecimento_model->delete($id)) {
            index_page();
//            $data['estabelecimentos'] = $this->estabelecimento_model->get();
//            $this->master('estabelecimento/index', $data);
        }
    }
}