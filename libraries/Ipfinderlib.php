<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use ipfinder\ipfinder\IPfinder;
use ipfinder\ipfinder\Exception\IPfinderException;
use ipfinder\ipfinder\Validation\Asnvalidation;
use ipfinder\ipfinder\Validation\Ipvalidation;
use ipfinder\ipfinder\Validation\Tokenvalidation;
use ipfinder\ipfinder\Validation\Firewallvalidation;
use ipfinder\ipfinder\Validation\Domainvalidation;

/**
 * Main class
 */
class Ipfinderlib
{

	public $ipfinder;

	/**
	 * construct
	 * @param array $params   TOKEN|PROXY
	 */
	public function __construct(array $params)
	{

		if (!class_exists('\\ipfinder\\ipfinder\\IPfinder')) {
		  throw new IPfinderException("Please install ipfinder/ipfinder with  ```composer require ipfinder/ipfinder```");
		}
		if ($params['token'] === NULL && $params['proxy'] === NULL) {
			$this->ipfinder = new IPfinder(NULL,NULL);
			
		} else {
			$this->ipfinder = new IPfinder($params['token'],$params['proxy']);
		}
	}
    /**
     * Get details for an Your IP address.
     * @return Your IP address data.
     */
    public function Authentication()
    {
        return $this->ipfinder->call();
    }
    /**
     * Get details for an IP address.
     * @param string $path IP address.
     * @return IP address data.
     * @throws IPfinderException
     */
    public function getAddressInfo(string $path)
    {

        Ipvalidation::validate($path);
        return $this->ipfinder->call($path);
    }
    /**
     * Get details for an AS number.
     * @param string $path AS number.
     * @return AS number data.
     * @throws IPfinderException
     */
    public function getAsn(string $path)
    {
        Asnvalidation::validate($path);
        return $this->ipfinder->call($path);
    }
    /**
     * Get details for an API Token .
     * @param string $path IP address.
     * @return The Token data.
     */
    public function getStatus()
    {
        return $this->ipfinder->call($this->ipfinder::STATUS_PATH);
    }
    /**
     * Get details for an Organization name.
     * @param string $path Organization name.
     * @return Organization name data.
     */
    public function getRanges(string $path)
    {
        $this->urlencode = rawurlencode($path);

        return $this->ipfinder->call($this->ipfinder::RANGES_PATH .  $this->urlencode);
    }
    /**
     * Get Firewall data
     * @param string $path     AS number, alpha-2 country only.
     * @param string $formats  list formats supported
     * @return Firewall data.
     * @throws IPfinderException
     */
    public function getFirewall(string $path, string $formats)
    {
        Firewallvalidation::validate($path, $formats);
        return $this->ipfinder->call($this->ipfinder::FIREWALL_PATH . $path, $formats);
    }
    /**
     * Get Domain IP
     * @param  string $path The API supports passing in a single website name domain name
     * @return Domain to IP data.
     * @throws IPfinderException
     */
    public function getDomain(string $path)
    {
        Domainvalidation::validate($path);
        return $this->ipfinder->call($this->ipfinder::DOMAIN_PATH .$path);
    }
    /**
     * Get Domain IP history
     * @param  sting  $path The API supports passing in a single website name domain name
     * @return Domain History data.
     * @throws IPfinderException
     */
    public function getDomainHistory(string $path)
    {
        Domainvalidation::validate($path);
        return $this->ipfinder->call($this->ipfinder::DOMAIN_H_PATH .$path);
    }
    /**
     * Get list Domain By ASN, Country,Ranges
     * @param  string $by The API supports passing in a single ASN,Country,Ranges
     * @return Get list Domain By ASN, Country,Ranges
     */
    public function getDomainBy(string $by)
    {
        return $this->ipfinder->call($this->ipfinder::DOMAIN_BY_PATH .$by);
    }
}
