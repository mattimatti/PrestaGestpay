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
 * @copyright Andrea De Pirro & Enrico Aillaud
 *
 */
/* SSL Management */
$useSSL = false;

include(dirname(__FILE__) . '/../../config/config.inc.php');
include(dirname(__FILE__) . '/../../header.php');
include(dirname(__FILE__) . '/gestpay.php');

if (!$cookie->isLogged())
  Tools::redirect('authentication.php?back=order.php');
$gestpay = new GestPay();
echo $gestpay->validatePayment(trim($_GET['a']), trim($_GET['b']));

include_once(dirname(__FILE__) . '/../../footer.php');
