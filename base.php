<?php

	class HttpConnector {
		protected $ch;
		protected $response;
		protected $baseUrl;
		
		public function __construct($baseUrl = '') {
			$this->baseUrl = $baseUrl;
			$this->ch = curl_init();
		}
		
		public function request($url) {
			if(!empty($this->baseUrl)) {
				$curl_url = $this->baseUrl.$url;
			}
			print_r($curl_url);
            curl_setopt($this->ch, CURLOPT_URL, $curl_url);
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);
			$this->response = curl_exec($this->ch);
            curl_close($this->ch);
			return $this->response;
		}
	}

	abstract class TPM {
		protected $baseUrl = 'http://tpm.ayphos.com.br/';
		
		public function getConnector() {
			return new HttpConnector($this->baseUrl);
		}
	}
	
	abstract class TPMStoryPageAbstract extends TPM {
		protected $restconnector;
		public $nome;
		public $wl;
		public $wm;
		public $wr;
		public $titulo;
		public $desc;
		
		function findAll() {
			$connector = $this->getConnector();
			$result = $connector->request('story_page/index.json');
			return $result;
		}
	}
	
	class TPMStoryPage extends TPMStoryPageAbstract {
		
	}

?>