# Modulo GestPay per Prestashop

Questo modulo funziona esclusivamente con architettura Crittografia (OTP non è supportato)
Se si intende utilizzare una connessione sicura HTTPS è necessario soddisfare almeno uno dei seguenti requisiti:
* Versione di PHP > 4.3.0 e supporto estensione OpenSSL
* PHP con supporto CURL (http://curl.haxx.se/)

Per far funzionare correttamente il modulo bisogna impostare gli url di risposta positiva e negativa sul backend di Banca Sella:

Link al backend di test: https://testecomm.sella.it/GestPay/BackOffice/LoginGestPay.asp  
Link al backend reale: https://ecomm.sella.it/GestPay/BackOffice/LoginGestPay.asp

Impostare questi url:

URL per risposta positiva: 
http://www.dominio.it/modules/gestpay/validation.php  
URL per risposta negativa: 
http://www.dominio.it/modules/gestpay/validation.php
URL Server to Server: 
http://www.dominio.it/modules/gestpay/validation.php

Nella sezione campi e parametri bisogna abilitare a "Parametro SI" le voci:
* Buyer Email
* Buyer Name
* Language

Attenzione: la cartella del plugin deve chiamarsi gestpay per non causare errori di installazione.  
Non dimenticate di abilitare l'IP del vostro server nel backend di GestPay! Configurazione->Ambiente->Indirizzi IP

Se volete effettuare una donazione: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=52LYR2A3VTS5S  
Qui trovate il Changelog del modulo https://github.com/akira28/PrestaGestpay/wiki/Changelog
