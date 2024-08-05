<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
<?php

namespace App\Services;

class AESEncryptBase {

    private $iv;
    private $ivKEY;
    private $g_skeySpec;

    public function __construct($encKeyPath) {
        $this->iv = null;
        $this->ivKEY = null;
        $this->g_skeySpec = null;

        try {
            $keyBytes = file_get_contents($encKeyPath);
            $strEncKey = trim($keyBytes);
            $strKey = "q4UOLnbuVc0mP8Jf634f1zCGVy2pf9lj";
            $strDecKey = $this->decryptKey($strEncKey, $this->readAESEncKey($strKey));
            $this->g_skeySpec = $this->readAESKey($strDecKey);
        } catch (Exception $e) {
            echo "AESEncryptBase::: exception:: " . $e->getMessage();
        }
    }

    public function encrypt($msg) {
        $hexString = "";
        try {
            $cipher = "AES-128-CBC";
            $iv = $this->iv;
            $encrypted = openssl_encrypt($msg, $cipher, $this->g_skeySpec, OPENSSL_RAW_DATA, $iv);
            $hexString = base64_encode($encrypted);
        } catch (Exception $e) {
            echo "AESEncryptBase: Exception in Encrypt ::" . $e->getMessage();
        }
        return $hexString;
    }

    public function decrypt($hexString) {
        $originalString = "";
        try {
            $cipher = "AES-128-CBC";
            $iv = $this->iv;
            $encrypted = base64_decode($hexString);
            $originalString = openssl_decrypt($encrypted, $cipher, $this->g_skeySpec, OPENSSL_RAW_DATA, $iv);
        } catch (Exception $e) {
            echo "AESEncryptBase: Exception in Decrypt::" . $e->getMessage();
        }
        return $originalString;
    }

    public function decryptKey($hexString, $l_skeySpec) {
        $originalString = "";
        try {
            $cipher = "AES-128-CBC";
            $iv = $this->ivKEY;
            $encrypted = base64_decode($hexString);
            $originalString = openssl_decrypt($encrypted, $cipher, $l_skeySpec, OPENSSL_RAW_DATA, $iv);
        } catch (Exception $e) {
            echo "AESEncryptBase: Exception in DecryptKey ::" . $e->getMessage();
        }
        return $originalString;
    }

    public function asHex($bytes) {
        return bin2hex($bytes);
    }

    public function readAESKey($keyval) {
        try {
            $key = substr($keyval, 0, 16);
            $this->iv = $key;
            return $key;
        } catch (Exception $e) {
            echo "AESEncryptBase:readAESKey Exception in readKey::" . $e->getMessage();
        }
        return null;
    }

    public function readAESEncKey($keyval) {
        try {
            $key = substr($keyval, 0, 16);
            $this->ivKEY = $key;
            return $key;
        } catch (Exception $e) {
            echo "AESEncryptBase:readAESKey Exception in readKey::" . $e->getMessage();
        }
        return null;
    }
}
