<style type="text/css">
    #gestpay_config .labels {
        width: 230px;
    }
    #gestpay_config .gestpay_input {
        width: 300px; 
        margin-bottom: 15px; 
        margin-left: 15px
    }
    .donation {
        font-weight: bold;
    }
</style>
<p class="donation">{l s='If you like this module please consider a donation:' mod='GestPay'}</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_s-xclick">
  <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
  <input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - Il metodo rapido, affidabile e innovativo per pagare e farsi pagare.">
  <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
</form>
<br /><br />
{l s='Visit our website:' mod='GestPay'} <a href="http://www.yameveo.com" target="_blank" style="color:blue;font-weight:bold">http://www.yameveo.com</a><br /><br />
{l s='If the customer chooses this payment mode, the order will change its status once a positive confirmation is recieved from GestPay server' mod='GestPay'}
<br /><br /><br />
<form action="{$formAction}" method="POST">
    <fieldset id="gestpay_config">
      <legend><img src="../img/admin/contact.gif" /> {l s='Account details' mod='GestPay'}</legend>
        <h3>{l s='Specify your GestPay account details' mod='GestPay'}</h3>
        <label for="login_user" class="labels"> {l s='Login User:' mod='GestPay'}</label>
        <input
          id="login_user"
          class="gestpay_input"
          type="text"
          name="login_user"
          value="{$loginUser}"/>
      <br />
        <label for="password" class="labels">{l s='Password:' mod='GestPay'} </label>
        <input
          id="password"
          class="gestpay_input"
          type="password"
          name="password"
          value="{$password}" />
       <br />
        <label for="merchant_code" class="labels"> {l s='Merchant Code:' mod='GestPay'} </label>
        <input
          id="merchant_code"
          class="gestpay_input"
          type="text"
          name="merchant_code"
          value="{$merchantCode}" />
      <br />
        <label for="login_user_test" class="labels"> {l s='Login User for Test Mode:' mod='GestPay'} </label>
        <input
          id="login_user_test"
          class="gestpay_input"
          type="text"
          name="login_user_test"
          value="{$loginUserTest}"
           />
      <br />
        <label for="password_test" class="labels"> {l s='Password for Test Mode:' mod='GestPay'} </label>
        <input
          id="password_test"
          class="gestpay_input"
          type="password"
          name="password_test"
          value="{$passwordTest}"
           />
       <br />
        <label for="merchant_code_test" class="labels"> {l s='Merchant Code for Test Mode:' mod='GestPay'} </label>
        <input
          id="merchant_code_test"
          class="gestpay_input"
          type="text"
          name="merchant_code_test"
          value="{$merchantCodeTest}"
           />
      <br />
      {if !$extensionCurl eq '1'}
      <label for="curl_path" class="labels"> {l s='Curl bin path (usually /usr/bin/curl ):' mod='GestPay'} </label>
          <input
            id="curl_path"
            class="gestpay_input"
            type="text"
            name="curl_path"
            value="{$curl_path}"
             />
        <br />
       {/if} 
       <label for="test_mode" class="labels"> {l s='Activate Test Mode on Frontend:' mod='GestPay'} </label>
        <input
          id="test_mode"  
          type="checkbox"
          name="test_mode"
          value="1"
          style="width: 300px; margin-top: 10px; margin-left: 15px"
          {if $testMode eq '1'} checked="checked" {/if} />
      <br /><br />
        <p> {l s='Choose your account type:' mod='GestPay'} </p><br />
      <label for="basic" style="width: 100px; margin-top:-3px">BASIC</label><input
          id="basic"
          type="radio"
          name="account_type"
          value="0"
          {if $accountType eq '0'} checked="checked" {/if}
          style="width: 20px; margin-bottom: 15px" /><br />
       <label for="advanced" style="width: 100px; margin-top:-3px">ADVANCED</label><input
          id="advanced"
          type="radio"
          name="account_type"
          value="1"
          {if $accountType eq '1'} checked="checked" {/if}
          style="width: 20px; margin-bottom: 15px" /><br />
       <label for="professional" style="width: 100px; margin-top:-3px">PROFESSIONAL</label><input
          id="professional"
          type="radio"
          name="account_type"
          value="2"
          {if $accountType eq '2'} checked="checked" {/if}
          style="width: 20px;  margin-bottom: 15px" />
      <br />
        <input
          class="button"
          name="btnSubmit"
          value="{l s='Update settings' mod='GestPay'}"
          type="submit"
          style="margin-top: 10px" />
    </fieldset>
</form>