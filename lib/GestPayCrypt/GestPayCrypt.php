<?php

/**
 * GestPayCrypt
 * Copyright (C) 2001-2004 Alessandro Astarita <aleast@capri.it>
 *
 * http://gestpaycryptphp.sourceforge.net/
 *
 * This is an implementation in PHP of GestPayCrypt
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
class GestPayCrypt
{
  // Public
  public $ShopLogin;          // Merchant Code
  public $Currency;           // Code to identify currency
  public $Amount;             // Total amountImporto della transazione
  public $ShopTransactionID;  // Merchant transaction ID
  public $CardNumber;         // Credit Card number
  public $ExpMonth;           // Mese di scadenza carta di credito
  public $ExpYear;            // Anno di scadenza carta di credito
  public $BuyerName;          // Nome e cognome dell'acquirente
  public $BuyerEmail;         // Indirizzo email dell'acquirente
  public $Language;           // Lingua selezionata
  public $CustomInfo;         // Info aggiuntive
  public $AuthorizationCode;  // Codice di autorizzazione della transazione;
  public $ErrorCode;          // Codice di errore
  public $ErrorDescription;   // Descrizione errore
  public $BankTransactionID;  // Identificativo attribuito alla transazione da GestPay
  public $AlertCode;          // Codice alert
  public $AlertDescription;   // Descrizione alert
  public $EncryptedString;    // Stringa cifrata
  public $ToBeEncript;        // Stringa da cifrare
  public $Decrypted;
  public $TransactionResult;  // Esito transazione
  public $ProtocolAuthServer;
  public $DomainName;
  public $separator;
  public $errDescription;
  public $errNumber;
  public $Version;
  public $Min;
  public $CVV;
  public $country;
  public $vbvrisp;
  public $vbv;

  public $debug;
  public $curlPath;

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
    $this->ProtocolAuthServer = "http";
    $this->DomainName = "ecomm.sella.it";
    $this->ScriptEnCrypt = "/CryptHTTP/Encrypt.asp";
    $this->ScriptDecrypt = "/CryptHTTP/Decrypt.asp";
    $this->separator = "*P1*";
    $this->errDescription = "";
    $this->errNumber = "0";
    $this->Version = "3.0";
    $this->Min = "";
    $this->CVV = "";
    $this->country = "";
    $this->vbvrisp = "";
    $this->vbv = "";

    $this->debug = $debug;
    $this->curlPath = $curlPath;
  }

  // Public
  // Metodi di valorizzazione attributi
  public function SetShopLogin($val)
  {
    $this->ShopLogin = $val;
  }

  public function SetCurrency($val)
  {
    $this->Currency = $val;
  }

  public function SetAmount($val)
  {
    $this->Amount = $val;
  }

  public function SetShopTransactionID($val)
  {
    $this->ShopTransactionID = urlencode(trim($val));
  }

  public function SetCardNumber($val)
  {
    $this->CardNumber = $val;
  }

  public function SetDomainName($val)
  {
    $this->DomainName = $val;
  }

  public function SetExpMonth($val)
  {
    $this->ExpMonth = $val;
  }

  public function SetExpYear($val)
  {
    $this->ExpYear = $val;
  }

  public function SetMIN($val)
  {
    $this->Min = $val;
  }

  public function SetCVV($val)
  {
    $this->CVV = $val;
  }

  public function SetBuyerName($val)
  {
    $this->BuyerName = urlencode(trim($val));
  }

  public function SetBuyerEmail($val)
  {
    $this->BuyerEmail = trim($val);
  }

  public function SetLanguage($val)
  {
    $this->Language = trim($val);
  }

  public function SetCustomInfo($val)
  {
    $this->CustomInfo = urlencode(trim($val));
  }

  public function SetEncryptedString($val)
  {
    $this->EncryptedString = $val;
  }

  // Getter methods
  public function GetShopLogin()
  {
    return $this->ShopLogin;
  }

  public function GetCurrency()
  {
    return $this->Currency;
  }

  public function GetAmount()
  {
    return $this->Amount;
  }

  public function GetCountry()
  {
    return $this->country;
  }

  public function GetVBV()
  {
    return $this->vbv;
  }

  public function GetVBVrisp()
  {
    return $this->vbvrisp;
  }

  public function GetShopTransactionID()
  {
    return urldecode($this->ShopTransactionID);
  }

  public function GetBuyerName()
  {
    return urldecode($this->BuyerName);
  }

  public function GetBuyerEmail()
  {
    return $this->BuyerEmail;
  }

  public function GetCustomInfo()
  {
    return urldecode($this->CustomInfo);
  }

  public function GetAuthorizationCode()
  {
    return $this->AuthorizationCode;
  }

  public function GetErrorCode()
  {
    return $this->ErrorCode;
  }

  public function GetErrorDescription()
  {
    return $this->ErrorDescription;
  }

  public function GetBankTransactionID()
  {
    return $this->BankTransactionID;
  }

  public function GetTransactionResult()
  {
    return $this->TransactionResult;
  }

  public function GetAlertCode()
  {
    return $this->AlertCode;
  }

  public function GetAlertDescription()
  {
    return $this->AlertDescription;
  }

  public function GetEncryptedString()
  {
    return $this->EncryptedString;
  }

  public function Encrypt()
  {
    $this->ErrorCode = "0";
    $this->ErrorDescription = "";
    $this->ToBeEncrypt = "";

    if (empty($this->ShopLogin)) {
      $this->ErrorCode = "546";
      $this->ErrorDescription = "IDshop not valid";

      return false;
    }

    if (empty($this->Currency)) {
      $this->ErrorCode = "552";
      $this->ErrorDescription = "Currency not valid";

      return false;
    }

    if (empty($this->Amount)) {
      $this->ErrorCode = "553";
      $this->ErrorDescription = "Amount not valid";

      return false;
    }

    if (empty($this->ShopTransactionID)) {
      $this->ErrorCode = "551";
      $this->ErrorDescription = "Shop Transaction ID not valid";

      return false;
    }

    $this->ToEncrypt($this->CVV, "PAY1_CVV");
    $this->ToEncrypt($this->Min, "PAY1_MIN");
    $this->ToEncrypt($this->Currency, "PAY1_UICCODE");
    $this->ToEncrypt($this->Amount, "PAY1_AMOUNT");
    $this->ToEncrypt($this->ShopTransactionID, "PAY1_SHOPTRANSACTIONID");
    $this->ToEncrypt($this->CardNumber, "PAY1_CARDNUMBER");
    $this->ToEncrypt($this->ExpMonth, "PAY1_EXPMONTH");
    $this->ToEncrypt($this->ExpYear, "PAY1_EXPYEAR");
    $this->ToEncrypt($this->BuyerName, "PAY1_CHNAME");
    $this->ToEncrypt($this->BuyerEmail, "PAY1_CHEMAIL");
    $this->ToEncrypt($this->Language, "PAY1_IDLANGUAGE");
    $this->ToEncrypt($this->CustomInfo, "");

    $this->ToBeEncrypt = str_replace(" ", "ß", $this->ToBeEncrypt);

    $uri = $this->ScriptEnCrypt . "?a=" . $this->ShopLogin .
            "&b=" . substr($this->ToBeEncrypt, strlen($this->separator)) . "&c=" . $this->Version;

    if ($this->debug) {
      echo "Request URL: " . $this->ProtocolAuthServer . "://" . $this->DomainName . $uri . "\n";
    }

    $this->EncryptedString = $this->HttpGetResponse($this->DomainName, $uri, true);

    if ($this->EncryptedString == -1) {
      return false;
    }

    if ($this->debug) {
      echo "Encrypted string: " . $this->EncryptedString . "\n";
    }

    return true;
  }

  public function Decrypt()
  {
    $this->ErrorCode = "0";
    $this->ErrorDescription = "";

    if (empty($this->ShopLogin)) {
      $this->ErrorCode = "546";
      $this->ErrorDescription = "IDshop not valid";

      return false;
    }

    if (empty($this->EncryptedString)) {
      $this->ErrorCode = "1009";
      $this->ErrorDescription = "String to Decrypt not valid";

      return false;
    }

    $uri = $this->ScriptDecrypt . "?a=" . $this->ShopLogin .
            "&b=" . $this->EncryptedString;

    if ($this->debug) {
      echo "Request URL: " . $this->ProtocolAuthServer . "://" . $this->DomainName . $uri . "\n";
    }

    $this->Decrypted = $this->HttpGetResponse($this->DomainName, $uri, false);

    if ($this->Decrypted == -1) {
      return false;
    } elseif (empty($this->Decrypted)) {
      $this->ErrorCode = "9999";
      $this->ErrorDescription = "Decrypted string is empty";

      return false;
    }

    $this->Decrypted = str_replace("�", " ", $this->Decrypted);

    if ($this->debug) {
      echo "Decrypted string: " . $this->Decrypted . "\n";
    }

    $this->Parsing();

    return true;
  }

  // Private
  public function ToEncrypt($value, $tagvalue)
  {
    $equal = $tagvalue ? "=" : "";

    if (!empty($value)) {
      $this->ToBeEncrypt .= $this->separator . $tagvalue . $equal . $value;
    }
  }

  public function HttpGetResponse($host, $uri, $crypt)
  {
    $response = "";
    $req = $crypt ? "crypt" : "decrypt";

    $line = $this->HttpGetLine($host, $uri);

    if ($line == -1) {
      return -1;
    }

    if ($this->debug) {
      echo $line;
    }
    $reg = array();
    if (preg_match("/#" . $req . "string#([\w\W]*)#\/" . $req . "string#/", $line, $reg)) {
      $response = trim($reg[1]);
    } elseif (preg_match("/#error#([\w\W]*)#\/error#/", $line, $reg)) {
      $err = explode("-", $reg[1]);

      if (empty($err[0]) && empty($err[1])) {
        $this->ErrorCode = "9999";
        $this->ErrorDescription = "Unknown error";
      } else {
        $this->ErrorCode = trim($err[0]);
        $this->ErrorDescription = trim($err[1]);
      }

      return -1;
    } else {
      $this->ErrorCode = "9999";
      $this->ErrorDescription = "Response from server not valid";

      return -1;
    }

    return $response;
  }

  public function HttpGetLine($host, $uri, $port = 80)
  {
    $in = fsockopen($host, $port, $errno, $errstr, 60);
    if (!$in) {
      $this->ErrorCode = "9999";
      $this->ErrorDescription = "Impossible to connect to host: " . $host;

      return -1;
    } else {
      fputs($in, "GET " . $uri . " HTTP/1.0\r\n\r\n");
    }

    $line = "";

    // Skip headers
    while (fgets($in, 4096) != "\r\n");

    // Read only first line
    $line = fgets($in, 4096);

    fclose($in);

    return $line;
  }

  public function Parsing()
  {
    $keyval = explode($this->separator, $this->Decrypted);

    foreach ($keyval as $tagPAY1) {
      $tagPAY1val = explode("=", $tagPAY1);

      if (preg_match("/^PAY1_UICCODE/", $tagPAY1)) {
        $this->Currency = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_AMOUNT/", $tagPAY1)) {
        $this->Amount = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_SHOPTRANSACTIONID/", $tagPAY1)) {
        $this->ShopTransactionID = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_CHNAME/", $tagPAY1)) {
        $this->BuyerName = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_CHEMAIL/", $tagPAY1)) {
        $this->BuyerEmail = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_AUTHORIZATIONCODE/", $tagPAY1)) {
        $this->AuthorizationCode = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_ERRORCODE/", $tagPAY1)) {
        $this->ErrorCode = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_ERRORDESCRIPTION/", $tagPAY1)) {
        $this->ErrorDescription = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_BANKTRANSACTIONID/", $tagPAY1)) {
        $this->BankTransactionID = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_ALERTCODE/", $tagPAY1)) {
        $this->AlertCode = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_ALERTDESCRIPTION/", $tagPAY1)) {
        $this->AlertDescription = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_CARDNUMBER/", $tagPAY1)) {
        $this->CardNumber = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_EXPMONTH/", $tagPAY1)) {
        $this->ExpMonth = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_EXPYEAR/", $tagPAY1)) {
        $this->ExpYear = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_COUNTRY/", $tagPAY1)) {
        $this->ExpYear = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_VBVRISP/", $tagPAY1)) {
        $this->ExpYear = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_VBV/", $tagPAY1)) {
        $this->ExpYear = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_IDLANGUAGE/", $tagPAY1)) {
        $this->Language = $tagPAY1val[1];
      } elseif (preg_match("/^PAY1_TRANSACTIONRESULT/", $tagPAY1)) {
        $this->TransactionResult = $tagPAY1val[1];
      } else {
        $this->CustomInfo .= $tagPAY1 . $this->separator;
      }
    }

    $this->CustomInfo = substr($this->CustomInfo, 0, - strlen($this->separator));
  }

}
