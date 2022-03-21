<pre>

<?php
	$parametros = array();
    $parametros['nCdEmpresa'] = '';
	$parametros['sDsSenha'] = '';
    $parametros['sCepOrigem'] = '01128030';
	$parametros['sCepDestino'] = '38603300';
    $parametros['nVlPeso'] = '1';
    $parametros['nCdFormato'] = '1';
    $parametros['nVlComprimento'] = '16';
	$parametros['nVlAltura'] = '10';
	$parametros['nVlLargura'] = '10';
	$parametros['nVlDiametro'] = '0';
    $parametros['sCdMaoPropria'] = 's';
    $parametros['nVlValorDeclarado'] = '1500';
    $parametros['sCdAvisoRecebimento'] = 'n';
    $parametros['StrRetorno'] = 'xml';
    $parametros['nCdServico'] = '41106';
	
	
	$parametros = http_build_query($parametros);
	$url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
	$curl = curl_init($url.'?'.$parametros);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$dados = curl_exec($curl);
	$dados = simplexml_load_string($dados);
    print_r($dados);
	
	foreach($dados->cServico as $linhas) {
		if($linhas->Erro == 0) {
			echo $linhas->Codigo.'</br>';
			echo $linhas->Valor .'</br>';
			echo $linhas->PrazoEntrega.' Dias </br>';
		}else {
			echo $linhas->MsgErro;
		}
		echo '<hr>';
	}

	function get_endereco($cep){


		// formatar o cep removendo caracteres nao numericos
		$cep = preg_replace("/[^0-9]/", "", $cep);
		$url = "http://viacep.com.br/ws/$cep/xml/";
	  
		$xml = simplexml_load_file($url);
		return $xml;
	}

	print_r(get_endereco("38603300"));
	echo '<hr>'; 
	echo time();
?>