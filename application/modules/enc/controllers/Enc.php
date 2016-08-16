<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Enc extends CI_Controller {

	private $privilege;
    const METHOD = 'aes-256-ctr';
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{

		 	$this->load->view('index.php');
	}

    public static function encrypt($encode = true)
    {
        $message = $_POST['teks'];
        $nonceSize = openssl_cipher_iv_length(self::METHOD);
        $nonce = openssl_random_pseudo_bytes($nonceSize);
        $key = "1111";
        $ciphertext = openssl_encrypt(
            $message,
            self::METHOD,
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        // Now let's pack the IV and the ciphertext together
        // Naively, we can just concatenate
        if ($encode) {
            echo json_encode(base64_encode($ciphertext));
        }
        echo json_encode($ciphertext);
        decrypt($ciphertext);
    }

    /* end encrypt email */
    /* decrypt email */

    public static function decrypt($message ,$encoded = true)
    {
        $key = "1111";
        //if ($encoded) {
            $message = base64_decode($message, true);
            if ($message === false) {
                throw new Exception('Encryption failure');
        //    }
        }

        $nonceSize = openssl_cipher_iv_length(self::METHOD);
        $nonce = mb_substr($message, 0, $nonceSize, '8bit');
        $ciphertext = mb_substr($message, $nonceSize, null, '8bit');

        $plaintext = openssl_decrypt(
            $ciphertext,
            self::METHOD,
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        echo json_encode($plaintext);
    }
    /* end decrypt email */


     /* encrypt NAMA USER */
    public static function encrypt2( $encode = true)
    {
        $key = 'qwertyuiopasdfghjklzxcvbn';
        $message = $_POST['teks'];
        $nonceSize = openssl_cipher_iv_length(self::METHOD);
        $nonce = '1234567890123456';

        $ciphertext = openssl_encrypt(
            $message,
            self::METHOD,
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        // Now let's pack the IV and the ciphertext together
        // Naively, we can just concatenate
        if ($encode) {
            echo json_encode(base64_encode($nonce.$ciphertext));
        }
        echo json_encode($nonce.$ciphertext);
    }
    /* end */
    
    /* decrypt nama */
    public static function decrypt2( $encoded = true)
    {
        $key = 'qwertyuiopasdfghjklzxcvbn';
        $message = $_POST['teks'];
        if ($encoded) {
            $message = base64_decode($message, true);
            if ($message === false) {
                throw new Exception('Encryption failure');
            }
        }

        $nonceSize = openssl_cipher_iv_length(self::METHOD);
        $nonce = mb_substr($message, 0, $nonceSize, '8bit');
        $ciphertext = mb_substr($message, $nonceSize, null, '8bit');

        $plaintext = openssl_decrypt(
            $ciphertext,
            self::METHOD,
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        echo json_encode($plaintext);
    }
    /* end decrypt email */

    public function hspas()
    {
        $pw = $_POST['pw'];
        $slt = $_POST['slt'];

        if($slt != '')
        {
            $new = $this->alus_auth->hash_password($pw, $slt);    
        }else
        {
            $new = $this->alus_auth->hash_password($pw);
        }
        

        echo json_encode($new);
        
    }
}

/* End of file  Home.php */
/* Location: ./application/controllers/ Home.php */