<?php  
    
/**
* Disqus Comment Helper 
* 
* Requires env vars DISQUS_PUBKEY and DISQUS_PRIVKEY to be set
* 
* @author Phillip Wilt
* 
* Based on code by ryanvalentin 
* https://github.com/disqus/DISQUS-API-Recipes/blob/master/sso/php/sso.php
*/

class DisqusHelper extends Helper { 
    
    var $helpers = array('Html', 'Javascript'); 

    function __construct() {

        $this->disqus_private_key = str_replace("'", '', getenv('DISQUS_PRIVKEY'));
        $this->disqus_public_key = str_replace("'", '', getenv('DISQUS_PUBKEY'));

        if(empty($this->disqus_private_key) || empty($this->disqus_public_key)) {
            throw new Exception("You must configure the environmental vars DISQUS_PRIVKEY and DISQUS_PUBKEY", 1);
            
        }
    }


    protected function _dsq_hmac($data, $key) {
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


    /**
     * @return string $get_public_key the disqus public key
     * 
    */
    public function get_public_key() {
        return $this->disqus_public_key;
    }

    /**
     * Takes in user details and returns a string that
     * is used for the Disqus API Call 
     * 
     * @param array $user - user must contain id, name, email
     * 
     * @return array - $message for use in the follow js function 
     *                  array contains message, hmac, and timestamp
     * 
    */
    public function single_sign_on($user)
    {
        $data = array(
            "id" => $user["id"],
            "username" => $user["name"],
            "email" => $user["email"]
        );


        $message = base64_encode(json_encode($data));
        $timestamp = time();
        $hmac = $this->_dsq_hmac($message . ' ' . $timestamp, $this->disqus_private_key);

        return array(
            "message"   => $message,
            "timestamp" => $timestamp,
            "hmac"      => $hmac    
        );

    }
}
?>