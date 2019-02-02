# MailChimp for PrestaShop Module
Connect your store, sell more stuff. 

When you connect your PrestaShop store to MailChimp, you increase the power of both. More than 15 million people use MailChimp to create targeted email and advertising campaigns that grow their businesses on their terms. A customizable e-commerce solution like PrestaShop is an excellent way to [personalize your marketing](https://mailchimp.com/personalization/) and encourage that growth. And, you can add the MailChimp module to your shop free of cost. 

## Features 

Sync list and purchase data.
Create [abandoned cart automations](https://mailchimp.com/features/abandoned-cart/) , win back lapsed customers, and follow up post-purchase.
Showcase [product recommendations](https://mailchimp.com/features/product-recommendations/) .
Segment based on purchase history and track VIPs.
View your results and [measure ROI](https://mailchimp.com/features/reports/) .
Grow your audience and sell more stuff with [Facebook Ad Campaigns in MailChimp](https://mailchimp.com/features/facebook-ads/) .
Create [personalized transactional messages](https://mailchimp.com/features/order-notifications/) —like shipping notifications, invoices, and more—directly through MailChimp.


## File Structure

### mailchimpintegration.php
This is the base module file which contains the install and uninstall scripts as well as the bulk of the data sync logic.

### config.xml
Metadata about the module.

### views/templates/front/mailchimp.tpl
Page template for redirect after user signs into MC.

### controllers/front/mailchimp.php
Controller for above template. Also contains the logic to save the MC API key and DC.

## Install Instructions 

To connect your PrestaShop store to a list in MailChimp, follow these steps.

1. Log in to your PrestaShop back office.
2. In the left navigation menu, click Modules and Services.
3. In the Modules List section, search for MailChimp.
4. Search for MailChimp for PrestaShop and click Install.
5. On the MailChimp for PrestaShop configuration page, click Log in with MailChimp.
6. Log in with your MailChimp credentials, and you’ll be redirected to the front page of your store. 
7. Navigate back to the Modules List section, find MailChimp for PrestaShop, and click Configure.
8. Create a new MailChimp list, or select an existing list in your MailChimp account, and click Save.

All set! We’ll start syncing your PrestaShop customers to MailChimp. The time it takes for the sync to complete depends on the size of your list and the number of orders in your store.
