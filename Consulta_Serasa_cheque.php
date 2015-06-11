<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

require_once "sws_extensao.php";
require_once "sws_serasa_cheque.php";

$credenciais = new Credenciais();
$credenciais->Email = 'seu email aqui';
$credenciais->Senha = 'sua senha aqui';


// dados ficticios para consulta em ambiente de testes
$Cheque = new Cheque();
$Cheque->Credenciais = $credenciais;
$Cheque->Documento = "11111111111";
$Cheque->Banco = "341";
$Cheque->Agencia = "3095";
$Cheque->ContaCorrente = "156416";
$Cheque->NumeroChequeInicial = "5-1";
$Cheque->NumeroChequeFinal = "9-4";
$serasa = new SERASA();


// serializando em object class
//print_r($serasa->getSerasaCheque($Cheque));

// serializando em json

$Cheque = $serasa->getSerasaCheque($Cheque);
//echo json_encode ($serasa->getSerasaCheque($Cheque));


print_r($Cheque->ChequeResult);

echo '<pre>';
echo '<br />';
echo '--------------------------------------------------------------------------------------------------------' . '<br />';
echo 'Sintese Cadastral' . '<br />';
echo '--------------------------------------------------------------------------------------------------------' . '<br />';
echo '<br />';
echo 'Documento: ' . $Cheque->ChequeResult->SinteseCadastral->Documento . '<br />';
echo 'Nome: ' . $Cheque->ChequeResult->SinteseCadastral->Nome . '<br />';
echo 'NomeMae: ' . $Cheque->ChequeResult->SinteseCadastral->NomeMae . '<br />';
echo 'DataNascimento: ' . $Cheque->ChequeResult->SinteseCadastral->DataNascimento . '<br />';
echo '<br />';
echo '--------------------------------------------------------------------------------------------------------' . '<br />';
echo 'Agencia Bancaria' . '<br />';
echo '--------------------------------------------------------------------------------------------------------' . '<br />';
echo '<br />';
echo 'Nome Agencia Bancaria: ' . $Cheque->ChequeResult->AgenciaBancaria->AgenciaBancariaResumo->NomeAgencia . '<br />';
echo '<br />';
echo '--------------------------------------------------------------------------------------------------------' . '<br />';
echo 'Pendencias Financeiras' . '<br />';
echo '--------------------------------------------------------------------------------------------------------' . '<br />';
echo '<br />';
echo 'TotalOcorrencias: ' . $Cheque->ChequeResult->PendenciasFinanceiras->TotalOcorrencias . '<br />';
echo 'Mensagem: ' . $Cheque->ChequeResult->PendenciasFinanceiras->Mensagem . '<br /><br />';
echo '<br />';

if ($Cheque->ChequeResult->PendenciasFinanceiras->TotalOcorrencias != '0') {
    foreach ($Cheque->ChequeResult->PendenciasFinanceiras->PendenciasFinanceirasDetalhe as $PendenciasFinanceirasDetalhe) {
        echo 'Data Ocorrencia: ' . $PendenciasFinanceirasDetalhe->DataOcorrencia . '<br />';
        echo 'Valor: ' . $PendenciasFinanceirasDetalhe->Valor . '<br />';
    }
}
echo '</pre>';


//echo json_encode ($Cheque);
//print_r($Cheque->ChequeResult);
?>
