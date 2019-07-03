## CodeIgniter IPFinder Library
The official CodeIgniter IPFinder Library for the [IPFinder.io](https://ipfinder.io) get details for :
-  IP address details
-  ASN  details
-  Firewall details
-  IP Address Ranges details
-  Domain details
-  Domain history details
-  Domain list details
-  TOKEN details

## Installation

### Via composer

```shell
composer require ipfinder-io/codeigniter
```

### Manually

Download the [latest release](https://github.com/ipfinder-io/codeigniter-ipfinder/releases).

And installing IPFinder PHP Client Library using Composer:
```shell
composer require ipfinder/ipfinder
```
> set your $config['composer_autoload'] = vendor/autoload.php on application/config/config.php on line 139

And upload `controllers` and `libraries`  to CondeIngniter `application` folder


## How to Use
Use following codes in your application simple:
```php
// Load Dependencies
$this->load->library('ipfinderlib',array('token' => 'YOUR_TOKEN_GOES_HERE','proxy' => NULL));
```

## example Code

run the sample code by using :

`<your_domain>/index.php/IFinder/auth` Get details for an Your IP address.
`<your_domain>/index.php/IFinder/ip/<IPV4|IPV6>`  Get details for an IP address.
`<your_domain>/index.php/IFinder/asn/<AS84874|as84874>` Get details for an AS number.
`<your_domain>/index.php/IFinder/as1/nginx_deny` Get Firewall data
`<your_domain>/index.php/IFinder/domain/<domain name>` Get  Domain IP
`<your_domain>/index.php/IFinder/status`  Get details for an API Token .

Sample codes under **controllers/IFinder.php** file.

## List methods

| Name             |  Description
| ---------------  | ----------- |
| Authentication   | Get details for an Your IP address.
| getAddressInfo   | Get details for an IP address. e.x(`1.1.1.1`)
| getAsn           | Get details for an AS number.  e.x(`AS1`)
| getStatus        |  Get details for an API Token .
| getRanges        | Get details for an Organization name. e.x(`Telecom Algeria`)
| getFirewall      | Get Firewall data e.x(`AS1`,`nginx_deny`)
| getDomain        | Get Domain IP e.x(`google.com`)
| getDomainHistory | Get Domain IP history e.x(`google.com`)
| getDomainBy      | Get list Domain By ASN, Country,Ranges e.x(`DZ,FR`)



## other

- See the [IPFidner documentation](https://ipfinder.io/docs).
- See the [IPFinder PHP Client Library](hhttps://github.com/ipfinder-io/ip-finder-php).

## License

----
[![GitHub license](https://img.shields.io/github.com/ipfinder-io/codeigniter-ipfinder.svg)](https://github.com/ipfinder-io/codeigniter-ipfinder/blob/master/LICENSE)
