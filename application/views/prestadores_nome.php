<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- transforma em moeda -->




<!-- formatação de zero a esquerda -->


<!-- numeração por extenso -->


<!-- inverte a data para o formato do postgres -->


<!-- zera session -->


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<HTML>
<HEAD>
    <title>SIMS - GERENCIADOR ADMINISTRATIVO DE PESSOAL</title>
    <link rel="STYLESHEET" type="text/css" href="http://10.152.16.34/sims/scripts/css.css">
</HEAD>
<body>
<table width="99%" height="99%" cellspacing="0" cellpadding="0" align="center" class="Borda2a">
    <tr>
        <td height="68" valign="top">
            <!-- cabeçalho - inicio -->

            <table width="100%" cellspacing="0" cellpadding="0" align="center" class="Borda3">
                <tr>
                    <td width="50" valign="middle" rowspan="2">
                    <img src="http://10.152.16.34/sims/img/sims22_p.png" width="186" height="49" border="0">
                    </td>
                    <td align="left" valign="middle" class="TituloBrancoG">&nbsp;SIMS - GERENCIADOR ADMINISTRATIVO DE PESSOAL</td>
                    <td></td>

                </tr>
                <tr>
                    <td height="20" align="left" class="Fonte5">&nbsp;Usuário Logado: admin</td>
                    <td align="right"><a href="http://10.152.16.34/sims/index.asp">Sair &raquo;</a>&nbsp;&nbsp;&nbsp;</td>
                </tr>
            </table>

            <!-- cabeçalho - fim -->
        </td>
    </tr>
    <tr>
        <td align="center" valign="top">

            <table width="100%" align="center">
                <tr>
                    <td valign="top">
                        <!-- MENU CADASTRO - INICIO -->
                            <table width="99%" height="99%" class="Borda2a" style="width: 100%;">
                            <tr>
                                <td class="Fundo12" height="20">CADASTRO</td>
                            </tr>
                            <tr>
                                <td valign="top">
                                  <p>

                                    &nbsp;<img src="http://10.152.16.34/sims/img/flecha1.gif" width="8" height="13" border="0" alt="">Prestador de Serviço <BR>


                                        &nbsp;  <a href="<?php echo base_url(); ?>Cracha">&raquo; Pesquisa por crachá</a> <br>


                                    &nbsp;  <a href="<?php echo base_url(); ?>Nome">&raquo; Pesquisa por nome</a> <br>

                                    <br>


                                  </p>
                              </td>
                            </tr>
                        </table>

                        <!-- MENU CADASTRO - FIM -->
                    </td>



                        <!-- MENU CONSULTAS - FIM -->
                    </td>

                                    <br>

                                    <br>
                                    <table width="99%" class="Borda2">

            <table class="Borda2" border="0" cellpadding="1" cellspacing="1" align="left" style="width: 100%;">
                <tbody><tr style="background:#006699; color:#FFFFFF" align="center">
                    <td height="25px"><strong>Prestador</strong></td>
                    <td height="25px"><strong>Solicitante</strong></td>
                    <td height="25px"><strong>Data Final</strong></td>
                    <td height="25px"><strong>Crachá</strong></td>
                    <td height="25px"><strong>Devolveu o crachá?</strong></td>
                    <td height="25px"><strong>Ações</strong></td>
                </tr>
                <?php foreach($prestadores as $prestador): ?>
                <tr>
                    <td class="BordaSuperior1">
                        <img src="http://10.152.16.34/sims/img/pessoa1.gif" alt="" width="12" border="0" height="12">
                        <a href="" class="FonteAzul">&nbsp;<?php echo $prestador->pesesnome; ?>&nbsp;</a>
                    </td>
                    <td class="BordaSuperior1" align="center">
                    <strong><?php echo $prestador->pesessolicitante; ?></strong>
                    </td>
                    <td class="BordaSuperior1" align="center">
                    <strong><?php echo date('d/m/Y', strtotime($prestador->pesesdatafinal)); ?></strong>
                    </td>
                    <td class="BordaSuperior1" align="center">
                       <strong><?php echo $prestador->crachaid; ?></strong>
                    </td>
                    <td class="BordaSuperior1" align="center">
                        <?php

                            if($prestador->crachadevolvido == 1){
                                echo "<strong style='color:green;'>SIM</strong>";
                            }elseif($prestador->crachadevolvido == 0){
                                echo "<strong style='color:red;'>NÃO</strong>";
                            }

                        ?>
                    </td>
                    <td class="BordaSuperior1" align="center">
                       <?php

                            if($prestador->crachadevolvido == 1){
                                echo "<a href='".base_url()."Nome/ativa/".$prestador->crachaid."'>Reativar Crachá</a>";
                            }elseif($prestador->crachadevolvido == 0){
                                echo "<a href='".base_url()."Nome/desativa/".$prestador->crachaid."'>Desativar Crachá</a>";
                            }

                        ?> /
                        <a href="<?php echo base_url(); ?>Nome/validade_cracha/<?php echo $prestador->crachaid; ?>">Editar Validade</a>
                    </td>
                </tr>
                <?php endforeach ?>



            </tbody></table>

                                            </td>

                                            <br>
                                        </tr>
                                    </table>
</table>
                        <!-- MENU manutencao - FIM -->
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<body>

</body>
</html>
