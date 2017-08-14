
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cracha extends CI_Controller {

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



                $this->load->view('cracha');

            }

            public function atualizar()
            {



                $data =  $this->input->post('data');

                $cracha = $this->input->post('cracha');

                $this->load->model('Prestadores_model');
                $atualiza = $this->Prestadores_model->validade_cracha($data, $cracha);

                 if ($atualiza) {
                   # atualizou
                   echo "<script>alert('Validade atualizada com sucesso!');</script>";
                   $this->load->view('welcome_message');
                   }
               else{
                 # deu erro
                echo "<script>alert('Não foi possivel atualizar a data!');</script>";

               }
            }

            public function buscar(){

                $this->load->model('Prestadores_model');

                $data['prestadores'] = $this->Prestadores_model->cracha($this->input->post('cracha'));

                //echo $this->input->post('cracha');

                 $this->load->view('prestadores_cracha', $data);

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
