<?php
/**
 * GestPayCryptHS
 * Copyright (C) 2001-2004 Alessandro Astarita <aleast@capri.it>
 *
 * http://gestpaycryptphp.sourceforge.net/
 *
 * This is an implementation in PHP of GestPayCryptHS
 * italian bank Banca Sella java classes. It allows to
 * connect to online credit card payment GestPay.
 *
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * version 2.1 as published by the Free Software Foundation.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details at
 * http://www.gnu.org/copyleft/lgpl.html
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */
require_once 'GestPayCrypt.php';

class GestPayCryptHS extends GestPayCrypt
{
  // Constructor
  public function __construct($debug = false, $curlPath = "/usr/bin/curl")
  {
    $this->ShopLogin = "";
    $this->Currency = "";
    $this->Amount = "";
    $this->ShopTransactionID = "";
    $this->CardNumber = "";
    $this->ExpMonth = "";
    $this->ExpYear = "";
    $this->BuyerName = "";
    $this->BuyerEmail = "";
    $this->Language = "";
    $this->CustomInfo = "";
    $this->AuthorizationCode = "";
    $this->ErrorCode = "0";
    $this->ErrorDescription = "";
    $this->BankTransactionID = "";
    $this->AlertCode = "";
    $this->AlertDescription = "";
    $this->EncryptedString = "";
    $this->ToBeEncrypt = "";
    $this->Decrypted = "";
    $this->ProtocolAuthServer = "https";
    $this->DomainName = "ecomm.sella.it";
    $this->ScriptEnCrypt = "/CryptHTTPS/Encrypt.asp";
    $this->ScriptDecrypt = "/CryptHTTPS/Decrypt.asp";
    $this->separator = "*P1*";
    $this->errNumber = "0";
    $this->Min = "";
    $this->CVV = "";
    $this->country = "";
    $this->vbvrisp = "";
    $this->vbv = "";

    $this->debug = $debug;
    $this->curlPath = $curlPath;
  }

  public function HttpGetLine($host, $uri, $port = 443)
  {
    if (function_exists("version_compare")
            && version_compare(phpversion(), "4.3.0", ">=")
            && extension_loaded("openssl")) {

      if ($this->debug) {
        echo "HttpGetLine(): php ssl\n";
      }

      return parent::HttpGetLine("ssl://" . $host, $uri, 443);
    } elseif (extension_loaded("curl")) {
      if ($this->debug) {
        echo "HttpGetLine(): curl ext\n";
      }

      $curl = curl_init("https://" . $host . $uri);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $tmp = curl_exec($curl);
      curl_close($curl);

      $lines = explode("\n", $tmp);

      return $lines[0];
    } else {
      if ($this->debug) {
        echo "HttpGetLine(): curl bin\n";
      }

      $exec_str = $this->curlPath .
              " -s -m 120 -L " .
              escapeshellarg($this->ProtocolAuthServer . "://" . $this->DomainName . $uri);

      exec($exec_str, $ret_arr, $ret_num);

      if ($ret_num != 0) {
        $this->ErrorCode = "9999";
        $this->ErrorDescription = "Error while executing: " . $exec_str;

        return -1;
      }

      if (!is_array($ret_arr)) {
        $this->ErrorCode = "9999";
        $this->ErrorDescription = "Error while executing: " . $exec_str . " - " .
                "\$ret_arr is not an array";

        return -1;
      }

      return $ret_arr[0];
    }
  }
}
