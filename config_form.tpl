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
    .module_help {
        margin-bottom: 35px;
    }
</style>

{include file="{$gestPayPath}/donation.tpl"}
<br /><br />
<p>{l s='Visit our website:' mod='GestPay'} <a href="http://www.yameveo.com" target="_blank" style="color:blue;font-weight:bold">http://www.yameveo.com</a></p>
<p class="module_help">{l s='If the customer chooses this payment mode, the order will change its status once a positive confirmation is recieved from GestPay server' mod='GestPay'}</p>

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
          value="{$loginUser}" />
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
          value="{$loginUserTest}" />
        <br />
        <label for="password_test" class="labels"> {l s='Password for Test Mode:' mod='GestPay'} </label>
        <input
          id="password_test"
          class="gestpay_input"
          type="password"
          name="password_test"
          value="{$passwordTest}" />
       <br />
        <label for="merchant_code_test" class="labels"> {l s='Merchant Code for Test Mode:' mod='GestPay'} </label>
        <input
          id="merchant_code_test"
          class="gestpay_input"
          type="text"
          name="merchant_code_test"
          value="{$merchantCodeTest}" />
      <br />
      {if !$extensionCurl eq '1'}
      <label for="curl_path" class="labels"> {l s='Curl bin path (usually /usr/bin/curl ):' mod='GestPay'} </label>
          <input
            id="curl_path"
            class="gestpay_input"
            type="text"
            name="curl_path"
            value="{$curl_path}" />
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