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
  * @copyright Yameveo
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
      global $smarty;
      $this->blowfish = new Blowfish(_COOKIE_KEY_, _COOKIE_IV_);

      // @todo Use DB tables to set language.
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
      $smarty->assign(array(
          'src' => $src,
          'srcTest' => $srcTest,
          'gestPayPath' => _PS_MODULE_DIR_.'/gestpay/templates',
          'gestPayUrl' => _PS_BASE_URL_.'/modules/gestpay'
      ));
      $smarty->display(_PS_MODULE_DIR_.'/gestpay/templates/tab.tpl');
    }
  }
