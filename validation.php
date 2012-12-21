<?php

/**
 * GestPay validation page, validation.php
 * @category payment
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

include(dirname(__FILE__) . '/../../config/config.inc.php');
include(dirname(__FILE__). '/../../init.php');

include(dirname(__FILE__) . '/gestpay.php');
global $cookie;

if (!$cookie->isLogged())
  Tools::redirect('authentication.php?back=order.php');

$gestpay = new GestPay();
$gestpay_decrypt = $gestpay->deCrypt(trim($_GET['a']), trim($_GET['b']));

//    $shop_login = trim($gestpay_decrypt->GetShopLogin());
//    $currency = $this->convertToCurrencySymbol($gestpay_decrypt->GetCurrency());
$amount = floatval($gestpay_decrypt->GetAmount());
$shop_transaction_id = trim($gestpay_decrypt->GetShopTransactionID());
//    $buyer_name = preg_replace('#[\W]#', ' ', trim($gestpay_decrypt->GetBuyerName()));
//    $buyer_email = trim($gestpay_decrypt->GetBuyerEmail());
$transaction_result = trim($gestpay_decrypt->GetTransactionResult());
//    $authorization_code = trim($gestpay_decrypt->GetAuthorizationCode());
$error_code = trim($gestpay_decrypt->GetErrorCode());
$error_description = trim($gestpay_decrypt->GetErrorDescription());
//    $error_bank_transaction_id = trim($gestpay_decrypt->GetBankTransactionID());
//    $alert_code = trim($gestpay_decrypt->GetAlertCode());
//    $alert_description = trim($gestpay_decrypt->GetAlertDescription());
//    $custom_info = trim($gestpay_decrypt->GetCustomInfo());

$cart = new Cart((int) $shop_transaction_id);
$customer = new Customer((int) $cart->id_customer);
if ($transaction_result == 'OK') {
    $gestpay->validateOrder($shop_transaction_id, Configuration::get('PS_OS_PAYMENT'), $amount, 'GestPay', NULL, NULL, NULL, false, $customer->secure_key);
} else {

    // @todo use translation function
    $error_message = "Error " . $error_code . "  " . $error_description;
    $gestpay->validateOrder($shop_transaction_id, Configuration::get('PS_OS_ERROR'), $amount, 'GestPay', $error_message, NULL, NULL, false, $customer->secure_key);
    $checkout_type = Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order';
    $url = _PS_VERSION_ >= '1.5' ? 'index.php?controller=' . $checkout_type . '&' : $checkout_type . '.php?';
    $url .= 'step=3&cgv=1&message='.$error_message;

    if (!isset($_SERVER['HTTP_REFERER']) || strstr($_SERVER['HTTP_REFERER'], 'order'))
        Tools::redirect($url);
    elseif (strstr($_SERVER['HTTP_REFERER'], '?'))
        Tools::redirect($_SERVER['HTTP_REFERER'].'&gestpayerror=1&message='.$error_message, '');
    else
        Tools::redirect($_SERVER['HTTP_REFERER'].'?gestpayerror=1&message='.$error_message, '');
}

$url = 'index.php?controller=order-confirmation&';
if (_PS_VERSION_ < '1.5')
    $url = 'order-confirmation.php?';

Tools::redirect($url . 'id_module=' . (int) $gestpay->id . '&id_cart=' . $shop_transaction_id . '&key=' . $customer->secure_key . '&id_order=' . $gestpay->currentOrder);
