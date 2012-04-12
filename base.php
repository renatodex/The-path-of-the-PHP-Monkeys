<?php

	define('TPM_BASE_URL', 'http://tpm.ayphos.com.br/');

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
            curl_setopt($this->ch, CURLOPT_URL, $curl_url);
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);
			$this->response = curl_exec($this->ch);
            curl_close($this->ch);
			return $this->response;
		}
	}

	abstract class TPM {
		protected $baseUrl = TPM_BASE_URL;
		
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
		
		public function findAll() {
			$result = $this->getConnector()->request('story_page/index.json');
			return $result;
		}
		
	}
	
	class TPMStoryPage extends TPMStoryPageAbstract {
	}
