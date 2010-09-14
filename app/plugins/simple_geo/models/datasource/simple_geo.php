<?php

App::import('Vendor', 'SimpleGeo.HttpSocketOauth');

class SimpleGeo extends DataSource {
	
	static private $_days = array('mon', 'wed', 'tue', 'thu', 'fri', 
        'sat', 'sun');

    /**
     * Version of the API to use
     *
     * @var string $_version The version of the API to use
     */
    private $_version = '0.1';

    /**
     * Base URI of the API
     *
     * @var string $_api The base URI for the SimpleGeo API
     */
    private $_api = 'api.simplegeo.com';

    /**
     * OAuth client
     *
     * @var object $_oauth Instance of OAuth client
     * @see OAuthConsumer
     */
    private $_oauth = null;

    /**
     * API token
     *
     * @var string $_token OAuth token
     */
    private $_token;

    /**
     * API secret
     *
     * @var string $_secret OAuth secret
     */
    private $_secret;


	
	public function __construct($config) {
		$config['token'] = 'wKh7XbnNrZ556LUU94gRSZf5NvmPWmvr';
		$config['secret'] = 'Y6LYJXZmFaQUEp95taTVPWWeA86ZA3qY';
		$config['version'] = '0.1';
		
		
		$this->_oauth = new HttpSocketOauth();
		$this->_version = $config['version'];
		$this->_token = $config['token'];
		$this->_secret = $config['secret'];
		
		parent::__construct($config);
	}
	
	public function describe($model) {
		
	}
	
	public function listSources() {
		
	}
	
	public function read($model, $queryData = array()) {
		
	}
	
	public function create($model, $fields = array(), $values = array()) {
		
	}
	
	#public function update($model, $fields)
	
	public function delete($model, $id = null) {
		
	}
	
	public function getAddress($lat, $lon) {
		return $this->_sendRequest('/nearby/address/' . $lat .','. $lon.'.json');
	}
	
	public function getRecord($layer, $id) {
		return $this->_sendRequest('/records/' . $layer . DS . $id . '.json');
	}
	
	public function getRecords($layer, $ids) {
		return $this->_sendRequest('/records/' . $layer . DS . implode(',', $ids) . '.json');
	}
	
	public function getHistory($layer, $id, array $args = array()) {
		return $this->_sendRequest('/records/' . $layer . DS . $id . '/history.json', $args);
	}
	
	public function getNearby($layer, $arg, array $args = array()) {     
		return $this->_sendRequest('/records/' . $layer . DS . 'nearby' . DS . $arg . '.json', $args);
	}
	
	public function addRecord(SimpleGeo_Record $rec) {
		return $this->_sendRequestWithBody('/records/' . $rec->layer . DS .$rec->id . '.json', (string)$rec);
	}
	
	public function addRecords($layer, array $records) {
		$body = array(
			'type' => 'FeatureCollection',
			'features' => array()
		);
		
		foreach ($records as $rec) {
			if (!$rec instanceof SimpleGeo_Record) {
				$this->log(__FILE__ . " " . sprintf(__('Error: %s', true), __('Records must be instances of SimpleGeo_Record', true)));
				return;
			}
			$body['features'][] = $rec->toArray();
		}
		return $this->_sendRequestWithBody('/records/' . $layer . '.json', json_encode($body), "POST");
	}
	
	public function deleteRecord($layer, $id) {
		$result = $this->_sendRequest('/records/' . $layer . DS . $id . '.json', array(), 'DELETE');
		return ($result === null);
	}
	
	public function getContains($lat, $lon) {
		return $this->_sendRequest('/contains/' . $lat . ',' . $lon . '.json');
	}
	
	public function getOverlaps($south, $west, $north, $east, $args = array()) {
		return $this->_sendRequest('/overlaps/' . $south. ',' . $west . ',' . $north . ',' . $east .'.json', $args);
	}
	
	public function getBoundary($id) {
		return $this->_sendRequest('/boundary/' . $id . '.json');
	}
	
