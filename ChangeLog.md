0.6.1
* Fixed problems with Prestashop 1.4.9
* Better handling of smarty templates

---
0.6
* Rewritten validation.php to be compliant with Prestashop 1.4 (and with analytics modules)
* Minor fixes and cleanups

---
0.5.1
* Refactoring of GestPayCrypt library
* Use GestPayCryptHS (high security) instead of GestPayCrypt
* Update deprecated methods in GestPayCrypt (ereg to preg_match)
* Use smarty in backend configuration form (much cleaner and decoupled gestpay class)
* Moved code from AdminGestPay to Smarty template
* Smarty template refactoring

---
0.5
* Fixed link in payment page
* Some refactoring 
* Minor fix for uninstall and install
* Fixed annoying bug in configuration page regarding testmode
* Fixed minor css problems in backend

---
0.4.5
* Added missing logo in modules backend section
* Updated some italian translations
* Added missing logo in configuration page
* Minor css+html changes in configuration page
* Applied PSR-1 and PSR-2 rules (using PHP-CS-Fixer https://github.com/fabpot/PHP-CS-Fixer )
* Optimized images

---
0.4.4
* Fixed install error in Prestashop 1.4  (thanks monkie)

---
0.4.3
* Fixed a currency display bug in the return page (thanks Gloria)
* Fixed a customer name display bug in the return page (thanks Gloria)

---
0.4.2
* Added compatibility to Prestashop 1.4 (marco)
* Fixed issue #1 regarding tests (marco)
* Other minor fixes (marco)

---
0.4.1
* Removed debug code

---
0.4
* Added ability to choose between BASIC, ADVANCED or PROFESSIONAL account type
* Now it's not mandatory to insert test mode account data
* Allow shorter PIN (4 digits) for older accounts
* Fixed encryption for real accounts

---
0.3.1
* Fixed include bug in backend

---
0.3
* Changed encryption method for passwords from custom Rc4Two to Prestashop Blowfish
* Minor fixes to backend
* Code cleanup

---
0.2
* Added italian translation
* Set real urls for GestPay Backend and Payment Gateway

----
0.1
* First release