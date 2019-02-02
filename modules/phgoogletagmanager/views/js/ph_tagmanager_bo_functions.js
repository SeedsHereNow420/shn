/**
 * PrestaChamps
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Commercial License
 * you can't distribute, modify or sell this code
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file
 * If you need help please contact leo@prestachamps.com
 *
 * @author    PrestaChamps <leo@prestachamps.com>
 * @copyright PrestaChamps
 * @license   commercial
 */

  function init_ph_googleTagManger(){
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer',ph_gtm_id);
  }


  function refundByOrderId (OrderId) {
      dataLayer = [];
      dataLayer.push({
        'ecommerce': {
          'refund': {
            'actionField': {'id': OrderId}         // Transaction ID. Required for purchases and refunds.
          }
        }
      });
      //alert(dataLayer);
      //console.log(dataLayer);
      init_ph_googleTagManger();

      //console.log('send, event, Ecommerce, refundByOrderId '+OrderId)
  }

  function refundByProduct (OrderId) {
      dataLayer = [];
      dataLayer.push({
        'ecommerce': {
          'refund': {
            'actionField': {'id': OrderId}         // Transaction ID. Required for purchases and refunds.
          }
        }
      });
      init_ph_googleTagManger();
  }