	public function getDensity($lat, $lon, $day = null, $hour = null) {
		if ($day === null) {
			$day = strtolower(date("D"));
		} elseif (!in_array($day, self::$_days)) {
			$this->log(sprintf(__('Error: %s', true), sprintf(__('%s in not a valid day of the week. Falling back to %s', true), $day, strtolower(date("D")))));
			$day = strtolower(date("D"));
		}
		
		// Default Endpoint
		$endpoint = '/density/' . $day . DS . $lat . ',' . $lon . '.json';
		
		if ($hour !== null) {
			if ($hour < 0 || $hour > 23) {
				$this->log(sprintf(__('Error: %s', true), __('Hour must be between 0 and 23.', true)));
			} else {
				$endpoint = '/density/' . $day . DS . $hour . DS . $lat . ',' . $lon . '.json';
			}
		}
		return $this->_sendRequest($endpoint);
	}
	

	

	
	private function _createRequest($endPoint, $args = array(), $method = 'GET') {
		$request = array(
			'uri' => array(
				'host' => $this->_api,
				'path' => $this->_getPath($endPoint),
				'query' => (!empty($args)?$args:''),
			),
			'method' => $method,
			'auth' => array(
				'method' => 'OAuth',
				'oauth_consumer_key' => $this->_token,
				'oauth_consumer_secret' => $this->_secret,
			)
		);
		return $request;
	}
	
	private function _sendRequestWithBody($endPoint, $body, $method = 'PUT') {

		$request = $this->_createRequest($endPoint, array(), $method);
		$request['body'] = $body;
		if (($result = $this->_oauth->request($request)) !== false) {
			if (!empty($this->_oauth->response['status']['code']) && 
				substr($this->_oauth->response['status']['code'], 0, 1) !== '2') {
					$body = @json_decode($result);
					$this->log(__FILE__ . " " . sprintf(__('Error: %s', true), $body->message));
					#$this->cakeError('error404', array('message' => $body->message, 'code' => $body->code));
			}
		}
		return $result;
	}

	private function _sendRequest($endPoint, $args = array(), $method = 'GET') {
			
		$request = $this->_createRequest($endPoint, $args, $method);
		if (($result = $this->_oauth->request($request)) !== false) {
			$body = @json_decode($result);
			if (!empty($this->_oauth->response['status']['code']) && 
				substr($this->_oauth->response['status']['code'], 0, 1) == '2') {
					return $body;
			} else {
				$this->log(__FILE__ . " " . sprintf(__('Error: %s', true), $body->message));
			}	
		}
		return @json_decode($result);
	}
	
	private function _getPath($endPoint) {
		return DS . $this->_version . $endPoint;
	}
	
	
}



class SimpleGeo_Record {
	
	public $layer;
	
	public $id;
	
	public $lat;
	
	public $lon;
	
	public $type = 'object';
	
	public $created = 0;
	
	private $_properties = array();
	
	public function __construct($layer, $id, $lat, $lon, $properties = array(), $type = 'object', $created = null) {
		if ($created == null) {
			$created = time();
		}
		
		$this->layer = $layer;
		$this->id = $id;
		$this->lat = (float)$lat;
		$this->lon = (float)$lon;
		$this->type = $type;
		$this->created = $created;
		
		if (!empty($properties)) {
			foreach ($properties as $key => $value) {
				$this->$key = $value;
			}
		}
	}
	
	public function __set($var, $val) {
		$this->_properties[$var] = $val;
	}
	
	public function __toString() {
		$array = $this->toArray();
		if (empty($array['properties'])) {
			$array['properties'] = new stdClass;
		}
		return json_encode($array);
	}
	
	public function toArray() {
		return array(
			'type' => 'Feature',
			'id' => $this->id,
			'created' => $this->created,
			'geometry' => array(
				'type' => 'Point',
				'coordinates' => array($this->lon, $this->lat)
			),
			'properties' => (empty($this->_properties)?new stdClass:$this->_properties)
		);
	}
}
