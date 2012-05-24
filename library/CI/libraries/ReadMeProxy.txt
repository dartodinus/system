Proxy Library [Version 1.0.7] (CodeIgniter Proxy Library)

Advance HTTP scripting that worked as simulated browser. This class enables you to make call to internal and external site with general HTTP request by opening a socket connection to the remote host. No cURL or other fancy stuff dependencies, pure PHP.

PACKAGE :
ProxyLibrary_v1.0.7

CATEGORY :
Libraries

AUTHOR :
Taufan Aditya A.K.A Toopay (Profile link at http://codeigniter.com/forums/member/228062/)

LICENSE :
GPL

FEATURES :
1. Support all HTTP method (GET, POST, PUT, DELETE) [NEW].
2. Support custom HTTP header, and basic HTTP Authorization [NEW].
3. Get Full HTTP Header.
4. Get Full HTTP Response (Content).
5. Get Crawled web content.
6. Google Geocoding Functionality [NEW].
7. Maintained css path, js path, image, anchor tag and form at rendered option.
8. Set Proxy Call support.
9. Set Delay HTTP Call support.
10. Set User Agent (Browser Identity)  support.
11. Internal cache (using gzip).
12. Persistent Call (processing redirect, either from header or meta)
13. NO NEED FANCY CURL STUFF DEPEDENCIES! PURE PHP.
14. Cookie support.
15. Log and error flag.

REQUIREMENT AND INSTALATION :
1. You must have CodeIgniter installed, first.
2. Working fine from CI version 1.7.2 to 2.0.2
3. PHP 5.x
4. Put Proxy.php under './application/libraries/'

HOW TO USE :
1. Simple way to use this library. In any controller, put this line...
/* Code Start */
$this->load->library('proxy');
$this->proxy->site('http://codeigniter.com',TRUE);
/* Code End */

2. Above example will give you rendered page of CodeIgniter site, if you didn't want to render it directly, or it was a json which you want to save to var, simply do this...
/* Code Start */
$this->load->library('proxy');
//$ip = your ip variable ex: '202.134.0.15'
$json_var = $this->proxy->site('http://ip2country.sourceforge.net/ip2c.php?ip='.$ip.'&format=JSON');
/* Code End */

3. Get crawled page of CodeIgniter Forums...
/* Code Start */
$this->load->library('proxy');
$this->proxy->crawl('codeigniter.com/forums',TRUE);
/* Code End */

4. Get Geocoding Responses from Google Maps Service (http://code.google.com/intl/id-ID/apis/maps/documentation/geocoding/)...
/* Code Start */
$this->load->library('proxy');
// Generate json response by address
$this->proxy->geocode('1600 Amphitheatre Parkway, Mountain View, CA');
// Generate json response by latlng
$this->proxy->geocode(array('40.714224','-73.961452'));
// Generate xml response by latlng and set sensor to TRUE
$this->proxy->geocode(array(40.714224,-73.961452),'XML',TRUE);
/* Code End */

5. To call your rendered controller (maybe in some situation, you need it instead use redirect() function)
/* Code Start */
$this->load->library('proxy');
$this->proxy->controller('your_target_controller_name/target_function/some_id', TRUE);
/* Code End */

6.Set proxy call
/* Code Start */
$this->load->library('proxy');
$this->proxy->set_proxy('proxy_host',80,'username','password');
$this->proxy->site('twitter.com',TRUE);
/* Code End */

7. Get HTTP header
/* Code Start */
$this->load->library('proxy');
// get rendered HTTP header of CodeIgniter site
$this->proxy->head('codeigniter.com',TRUE);
// for use it as variable, put FALSE on second passed param or simple let it blank
$site_httpheader = $this->proxy->head('codeigniter.com');
/* Code End */

8. Set delay call and user agent (browser identity).
/* Code Start */
$this->load->library('proxy');
$this->proxy->site('http://codeigniter.com',TRUE);
// set user agent and delay
$this->proxy->set_delay(5);
$this->proxy->set_useragent($this->session->userdata('user_agent'));
$this->proxy->site('twitter.com',TRUE); 
/* Code End */

8. HTTP (GET, POST, PUT, DELETE), REST and HTTP Authentfication.
/* [USAGE] Basic http structure : */
/* $this->proxy->http($method, $destination_url, $request_parameter, $request_header_parameter); */
// $method is HTTP method : 'GET', 'POST', 'PUT', 'DELETE'
// $destination_url is the full url. Proxy lib will automaticly find the host, so include the full url, not only the domain
// $request_parameter is array of your GET, POST, PUT or DELETE parameter. eg : array('id' => 1);
// $request_header_parameter is array of custom HTTP header, it can be API key, oauth stuff, or any of your needs. 
//     PS : For Basic HTTP Authorization, use : array('auth' => 'username:password'), as params
$this->proxy->http('POST', 'http://somesite.com/login.php', array('username' => 'username', 'password' => 'password'));
/* Code Start */
$this->load->library('proxy');
// An easy example performing basic 'POST' and get the result rendered. 
echo $this->proxy->http('POST', 'http://somesite.com/login.php', array('username' => 'username', 'password' => 'password'));
// Perform an API Call? here you go...
// An example of GET
$username = 'taufanaditya';
$tweets = $this->proxy->http('GET', 'http://twitter.com/statuses/user_timeline/'.$username.'.json');
// Already have your own REST, now you can perform a Rest Client Call, without cURL at all!
// An example of POST, with Basic HTTP Authentification
echo $this->proxy->http('POST', 'api.yourdomain.com/api/users', array('id' => 10, 'name' => 'Changed via Proxy'), array('auth' => 'username:password'));
// An example of PUT, with custom HTTP header (like API Key, or anything else)
$new_user = array(
	'name'             => 'John Doe',
	'username'         => 'johndoe',
	'email'            => 'johndoe@otherworlds.com',
	'password'         => 'secret',
	'confirm_password' => 'secret',
);
echo $this->proxy->http('PUT','api.yourdomain.com/api/users', $new_user, array('X-API-KEY' => 'fooandbarnotencrypted'));
// An example of DELETE, with custom HTTP header (like API Key, or anything else) by setting HTTP params
$new_user = array(
	'name'             => 'John Doe',
	'username'         => 'johndoe',
	'email'            => 'johndoe@otherworlds.com',
	'password'         => 'secret',
	'confirm_password' => 'secret',
);
$this->proxy->set_http(array(
		'head' => array('X-API-KEY' => 'fooandbarnotencrypted'),
		'body' => array('id' => 1),
	)
);
echo $this->proxy->http('DELETE','api.yourdomain.com/api/users');
/* Code End */