<?php

class DisqusClass {
	
	static private $disqusSecretKey = 'yRrYYY4Pcwq2IO9lnYkal19Tfdaud5uH3lEWCBAPLWs6S59S1XSZb3ix4iySKYLm';
	static private $disqusPublicKey = 'ToWIpgORGx6S0tzt7N0SLLqLV4EzKcd8bcQlVOKjoRl9J80okNVWA5n9OE2seDkh';
	
	static private function getUserData() {
		$data = array(
		        "id" 		=> Auth::id(),
		        "username" 	=> Auth::user()->username,
		        "email" 	=> Auth::user()->email,
		        "avatar" 	=> Auth::user()->avatar
	        );
		return $data;
	}
	 
	static private function dsq_hmacsha1($data, $key) {
	    $blocksize=64;
	    $hashfunc='sha1';
	    if (strlen($key)>$blocksize)
	        $key=pack('H*', $hashfunc($key));
	    $key=str_pad($key,$blocksize,chr(0x00));
	    $ipad=str_repeat(chr(0x36),$blocksize);
	    $opad=str_repeat(chr(0x5c),$blocksize);
	    $hmac = pack(
	                'H*',$hashfunc(
	                    ($key^$opad).pack(
	                        'H*',$hashfunc(
	                            ($key^$ipad).$data
	                        )
	                    )
	                )
	            );
	    return bin2hex($hmac);
	}

	public function getPayload() {
		$payload = [];
		if(Auth::check()){
			array_push($payload, $message = base64_encode(json_encode(self::getUserData())));
			array_push($payload, $timestamp = time());
			array_push($payload, $hmac = $this->dsq_hmacsha1($message. ' '.$timestamp, self::$disqusSecretKey));
			array_push($payload, self::$disqusPublicKey);
		}
		return $payload;
	}
}