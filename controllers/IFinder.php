<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IFinder extends CI_Controller {

 	 function __construct()
	{
		parent::__construct();

		// token and proxy
		$params = array(
			'token' => NULL, // user null for 'free' API
			'proxy' => NULL // your proxy
		);

		// Load Dependencies
		$this->load->library('ipfinderlib', $params);
	}

	 function auth()
	{
		$data = $this->ipfinderlib->Authentication(); // Object instances will always be lower case
		var_dump($data);
	}
	 function ip(string $ip)
	{
		$data = $this->ipfinderlib->getAddressInfo($ip);
		var_dump($data);
	}

	 function status()
	{
		$data = $this->ipfinderlib->getStatus();
		var_dump($data);
	}

	 function ranges()
	{
		$org = 'AT&T Services, Inc.';
		$data = $this->ipfinderlib->getRanges($org);
		var_dump($data);
	}

	 function firewall( $by,  $format)
	{
		$data = $this->ipfinderlib->getFirewall($by,$format);
		
		echo $data;
	}
	 function domain( $name)
	{
		$data = $this->ipfinderlib->getDomain($name);
		var_dump($data);
	}

	 function domainhistory( $name)
	{
		$data = $this->ipfinderlib->getDomainHistory($name);
		echo "<pre>";
		var_export($data);
		echo "<pre>";
	}


	 function domainlist( $by)
	{
		$data = $this->ipfinderlib->getDomainBy($by);
		echo "<pre>";
		var_export($data);
		echo "<pre>";
	}

	 function asn( $asn)
	{
		$data = $this->ipfinderlib->getAsn($asn);
		var_dump($data);
	}

}
