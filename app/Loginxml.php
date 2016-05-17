<?php
namespace App;

//require('soap-wsse.php');
//require_once('constant.php');
define("LOCATION","https://websrv-beta.utsc.utoronto.ca:8443/axis2/services/UtorService");
//define("LOCATION","https://websrv.utsc.utoronto.ca:8443/axis2/services/PHPService");
define("WSDL", LOCATION."?wsdl");
use SoapClient;

$IsError = true;
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~ CUSTOM CLASS REQUIRED ~~~~~~~~~~~~~~~~~~~
class mySoap extends SoapClient
{
	var $username=null;
	var $pwd=null;

	function SetUserNamePwd($username,$pwd)
	{
		$this->username = $username;
		$this->pwd = $pwd;
	}

	function __doRequest($request, $location, $saction, $version,$one_way = NULL)
	{

		if (isset($this->username))
		{
			$doc = new DOMDocument();
			$doc->loadXML($request);
			$objWSSE = new WSSESoap($doc);
			$objWSSE->addUserToken($this->username, $this->pwd, true);
			$objWSSE->addTimestamp();
			$request = $objWSSE->saveXML();
		}

		return parent::__doRequest($request, $location, $saction, $version,$one_way);
	}
}

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~ INTERFACES  ~~~~~~~~~~~~~~~~~~~
class CgetProfile
{
	public $accountID;
}


//~~~~~~~~~~~~~~~~~~~~~~~~~~~~ CUSTOM CLASS  ~~~~~~~~~~~~~~~~~~~
class Loginxml
{
	var $parameters;
	var $sClient;

	function loginxml()
	{
//		var_dump(phpinfo());
//		die();
		$this->sClient = new mySoap(
			WSDL,
			array('classmap' => array("location" => LOCATION, 'GetProfile' => "CgetProfile"))
		);

		$this->parameters = new CgetProfile;


		//$this->sClient->SetUserNamePwd("wsuser","test");
	}

	function getProfile($account)
	{
		try {
			$this->parameters->accountID = $account."@utor";
			$result = $this->sClient->GetProfile($this->parameters);
//			var_dump($result->return->email);
			return $result;
		} catch (SoapFault $e) {
			var_dump($e);
		}


	}

	function getProfileBarcode($account)
	{
		try {
			$this->parameters->accountID = $account;
			$result = $this->sClient->GetProfile($this->parameters);
//			var_dump($result->return->email);
			return $result;
		} catch (SoapFault $e) {
			var_dump($e);
		}


	}


}
