<?php

class Prestadores_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


function nome($nome){

    $nome_busca =  $nome;

    $consulta = "select pesesnome, pesessolicitante, pesesid, pesesdatafinal, crachaid,crachadevolvido
    from tb_pessoa_estserv a, tb_pessoa_estserv_data b, tb_cracha_estserv c
    where a.pesesid=b.pesespessoa and b.pesespessoa=c.crachapessoa and pesesnome ilike '%".$nome_busca."%' order by pesesnome asc";

    $query = $this->db->query($consulta);

    return $query->result();

    }

    function cracha($cracha){

    $cracha_busca =  $cracha;

    $consulta = "select pesesnome, pesessolicitante, pesesid, pesesdatafinal, crachaid,crachadevolvido
    from tb_pessoa_estserv a, tb_pessoa_estserv_data b, tb_cracha_estserv c
    where a.pesesid=b.pesespessoa and b.pesespessoa=c.crachapessoa and c.crachaid= '$cracha_busca' ";

    $query = $this->db->query($consulta);

    return $query->result();

    }




    function ativa_cracha($crachaid){

     $cracha = $crachaid;
     $consulta_ativa = "update tb_cracha_estserv set crachadevolvido = '0' where crachaid ='$cracha' ";

     $query_ativa = $this->db->query($consulta_ativa);

     if ($query_ativa)
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
    }

    function desativa_cracha($crachaid){

     $cracha = $crachaid;
     $consulta = "update tb_cracha_estserv set crachadevolvido = '1' where crachaid ='$cracha' ";

     $query = $this->db->query($consulta);

     if ($query)
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }


}

function validade_cracha($validade, $cracha_id){

     $cracha = $cracha_id;
     $data = $validade;

    if (empty($cracha) or empty($data)) {
        echo "<script>alert('Ocorreu um erro ao receber os dados! Tente novamente.');</script>";
    }else{

     $consulta_pessoa = "update tb_pessoa_estserv_data set pesesdatafinal = '#$data#'
where pesespessoa in (select pesesid from tb_pessoa_estserv inner join tb_cracha_estserv on pesesid = crachapessoa
where crachaid in ('$cracha'))";

    $consulta_cracha = "update tb_cracha_estserv set crachavalidade = '#$data#' where crachaid in ('$cracha')";


     $query_pessoa = $this->db->query($consulta_pessoa);
     $query_cracha = $this->db->query($consulta_cracha);

     if ($query_pessoa && $query_cracha)
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }

    }
}

}