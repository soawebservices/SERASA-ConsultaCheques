<?php

class SERASA extends WebService {

	/* URL de Test-Drive */
	const URI_LOCATION = 'http://www.soawebservices.com.br/webservices/test-drive/serasa/cheques.asmx';
	const URI_LOCATION_WSDL = 'http://www.soawebservices.com.br/webservices/test-drive/serasa/cheques.asmx?WSDL';
	
	/* URL de Producao */
	/*
	 * const URI_LOCATION = 'http://www.soawebservices.com.br/webservices/producao/serasa/Cheque.asmx';
	 * const URI_LOCATION_WSDL = 'http://www.soawebservices.com.br/webservices/producao/serasa/Cheque.asmx?WSDL';
	 */
	private $_traceEnabled = 1;
	public function __construct() {
		$options = array (
				'location' => SERASA::URI_LOCATION,
				'trace' => $this->_traceEnabled,
				'style' => SOAP_RPC,
				'use' => SOAP_ENCODED 
		);
		
		parent::__construct ( SERASA::URI_LOCATION_WSDL, $options );
	}
	
	/*
	 *
	 *
	 */
	public function getSerasaCheque(Cheque $Cheque) 
	{
		//print_r($Cheque);
		$result = $this->callMethod('Cheque', array('parameters' => Util::objectToArray($Cheque)));
        //print_r($result);
		//$retorno = Util::arrayToObject( $result->{$this->getLastCalledMethod() . 'Result'}, $Cheque );
		$retorno = $result;
		return $retorno;
	}
}
class Credenciais {
	public $Email;
	public $Senha;
}


class Cheque extends ClassMap {
	public $SinteseCadastral;
	public $AlertadeDocumentos;
	public $ChequesResumo;
	public $PendenciasInternas;
	public $PendenciasFinanceiras;
	public $PendenciasBacen;
	public $Contumacias;
	public $Historicos;
	public $AgenciaBancaria;
	public $TotalOcorrencias;
	public $Mensagem;
	public $Status;
	function __construct() {
		parent::__construct ( array (
				'SinteseCadastral' => 'SinteseCadastral',
				'AlertaDocumentos' => 'AlertaDocumentos',
				'ChequesResumo' => 'ChequesResumo',
				'PendenciasInternas' => 'PendenciasInternas',
				'PendenciasFinanceiras' => 'PendenciasFinanceiras',
				'PendenciasBacen' => 'PendenciasBacen',
				'Contumacias' => 'Contumacias',
				'Historicos' => 'Historicos',
				'AgenciaBancaria' => 'AgenciaBancaria',
				'TotalOcorrencias' => 'string',
				'Mensagem' => 'string',
				'Status' => 'boolean' 
		) );
	}
}
class SinteseCadastral extends ClassMap {
	public $Documento;
	public $Nome;
	public $NomeMae;
	public $DataNascimento;
	public $SituacaoRFB;
	public $SituacaoDescricaoRFB;
	public $DataSituacaoRFB;
	function __construct() {
		parent::__construct ( array (
				'Documento' => 'string',
				'Nome' => 'string',
				'NomeMae' => 'string',
				'DataNascimento' => 'string',
				'SituacaoRFB' => 'string',
				'SituacaoDescricaoRFB' => 'string',
				'DataSituacaoRFB' => 'string' 
		) );
	}
}
class AlertadeDocumentos extends ClassMap {
	public $NumeroMensagem;
	public $TotalMensagens;
	public $TipoDocumento;
	public $NumeroDocumento;
	public $MotivoOcorrencia;
	public $DataOcorrencia;
	public $TelefonesContato;
	public $Mensagem;
	function __construct() {
		parent::__construct ( array (
				'NumeroMensagem' => 'string',
				'TotalMensagens' => 'string',
				'TipoDocumento' => 'string',
				'NumeroDocumento' => 'string',
				'MotivoOcorrencia' => 'string',
				'DataOcorrencia' => 'string',
				'TelefonesContato' => 'TelefonesContato',
				'Mensagem' => 'string' 
		) );
	}
}
class TelefonesContato extends ClassMap {
	public $TelefonesContato;
	function __construct() { 
	parent::__construct ( array (
				'TelefonesContato' => 'string'
				) );
	}
}
class ChequesResumo extends ClassMap {
	public $TotalOcorrencias;
	public $NomeFantasiaBanco;
	public $Mensagem;
	public $ChequeDetalhe;
	function __construct() {
		parent::__construct ( array (
				'TotalOcorrencias' => 'string',
				'NomeFantasiaBanco' => 'string',
				'Mensagem' => 'string',
				'ChequeDetalhe' => 'ChequeDetalhe' 
		) );
	}
}
class ChequeDetalhe extends ClassMap {
	public $ChequeDetalhe;
	function __construct() {
		parent::__construct ( array (
				'ChequeDetalhe ' => 'string' 
		) );
	}
}
class PendenciasInternas extends ClassMap {
	public $TotalOcorrencias;
	public $OcorrenciaMaisAntiga;
	public $OcorrenciaMaisRecente;
	public $ValorTotalOcorrencias;
	public $PendenciasIternasDetalhe;
	function __construct() {
		parent::__construct ( array (
				'TotalOcorrencias' => 'string',
				'OcorrenciaMaisAntiga' => 'string',
				'OcorrenciaMaisRecente' => 'string',
				'ValorTotalOcorrencias' => 'ChequeDetalhe',
				'PendenciasIternasDetalhe' => 'PendenciasIternasDetalhe' 
		) );
	}
}
class PendenciasIternasDetalhe extends ClassMap {
	public $ChequeDetalhe;
	function __construct() {
		parent::__construct ( array (
				'PendenciasIternasDetalhe ' => 'string' 
		) );
	}
}
class PendenciasFinanceiras extends ClassMap {
	public $TotalOcorrencias;
	public $OcorrenciaMaisAntiga;
	public $OcorrenciaMaisRecente;
	public $ValorTotalOcorrencias;
	public $PendenciasFinanceirasDetalhe;
	function __construct() {
		parent::__construct ( array (
				'TotalOcorrencias' => 'string',
				'OcorrenciaMaisAntiga' => 'string',
				'OcorrenciaMaisRecente' => 'string',
				'ValorTotalOcorrencias' => 'ChequeDetalhe',
				'PendenciasFinanceirasDetalhe ' => 'PendenciasFinanceirasDetalhe'
		) );
	}
}
class PendenciasFinanceirasDetalhe extends ClassMap {

