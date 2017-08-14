
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nome extends CI_Controller {

    /**
     *  author: 3S Ricardo Souza
     */
function __construct() {
    parent::__construct();
    /* Carrega o modelo */
    $this->load->model('Prestadores_model', 'model', TRUE);
}
            public function index()
            {



                $this->load->view('nome');

            }

            public function buscar(){

                $this->load->model('Prestadores_model');

                $data['prestadores'] = $this->Prestadores_model->nome($this->input->post('nome'));

                 $this->load->view('prestadores_nome', $data);

            }


            public function ativa($cracha_id){

               $cracha = $cracha_id;
               $this->load->model('Prestadores_model');
               $desativa = $this->Prestadores_model->ativa_cracha($cracha);

               if ($desativa) {
                   # atualizou
                echo "<script>alert('Crachá Ativado com sucesso!');</script>";
                $this->load->view('welcome_message');
               }
               else{
                 # deu erro
                echo "<script>alert('Não foi possivel ativar o crachá!');</script>";

               }

            }

            public function validade_cracha($cracha_id){

              $data['cracha'] = $cracha_id;
              $this->load->view('validade_cracha', $data);


            }

             public function desativa($cracha_id){

               $cracha = $cracha_id;
               $this->load->model('Prestadores_model');
               $desativa = $this->Prestadores_model->desativa_cracha($cracha);

               if ($desativa) {
                   # atualizou
                echo "<script>alert('Crachá desativado com sucesso!');</script>";
                $this->load->view('welcome_message');
               }
               else{
                 # deu erro
                echo "<script>alert('Não foi possivel desativar o crachá!');</script>";

               }

            }






}
