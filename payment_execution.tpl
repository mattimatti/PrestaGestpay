{capture name=path}{l s='GestPay payment' mod='gestpay'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}

<h2>{l s='Order summary' mod='gestpay'}</h2>

{assign var='current_step' value='payment'}
{include file="$tpl_dir./order-steps.tpl"}

{if $nbProducts <= 0}
  <p class="warning">{l s='Your shopping cart is empty.'}</p>
{else}
  <h3>{l s='GestPay payment' mod='gestpay'}</h3>
  <form action="{$gestpayURL}" method="post" id="gestpay_form">
    <p>
      <img src="{$this_path}gestpay.gif" alt="{l s='gestpay' mod='gestpay'}" style="float:left; margin: 0px 10px 5px 0px;" />
      {l s='You have chosen to pay by GestPay.' mod='gestpay'}
      <br/><br />
      {l s='Here is a short summary of your order:' mod='gestpay'}
    </p>
    <p style="margin-top:20px;">
      - {l s='The total amount of your order is' mod='gestpay'}
      {if $currencies|@count > 1}
        {foreach from=$currencies item=currency}
          <span id="amount_{$currency.id_currency}" class="price" style="display:none;">{convertPriceWithCurrency price=$total currency=$currency}</span>
        {/foreach}
      {else}
        <span id="amount_{$currencies.0.id_currency}" class="price">{convertPriceWithCurrency price=$total currency=$currencies.0}</span>
      {/if}
    </p>
    <p>
      -
      {if $currencies|@count > 1}
        {l s='We accept several currencies' mod='gestpay'}
        <br /><br />
        {l s='Choose one of the following:' mod='gestpay'}
        <select id="currency_payement" name="currency_payement" onChange="showElemFromSelect('currency_payement', 'amount_')">
        {foreach from=$currencies item=currency}
          <option value="{$currency.id_currency}" {if $currency.id_currency == $cust_currency}selected="selected"{/if}>{$currency.name}</option>
        {/foreach}
        </select>
        <script language="javascript">showElemFromSelect('currency_payement', 'amount_');</script>
      {else}
        {l s='We accept the following currency:' mod='gestpay'}&nbsp;<b>{$currencies.0.name}</b>
        <input type="hidden" name="currency_payement" value="{$currencies.0.id_currency}">
      {/if}
    </p>
    <p>
      {l s='You will be redirected to GestPay secure payment page after confirming' mod='gestpay'}
      <br /><br />
      <b>{l s='Please confirm your order by clicking \'I confirm my order\'' mod='gestpay'}.</b>
    </p>
    <p class="cart_navigation"></p>
    <input type='hidden' name='a' value="{$a}" />
    <input type='hidden' name='b' value="{$b}" />
    <input type="submit" name="submit" value="{l s='I confirm my order' mod='gestpay'}" class="exclusive_large" />
  </form>
{/if}
