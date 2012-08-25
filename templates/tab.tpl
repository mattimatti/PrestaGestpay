{include file="{$gestPayPath}/donation.tpl"}
<br /><br />
<fieldset>
    <legend><img src="{$gestPayUrl}/AdminGestPay.gif" alt="GestPay" />{l s='GestPay backend Page' mod='GestPay'}</legend>
    <p>{l s='Access to GestPay backend without leaving Prestashop' mod='GestPay'}</p>
    <iframe 
      sandbox="allow-forms allow-same-origin allow-scripts"
      src="{$src}" width="100%" height="600">
    </iframe>
</fieldset>
<br />
<fieldset>
    <legend><img src="{$gestPayUrl}/AdminGestPay.gif" alt="GestPay" />{l s='GestPay backend (test mode) Page' mod='GestPay'}</legend>
    <p>{l s='Access to GestPay backend (test mode) without leaving Prestashop' mod='GestPay'}</p>
    <iframe
      sandbox="allow-forms allow-same-origin allow-scripts"
      src="{$srcTest}" width="100%" height="600">
    </iframe>
</fieldset>