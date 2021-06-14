<?php
namespace chillerlan\QRCodeExamples;
use chillerlan\QRCode\{QRCode, QROptions};

require_once './vendor/autoload.php';

session_start();
include('verifica_login.php');
include('conexao.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pagamento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
    a{
      text-decoration: none;
    }

    button#clip_btn{
      color: #fff;
      font-weight: bold;
      padding: 10px;
      font-size: 16px;
      border-radius: 10px;
      background-color: #24E945;
    }
    div#bolota textarea{
      position: relative;
      color: #fff;
      width: 0px;
      height: 0px;
      background-color: #fff;
      border: solid 0px #fff;
   }
   textarea::selection {
    color: #ff0000;
   }

   div#btn4 {
    background-color: #5165B7;
    border: 0px;
    padding: 10px;
    width: 20em;
    position: relative;
    text-align: center;
    color: #fff;
    font-weight: bold;
    border-radius: 10px;
    height: 40px;
    line-height: 40px;
   }
  </style>
</head>
<body>
<center>



<?php
$idevento = $_GET['idevento'];
$iduser = $_GET['iduser'];




$query_nomeuser = "SELECT nic_name, cod_pix FROM inscricao WHERE usuario_idusuario = $iduser AND evento_idevento = $idevento;";
$usuarionome = mysqli_query($conexao, $query_nomeuser);
$row_usuarionome = mysqli_fetch_assoc($usuarionome);

//echo "<h1>".$row_usuarionome['nome_evento']."</h1>";

    $query_nic_and_cod = "SELECT valor FROM evento WHERE idevento = $idevento";
    $nic_and_cod = mysqli_query($conexao, $query_nic_and_cod);
    $row_nic_and_cod = mysqli_fetch_assoc($nic_and_cod);






$chave_pix = '88377407-39ab-442d-b621-80ebed5992e7';
$descricao = $row_usuarionome['nic_name']." - ".$row_usuarionome['cod_pix'];
$valor_pix = $row_nic_and_cod['valor'].'.00';
$cidade_pix = 'MARABA';
$identificador = $row_usuarionome['cod_pix'];
$beneficiario_pix = 'AlcimarOliveiradeCarva';

   include "funcoes_pix.php";
   $px[00]="01"; //Payload Format Indicator, Obrigatório, valor fixo: 01
   // Se o QR Code for para pagamento único (só puder ser utilizado uma vez), descomente a linha a seguir.
   //$px[01]="12"; //Se o valor 12 estiver presente, significa que o BR Code só pode ser utilizado uma vez. 
   $px[26][00]="BR.GOV.BCB.PIX"; //Indica arranjo específico; “00” (GUI) obrigatório e valor fixo: br.gov.bcb.pix
   $px[26][01]=$chave_pix;
   if (!empty($descricao)) {
      $tam_max_descr=99-(4+4+4+14+strlen($chave_pix));
      if (strlen($descricao) > $tam_max_descr) {
         $descricao=substr($descricao,0,$tam_max_descr);
      }
      $px[26][02]=$descricao;
   }
   $px[52]="0000"; //Merchant Category Code “0000” ou MCC ISO18245
   $px[53]="986"; //Moeda, “986” = BRL: real brasileiro - ISO4217
   $px[54]=$valor_pix;
   $px[58]="BR"; //“BR” – Código de país ISO3166-1 alpha 2
   $px[59]=$beneficiario_pix; //Nome do beneficiário/recebedor. Máximo: 25 caracteres.
   $px[60]=$cidade_pix; //Nome cidade onde é efetuada a transação. Máximo 15 caracteres.
   $px[62][05]=$identificador;
   $px[62][50][00]="BR.GOV.BCB.BRCODE"; //Payment system specific template - GUI
   $px[62][50][01]="1.0.0"; //Payment system specific template - versão
   $pix=montaPix($px);
   $pix.="6304"; //Adiciona o campo do CRC no fim da linha do pix.
   $pix.=crcChecksum($pix); //Calcula o checksum CRC16 e acrescenta ao final.

   /*echo $pix;*/

echo "<p>R$ ".$row_nic_and_cod['valor'].",00<p>";

echo '<br><img src="'.(new QRCode)->render($pix).'" alt="QR Code" /><br>';


?>

<!-- <h3>Linha do Pix (copia e cola):</h3> -->
   <div class="row">
      <div class="col">
      <div id="tampa">
         <div id="bolota">
      <textarea class="text-monospace" id="brcodepix" rows="sdgfy ffgydefg ysd" onclick="copiar()"><?= $pix;?></textarea>
       <!-- <input id="brcodepix" type="hidden" name="custId" value="<?php echo $pix; ?>"> -->
         </div>
       </div>
      </div>
      <div class="col md-1">
      <p><button type="button" id="clip_btn" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Copiar código pix" onclick="copiar()"><i class="fas fa-clipboard">Copiar para área de transferência</i></button></p>
      </div>
   </div><br><br><br>

   Para ter uma confirmação mais rápida envie o comprovante via Discord:

   <a href="https://discord.gg/3CxyFvdr"><div id='btn4'><img src='https://cdn.icon-icons.com/icons2/2224/PNG/512/discord_logo_icon_134445.png' width='43px' style="position: relative; float: left;"> Entar no servidor do Discord</div></a>

   <script type="text/javascript">
      function copiar() {
  var copyText = document.getElementById("brcodepix");
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */
  document.execCommand("copy");
  document.getElementById("clip_btn").innerHTML='<i class="fas fa-clipboard-check">Copiado</i>';
}
   </script>


</center>


   </body>
</html>