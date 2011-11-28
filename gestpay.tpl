<p class="payment_module">
  <a href="javascript:$('#gestpay_form').submit();" title="{l s='Pay with GestPay' mod='GestPay'}">
    <img src="{$this_path}images/gestpay.png" style="width:100px" alt="GestPay"/>
    <img src="{$this_path}images/visa.png" style="width:40px" alt="Visa"/>
    <img src="{$this_path}images/mastercard.png" style="width:40px" alt="Mastercard"/>
    <img src="{$this_path}images/amex.png" style="width:40px" alt="American Express"/>
    <img src="{$this_path}images/jcb.png" style="width:40px" alt="JCB"/>
    <img src="{$this_path}images/aura.png" style="margin-right:10px; width:40px" alt="Aura"/>
    {l s='Pay with GestPay' mod='GestPay'}
  </a>
</p>
<form action="{$gestpayURL}" method="post" id="gestpay_form" class="hidden">
  <!--<input type='hidden' name='a' value="{$a}"-->
  <!--<input type='hidden' name='b' value="{$b}"-->
  <input type='hidden' name='description' value='Payment for order #{$order_id}' />
  <input type='hidden' name='amount' value="{$amount}" />
  <input type='hidden' name='postage' value='0.00' />
  <input type='hidden' name='billing_fullname' value="{$billing_fullname}" />
  <input type='hidden' name='billing_address' value="{$billing_address}" />
  <input type='hidden' name='billing_postcode' value="{$billing_postcode}" />
  <input type='hidden' name='customer_phone_number' value="{$billing_phone}" />
  <input type='hidden' name='email_address' value='{$email_address}' />
  <input type='hidden' name='order_id' value="{$order_id}" />
  <input type='hidden' name='merchant_id' value="{$merchant_id}" />
  <input type='hidden' name='success_url' value="{$cancelurl}"/>
  <input type='hidden' name='test_success_url' value="{$cancelurl}"/>
  <input type='hidden' name='cancel_url' value="{$cancelurl}"/>
  <input type='hidden' name='declined_url' value="{$cancelurl}"/>
  <input type='hidden' name='callback_url' value="{$responderurl}" />
  {if $teststatus}
    <input type='hidden' name='test_transaction' value='100' />
  {/if}
  {if $systest}
    <input type="hidden" name="test" value="1" />
  {/if}
</form>
