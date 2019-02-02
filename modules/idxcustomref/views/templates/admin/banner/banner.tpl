{**
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* @author    Innovadeluxe SL
* @copyright 2016 Innovadeluxe SL
* @license   INNOVADELUXE
*}

{* banner del paquete *}

<div class='panel heading innova-contenedor'>
  <div class="row innova-banner">
    <div class="innovacolumna1">
      <div class="innova-logo">

{if $link_iso=='es'}
    {assign var='linkagency' value='https://www.prestashop.com/es/expertos/agencias-web/innovadeluxe'}
    {*assign var='isodoc' value='es'*}
    {assign var='isodoc' value='en'}
{else}
    {assign var='isodoc' value='en'}
    {if $link_iso=='it'}
        {assign var='linkagency' value='https://www.prestashop.com/it/esperti/agenzie-web/innovadeluxe'}
    {else}
         {assign var='linkagency' value='https://www.prestashop.com/en/experts/web-agencies/innovadeluxe'}
    {/if}
{/if}
    
        <a href="{$linkagency|escape:'htmlall':'UTF-8'}"  target="blank">
          <img src="{$module_dir|escape:'htmlall':'UTF-8'}views/img/modules/certified-agency.png">
        </a>
      </div>
      <div class="block-services">
        <a href="http://addons.prestashop.com/contact-community.php?id_product={$suggested_modules.id_modulo_actual|intval}"  target="blank">
          <i class="icon-life-ring"></i>
          <span>{$suggested_modules.$link_iso.texto_soporte|escape:'htmlall':'UTF-8'}</span>
        </a>
        <a href="{$module_dir|escape:'htmlall':'UTF-8'}doc/readme_{$isodoc|escape:'htmlall':'UTF-8'}.pdf" target="blank">
          <i class="icon-file-text"></i>
          <span>{$suggested_modules.$link_iso.texto_ayuda|escape:'htmlall':'UTF-8'}</span>
        </a>
        <a href="http://addons.prestashop.com/{$link_iso|escape:'htmlall':'UTF-8'}/ratings.php" target="blank">
          <i class="icon-comments"></i>
          <span>{$suggested_modules.$link_iso.texto_opinion|escape:'htmlall':'UTF-8'}</span>
        </a>
      </div>
      <div class="interesting-modules">
        <a href="http://addons.prestashop.com/{$link_iso|escape:'htmlall':'UTF-8'}/76_innovadeluxe" target="blank">
          {$suggested_modules.$link_iso.texto_modulos_interesar|escape:'htmlall':'UTF-8'}
        </a>
      </div>
    </div>
    <div class="innovacolumna2">
      <div class="module-info">
        <a href="http://addons.prestashop.com/{$link_iso|escape:'htmlall':'UTF-8'}/product.php?id_product={$suggested_modules.id_modulo1|intval}" target="blank">
          <img src="{$module_dir|escape:'htmlall':'UTF-8'}views/img/modules/{$suggested_modules.id_modulo1|intval}.jpg" width="60" height="60">
          <p>{$suggested_modules.$link_iso.nombre_modulo1|escape:'htmlall':'UTF-8'}</p>
        </a>
        <a href="http://addons.prestashop.com/{$link_iso|escape:'htmlall':'UTF-8'}/product.php?id_product={$suggested_modules.id_modulo2|intval}" target="blank">
          <img src="{$module_dir|escape:'htmlall':'UTF-8'}views/img/modules/{$suggested_modules.id_modulo2|intval}.jpg" width="60" height="60">
          <p>{$suggested_modules.$link_iso.nombre_modulo2|escape:'htmlall':'UTF-8'}</p>
        </a>
        <a href="http://addons.prestashop.com/{$link_iso|escape:'htmlall':'UTF-8'}/product.php?id_product={$suggested_modules.id_modulo3|intval}" target="blank">
          <img src="{$module_dir|escape:'htmlall':'UTF-8'}views/img/modules/{$suggested_modules.id_modulo3|intval}.jpg" width="60" height="60">
          <p>{$suggested_modules.$link_iso.nombre_modulo3|escape:'htmlall':'UTF-8'}</p>
        </a>
      </div>
      <div class="all-our-modules">
        <a href="http://addons.prestashop.com/en/76_innovadeluxe" target="blank">
          <img src="{$module_dir|escape:'htmlall':'UTF-8'}views/img/modules/modulos.png">
          <p>{$suggested_modules.$link_iso.texto_todos_modulos|escape:'htmlall':'UTF-8'}</p>
        </a>
      </div>
    </div>
  </div>
</div>