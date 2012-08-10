<?php

/**
  * GestPay tab for admin panel, AdminGestPay.php
  * @category admin
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
  * @author Andrea De Pirro <andrea.depirro@yameveo.com>, Enrico Aillaud <enrico.aillaud@yameveo.com>
  * @copyright Andrea De Pirro & Enrico Aillaud
  *
  */

  include_once(PS_ADMIN_DIR.'/../classes/AdminTab.php');

  class AdminGestPay extends AdminTab
  {
    public function postProcess()
    {
    }

    public function display()
    {
      $this->blowfish = new Blowfish(_COOKIE_KEY_, _COOKIE_IV_);

      // TODO Use DB tables to set language.
      // TODO Should we use Smarty for templating?
      switch (Tools::getValue('id_lang')) {
        case 1 :
          $lang = 2;
          break;
        case 2 :
          $lang = 4;
          break;
        case 3 :
          $lang = 1;
          break;
        default :
          $lang = 1;
          break;
      }
      $config = Configuration::getMultiple(
                  array(
                    'GESTPAY_LOGIN_USER',
                    'GESTPAY_PASSWORD',
                    'GESTPAY_MERCHANT_CODE',
                    'GESTPAY_LOGIN_USER_TEST',
                    'GESTPAY_PASSWORD_TEST',
                    'GESTPAY_MERCHANT_CODE_TEST',
                  )
                );
      // Donation button
      
      echo '<b>'.$this->l('If you like this module please consider a donation').'</b><br />
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
              ">
              <input type="image" src="https://www.paypal.com/it_IT/IT/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - Il sistema di pagamento online più facile e sicuro!">
              <img alt="" border="0" src="https://www.paypal.com/it_IT/i/scr/pixel.gif" width="1" height="1">
              </form>
              <br />';
      // Gestpay iframes
      $src = "https://ecomm.sella.it/GestPay/BackOffice/LoginGestPay.asp?".
                  "IDLanguage=$lang".
                  "&help=".
                  "&action=login".
                  "&MerchantLogin={$config['GESTPAY_MERCHANT_CODE']}".
                  "&LoginUser={$config['GESTPAY_LOGIN_USER']}".
                  "&Password={$this->blowfish->decrypt($config['GESTPAY_PASSWORD'])}";
      $srcTest = "https://testecomm.sella.it/GestPay/BackOffice/loginGestPay.asp?".
                  "IDLanguage=$lang".
                  "&help=".
                  "&action=login".
                  "&MerchantLogin={$config['GESTPAY_MERCHANT_CODE_TEST']}".
                  "&LoginUser={$config['GESTPAY_LOGIN_USER_TEST']}".
                  "&Password={$this->blowfish->decrypt($config['GESTPAY_PASSWORD_TEST'])}";
      // @todo fix empty html in chrome and safari (to be tested on IE)
      echo '<fieldset>
              <legend><img src="../modules/gestpay/AdminGestPay.gif" />'.$this->l('GestPay backend Page').'</legend>
              <p>'.$this->l('Access to GestPay backend without leaving Prestashop').'</p>
              <iframe 
                sandbox="allow-forms allow-same-origin allow-scripts"
                src="'. $src .'" width="100%" height="600">
              </iframe>
            </fieldset>';
      echo  '<br />
            <fieldset>
              <legend><img src="../modules/gestpay/AdminGestPay.gif" />'.$this->l('GestPay backend (test mode) Page').'</legend>
              <p>'.$this->l('Access to GestPay backend (test mode) without leaving Prestashop').'</p>
              <iframe
                sandbox="allow-same-origin allow-forms allow-scripts"
                
                src="' . $srcTest .'" width="100%" height="600">
              </iframe>
            </fieldset>';
    }
  }
