{*
*  Copyright (C) Prestalia - All Rights Reserved
*
*  Unauthorized copying of this file, via any medium is strictly prohibited
*  Proprietary and confidential
*
*  @author    Prestalia <prestalia.it>
*  @copyright 2015-2016 Prestalia
*  @license   Closed source, proprietary software
*}
<span class="btn-group-action">
    <span class="btn-group">
        {if $invoice}
            <a class="btn btn-default" target="_blank" onclick="oppDownloadPDF('{$link->getAdminLink('AdminPdf')|escape:'htmlall':'UTF-8'}', 'generateInvoicePDF', '{$id_order|escape:'htmlall':'UTF-8'}')">
                <i class="icon icon-file-text"></i>
            </a>
        {/if}
        {if $delivery}
            <a class="btn btn-default" target="_blank" onclick="oppDownloadPDF('{$link->getAdminLink('AdminPdf')|escape:'htmlall':'UTF-8'}', 'generateDeliverySlipPDF', '{$id_order|escape:'htmlall':'UTF-8'}')">
                <i class="icon icon-truck"></i>
            </a>
        {/if}
    </span>
</span>