    public $DataOcorrencia;
    public $Modalidade;
    public $Avalista;
    public $TipoMoeda;
    public $Valor;
    public $Contrato;
    public $Origem;
    public $Sigla;
    public $SubJudice;
    public $SubJudiceDescricao;
    public $TipoAnotacao;

    function __construct() {
		parent::__construct ( array (
            'DataOcorrencia' => 'string',
            'Modalidade' => 'string',
            'Avalista' => 'string',
            'TipoMoeda' => 'string',
            'Valor' => 'string',
            'Contrato' => 'string',
            'Origem' => 'string',
            'Sigla' => 'string',
            'SubJudice' => 'string',
            'SubJudiceDescricao' => 'string',
            'TipoAnotacao' => 'string'
        ) );
	}
}
class PendenciasBacen extends ClassMap {
	public $TotalOcorrencias;
	public $OcorrenciaMaisAntiga;
	public $OcorrenciaMaisRecente;
	public $Banco;
	public $Agencia;
	public $NomeFantasiaBanco;
	public $PendenciasBacenDetalhe;
	public $Mensagem;
	function __construct() {
		parent::__construct ( array (
				'TotalOcorrencias' => 'string',
				'OcorrenciaMaisAntiga' => 'string',
				'OcorrenciaMaisRecente' => 'string',
				'Banco' => 'string',
				'Agencia ' => 'string ',
				'NomeFantasiaBanco ' => 'string ',
				'PendenciasBacenDetalhe ' => 'PendenciasBacenDetalhe ',
				'Mensagem ' => 'string ' 
		) );
	}
}
class PendenciasBacenDetalhe extends ClassMap {
	public $PendenciasBacenDetalhe;
	function __construct() {
		parent::__construct ( array (
				'PendenciasBacenDetalhe  ' => 'string' 
		) );
	}
}
class Contumacias extends ClassMap {
	public $ConsumaciaResumo;
	public $ContumaciaDetalhe;
	public $Mensagem;
	function __construct() {
		parent::__construct ( array (
				'ConsumaciaResumo' => 'ConsumaciaResumo',
				'ContumaciaDetalhe' => 'ContumaciaDetalhe',
				'Mensagem' => 'string' 
		) );
	}
}
class ConsumaciaResumo extends ClassMap {
	public $TotalOcorrencias;
	public $OcorrenciaMaisAntiga;
	public $OcorrenciaMaisRecente;
	public $ContumaciaDetalhe;
	public $Mensagem;
	function __construct() {
		parent::__construct ( array (
				'TotalOcorrencias' => 'string',
				'OcorrenciaMaisAntiga' => 'string',
				'OcorrenciaMaisRecente' => 'string',
				'ContumaciaDetalhe' => 'string',
				'Mensagem' => 'string' 
		) );
	}
}
class ContumaciaDetalhe extends ClassMap {
	public $ContumaciaDetalhe;
	function __construct() {
		parent::__construct ( array (
				'ContumaciaDetalhe  ' => 'string' 
		) );
	}
}
class Historicos extends ClassMap {
	public $Resumo;
	public $DadosCadastrais;
	public $ContaCorrente;
	public $Mensagem;
	function __construct() {
		parent::__construct ( array (
				'Resumo' => 'Resumo',
				'DadosCadastrais' => 'DadosCadastrais',
				'ContaCorrente' => 'ContaCorrente',
				'Mensagem' => 'string' 
		) );
	}
}
class Resumo extends ClassMap {
	public $NumeroCheque;
	public $TotalConsultasCheque;
	public $DataConsultaMaisAntiga;
	public $DataConsultaMaisRecente;
	public $UltimaEmpresaConsultante;
	public $QuantidadeDadoCadastral;
	public $QuantidadeContaCorrente;
	function __construct() {
		parent::__construct ( array (
				'NumeroCheque' => 'string',
				'TotalConsultasCheque' => 'string',
				'DataConsultaMaisAntiga' => 'string',
				'DataConsultaMaisRecente' => 'string',
				'UltimaEmpresaConsultante' => 'string',
				'QuantidadeDadoCadastral' => 'int',
				'QuantidadeContaCorrente' => 'int' 
		) );
	}
}
class DadosCadastrais extends ClassMap {
	public $DadosCadastrais;
	function __construct() {
		parent::__construct ( array (
				'DadosCadastrais  ' => 'string' 
		) );
	}
}
class ContaCorrente extends ClassMap {
	public $HistoricoContaCorrente;
	function __construct() {
		parent::__construct ( array (
				'HistoricoContaCorrente' => 'string' 
		) );
	}
}
class AgenciaBancaria extends ClassMap {
	public $AgenciaBancariaResumo;
	public $AgenciaBancariaEndereco;
	public $Mensagem;
	function __construct() {
		parent::__construct ( array (
				'AgenciaBancariaResumo' => 'AgenciaBancariaResumo',
				'AgenciaBancariaEndereco' => 'AgenciaBancariaEndereco',
				'Mensagem' => 'string' 
		) );
	}
}
class AgenciaBancariaResumo extends ClassMap {
	public $NomeAgencia;
	public $DataUltimaAtualizacao;
	public $Fone;
	public $Fax;
	function __construct() {
		parent::__construct ( array (
				'NomeAgencia' => 'string',
				'DataUltimaAtualizacao' => 'string',
				'Fone' => 'string',
				'Fax' => 'string' 
		) );
	}
}
class AgenciaBancariaEndereco extends ClassMap {
	public $Logradouro;
	public $Cidade;
	public $Estado;
	function __construct() {
		parent::__construct ( array (
				'Logradouro' => 'string',
				'Cidade' => 'string',
				'Estado' => 'string' 
		) );
	}
}
?>
