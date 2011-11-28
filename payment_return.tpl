<div id="block-history">
  {if $transaction_result == 'OK'}
    <h2>{l s='Your order on' mod='GestPay'} {$shop_name} {l s='is complete' mod='GestPay'}</h2>
    <h3>{l s='Your order details:' mod='GestPay'}</h3>
    <table id="order-list" class="std">
      <thead>
        <tr>
          <th class="item">{l s='Order Id' mod='GestPay'}</th>
          <th class="item">{l s='Buyer Name' mod='GestPay'}</th>
          <th class="item">{l s='Total Amount' mod='GestPay'}</th>
          <th class="item">{l s='Transaction Result' mod='GestPay'}</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{$shop_transaction_id}</td>
          <td>{$buyer_name}</td>
          <td>{$amount} {$currency}</td>
          <td>{$transaction_result}</td>
        </tr>
      </tbody>
    </table>
    {l s='For any questions or for further information, please contact our' mod='GestPay'} <a href="{$base_dir_ssl}contact-form.php">{l s='customer support' mod='GestPay'}</a>.
  {else}
    <h2>{l s='There was a problem with your order!!!' mod='GestPay'}</h2>
    <h3>{l s='Your order details:' mod='GestPay'}</h3>
    <table id="order-list" class="std">
      <thead>
        <tr>
          <th class="item">{l s='Order Id' mod='GestPay'}</th>
          <th class="item">{l s='Buyer Name' mod='GestPay'}</th>
          <th class="item">{l s='Total Amount' mod='GestPay'}</th>
          <th class="item">{l s='Transaction Result' mod='GestPay'}</th>
          <th class="item">{l s='Error' mod='GestPay'}</th>
          <th class="last_item">{l s='Error description' mod='GestPay'}</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{$shop_transaction_id}</td>
          <td>{$buyer_name}</td>
          <td>{$amount} {$currency}</td>
          <td>{$transaction_result}</td>
          <td>{$error_code}</td>
          <td>{$error_description}</td>
        </tr>
      </tbody>
    </table>
    {l s='For any questions or for further information, please contact our' mod='GestPay'} <a href="{$base_dir_ssl}contact-form.php">{l s='customer support' mod='GestPay'}</a>.
  {/if}
  <ul class="footer_links">
    <li><a href="{$base_dir_ssl}my-account.php"><img src="{$img_dir}icon/my-account.gif" alt="" class="icon" /></a><a href="{$base_dir_ssl}my-account.php">{l s='Back to Your Account'}</a></li>
    <li><a href="{$base_dir}"><img src="{$img_dir}icon/home.gif" alt="" class="icon" /></a><a href="{$base_dir}">{l s='Home'}</a></li>
  </ul>
</div>