<?php

/* __string_template__58a368c25dba7f4548e53ebcffa66d628b3dd570b9fc44ef21fb0a302216324b */
class __TwigTemplate_3eddc456b7b541a8ec7ef389f81683f43a730e90d1d5d1bf905ae29a653efb7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'extra_stylesheets' => array($this, 'block_extra_stylesheets'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
            'content_footer' => array($this, 'block_content_footer'),
            'sidebar_right' => array($this, 'block_sidebar_right'),
            'javascripts' => array($this, 'block_javascripts'),
            'extra_javascripts' => array($this, 'block_extra_javascripts'),
            'translate_javascripts' => array($this, 'block_translate_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=0.75, maximum-scale=0.75, user-scalable=0\">
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
<meta name=\"robots\" content=\"NOFOLLOW, NOINDEX\">

<link rel=\"icon\" type=\"image/x-icon\" href=\"/img/favicon.ico\" />
<link rel=\"apple-touch-icon\" href=\"/img/app_icon.png\" />

<title>Products • Seeds Here Now</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminProducts';
    var iso_user = 'en';
    var full_language_code = 'en-us';
    var full_cldr_language_code = 'en-US';
    var country_iso_code = 'US';
    var _PS_VERSION_ = '1.7.2.4';
    var roundMode = 2;
    var youEditFieldFor = '';
        var new_order_msg = 'A new order has been placed on your shop.';
    var order_number_msg = 'Order number: ';
    var total_msg = 'Total: ';
    var from_msg = 'From: ';
    var see_order_msg = 'View this order';
    var new_customer_msg = 'A new customer registered on your shop.';
    var customer_name_msg = 'Customer name: ';
    var new_msg = 'A new message was posted on your shop.';
    var see_msg = 'Read this message';
    var token = '1c4e28476a686db33dbba3da1d192e6f';
    var token_admin_orders = 'f20556cb6cadc7583c1041167a9d6072';
    var token_admin_customers = 'b503a7017552bcfae377c69683fce14e';
    var token_admin_customer_threads = '85c4cfc3e4097b669eeb3dba833e144b';
    var currentIndex = 'index.php?controller=AdminProducts';
    var employee_token = '860ae8e9a20f74e38b42664f865aeddf';
    var choose_language_translate = 'Choose language';
    var default_language = '1';
    var admin_modules_link = '/nimda420/index.php/module/catalog/recommended?route=admin_module_catalog_post&_token=X5dYnXL_mvxqUUyi-o1lrB35-S2zevjDzDblX42H_Q0';
    var tab_modules_list = 'prestagiftvouchers,dmuassocprodcat,etranslation,apiway,prestashoptoquickbooks';
    var update_success_msg = 'Update successful';
    var errorLogin = 'PrestaShop was unable to log in to Addons. Please check your credentials and your Internet connection.';
    var search_product_msg = 'Search for a product';
  </script>

      <link href=\"/js/jquery/plugins/timepicker/jquery-ui-timepicker-addon.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/nimda420/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/dealsofthedaypro/views/css/admin.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/nimda420/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var ajax_url = \"index.php?tab=AdminModules&configure=dealsofthedaypro&token=0e19433e4aa4ff24b692fd180ab3734f\";
var baseAdminDir = \"\\/nimda420\\/\";
var baseDir = \"\\/\";
var currency = {\"iso_code\":\"USD\",\"sign\":\"\$\",\"name\":\"US Dollar\",\"format\":\"\\u00a4#,##0.00\"};
var host_mode = false;
var show_new_customers = \"0\";
var show_new_messages = false;
var show_new_orders = \"0\";
</script>
<script type=\"text/javascript\" src=\"/js/jquery/jquery-1.11.0.min.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/jquery-migrate-1.2.1.min.js\"></script>
<script type=\"text/javascript\" src=\"/modules/amazzingfilter/views/js/attribute-indexer.js?v=2.8.0\"></script>
<script type=\"text/javascript\" src=\"/nimda420/themes/new-theme/public/main.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/jquery.chosen.js\"></script>
<script type=\"text/javascript\" src=\"/js/admin.js?v=1.7.2.4\"></script>
<script type=\"text/javascript\" src=\"/js/cldr.js\"></script>
<script type=\"text/javascript\" src=\"/js/tools.js?v=1.7.2.4\"></script>
<script type=\"text/javascript\" src=\"/nimda420/public/bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/vendor/d3.v3.min.js\"></script>
<script type=\"text/javascript\" src=\"/nimda420/themes/default/js/vendor/nv.d3.min.js\"></script>


  <script>
\t\t\t\tvar admin_stblog_ajax_url = 'https://www.seedsherenow.com/nimda420/index.php?controller=AdminStBlog&token=8b1bf68bc1484bbe35f60a32b58a827c';
\t\t\t\tvar current_id_tab = 10;
\t\t\t</script>
                    <script type=\"text/javascript\">
                        var af_ajax_action_path = 'index.php?controller=AdminModules&configure=amazzingfilter&token=0e19433e4aa4ff24b692fd180ab3734f&ajax=1';
                    </script>
                

";
        // line 85
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>
<body class=\"adminproducts\">



<header>
  <nav class=\"main-header\">

    <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

    
    

    
    <i class=\"material-icons pull-left p-x-1 js-mobile-menu hidden-md-up\">menu</i>
    <a class=\"logo pull-left\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDashboard&amp;token=30e5a7c03f02d2ef5cc248c72102c447\"></a>

    <div class=\"component pull-left hidden-md-down\"><div class=\"ps-dropdown dropdown\">
  <span type=\"button\" id=\"quick-access\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
    <span class=\"selected-item\">Quick Access</span> 
    <i class=\"material-icons arrow-down pull-right\">keyboard_arrow_down</i>
  </span>
  <div class=\"ps-dropdown-menu dropdown-menu\" aria-labelledby=\"quick-access\">
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=steasycontent&amp;token=0e19433e4aa4ff24b692fd180ab3734f\"
                 data-item=\"ACC  (ADMIN-ONLY)\"
      >ACC  (ADMIN-ONLY)</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php/product/new?token=e78b8477241c7d729563d8ab3d63468f\"
                 data-item=\"ADD NEW PRODUCT\"
      >ADD NEW PRODUCT</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminStBlog&amp;token=8b1bf68bc1484bbe35f60a32b58a827c\"
                 data-item=\"BLOG\"
      >BLOG</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPerformance&amp;token=9468a4d0dca693972c2c53a99000f85e\"
                 data-item=\"CLEAR CACHE\"
      >CLEAR CACHE</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=dealsofthedaypro&amp;token=0e19433e4aa4ff24b692fd180ab3734f\"
                 data-item=\"DAILY DEALS (ADMIN-ONLY)\"
      >DAILY DEALS (ADMIN-ONLY)</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=pscleaner&amp;token=0e19433e4aa4ff24b692fd180ab3734f\"
                 data-item=\"DANGER (ADMIN-ONLY)\"
      >DANGER (ADMIN-ONLY)</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php/module/manage?token=e78b8477241c7d729563d8ab3d63468f\"
                 data-item=\"IM (ADMIN-ONLY)\"
      >IM (ADMIN-ONLY)</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=stmegamenu&amp;token=0e19433e4aa4ff24b692fd180ab3734f\"
                 data-item=\"MEGA MENU\"
      >MEGA MENU</a>
        <hr>
          <a
        class=\"dropdown-item js-quick-link\"
        data-rand=\"142\"
        data-icon=\"icon-AdminCatalog\"
        data-method=\"add\"
        data-url=\"index.php/product/catalog/last?-o1lrB35-S2zevjDzDblX42H_Q0\"
        data-post-link=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminQuickAccesses&token=9eb5a97c41f7cb949cf4e8f856fd05c7\"
        data-prompt-text=\"Please name this shortcut:\"
        data-link=\"Products - List\"
      >
        <i class=\"material-icons\">add_circle_outline</i>
        Add current page to QuickAccess
      </a>
        <a class=\"dropdown-item\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminQuickAccesses&token=9eb5a97c41f7cb949cf4e8f856fd05c7\">
      <i class=\"material-icons\">settings</i>
      Manage quick accesses
    </a>
  </div>
</div>
</div>
    <div class=\"component hidden-md-down\">

<form id=\"header_search\"
      class=\"bo_search_form dropdown-form js-dropdown-form\"
      method=\"post\"
      action=\"/nimda420/index.php?controller=AdminSearch&amp;token=64c2c209b547396448b3aee98b57f0bc\"
      role=\"search\">
  <input type=\"hidden\" name=\"bo_search_type\" id=\"bo_search_type\" class=\"js-search-type\" />
    <div class=\"input-group\">
    <input id=\"bo_query\" name=\"bo_query\" type=\"search\" class=\"form-control dropdown-form-search js-form-search\" value=\"\" placeholder=\"Search (e.g.: product reference, customer name…)\" />
    <div class=\"input-group-addon\">
      <div class=\"dropdown\">
        <span class=\"dropdown-toggle js-dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\">
          Everywhere
        </span>
        <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu\">
          <ul class=\"items-list js-items-list\">
            <li class=\"search-all search-option active\">
              <a class=\"dropdown-item\" data-item=\"Everywhere\" href=\"#\" data-value=\"0\" data-placeholder=\"What are you looking for?\" data-icon=\"icon-search\">
              <i class=\"material-icons\">search</i> Everywhere</a>
            </li>
            <hr>
            <li class=\"search-book search-option\">
              <a class=\"dropdown-item\" data-item=\"Catalog\" href=\"#\" data-value=\"1\" data-placeholder=\"Product name, SKU, reference...\" data-icon=\"icon-book\">
                <i class=\"material-icons\">library_books</i> Catalog
              </a>
            </li>
            <li class=\"search-customers-name search-option\">
              <a class=\"dropdown-item\" data-item=\"Customers by name\" href=\"#\" data-value=\"2\" data-placeholder=\"Email, name...\" data-icon=\"icon-group\">
                <i class=\"material-icons\">group</i> Customers by name
              </a>
            </li>
            <li class=\"search-customers-addresses search-option\">
              <a class=\"dropdown-item\" data-item=\"Customers by ip address\" href=\"#\" data-value=\"6\" data-placeholder=\"123.45.67.89\" data-icon=\"icon-desktop\">
                <i class=\"material-icons\">desktop_windows</i>Customers by IP address</a>
            </li>
            <li class=\"search-orders search-option\">
              <a class=\"dropdown-item\" data-item=\"Orders\" href=\"#\" data-value=\"3\" data-placeholder=\"Order ID\" data-icon=\"icon-credit-card\">
                <i class=\"material-icons\">credit_card</i> Orders
              </a>
            </li>
            <li class=\"search-invoices search-option\">
              <a class=\"dropdown-item\" data-item=\"Invoices\" href=\"#\" data-value=\"4\" data-placeholder=\"Invoice Number\" data-icon=\"icon-book\">
                <i class=\"material-icons\">book</i></i> Invoices
              </a>
            </li>
            <li class=\"search-carts search-option\">
              <a class=\"dropdown-item\" data-item=\"Carts\" href=\"#\" data-value=\"5\" data-placeholder=\"Cart ID\" data-icon=\"icon-shopping-cart\">
                <i class=\"material-icons\">shopping_cart</i> Carts
              </a>
            </li>
            <li class=\"search-modules search-option\">
              <a class=\"dropdown-item\" data-item=\"Modules\" href=\"#\" data-value=\"7\" data-placeholder=\"Module name\" data-icon=\"icon-puzzle-piece\">
                <i class=\"material-icons\">view_module</i> Modules
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class=\"input-group-addon search-bar\">
      <button type=\"submit\">SEARCH<i class=\"material-icons\">search</i></button>
    </div>
  </div>
</form>

<script type=\"text/javascript\">
 \$(document).ready(function(){
  });
</script>
</div>


    <div class=\"component pull-md-right -norightmargin hidden-md-down\"><div class=\"employee-dropdown dropdown\">
      <div class=\"img-circle person\" data-toggle=\"dropdown\">
      <i class=\"material-icons\">person</i>
    </div>
    <div class=\"dropdown-menu dropdown-menu-right p-a-1 m-r-2\">
    <div class=\"text-xs-center employee_avatar\">
      <img class=\"avatar img-circle\" src=\"https://profile.prestashop.com/adam%40seedsherenow.com.jpg\" /><br>
      <span>adam adam</span>
    </div>
    <hr>
    <a class=\"employee-link profile-link\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminEmployees&amp;token=860ae8e9a20f74e38b42664f865aeddf&amp;id_employee=5&amp;updateemployee\">
      <i class=\"material-icons\">settings_applications</i> Your profile
    </a>
    <a class=\"employee-link m-t-1\" id=\"header_logout\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLogin&amp;token=8b5668d8baddcc9f8ea99dccfea2b47b&amp;logout\">
      <i class=\"material-icons\">power_settings_new</i> Sign out
    </a>
  </div>
</div>
</div>
        <div class=\"component pull-md-right hidden-md-down\">  <div class=\"shop-list\">
    <a class=\"link\" href=\"http://www.seedsherenow.com/\" target= \"_blank\">Seeds Here Now</a>
  </div>
</div>
            

    

    
    
  </nav>
</header>

<nav class=\"nav-bar\">
  <ul class=\"main-menu\">

          
                
                
        
          <li class=\"link-levelone \" data-submenu=\"1\">
            <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDashboard&amp;token=30e5a7c03f02d2ef5cc248c72102c447\" class=\"link\" >
              <i class=\"material-icons\">trending_up</i> <span>Dashboard</span>
            </a>
          </li>

        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down -active\" data-submenu=\"2\">
              <span class=\"title\">Sell</span>
          </li>

                          
                
                                
                <li class=\"link-levelone \" data-submenu=\"3\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrders&amp;token=f20556cb6cadc7583c1041167a9d6072\" class=\"link\">
                    <i class=\"material-icons\">shopping_basket</i>
                    <span>
                    Orders
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"4\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrders&amp;token=f20556cb6cadc7583c1041167a9d6072\" class=\"link\"> Orders
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"5\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminInvoices&amp;token=27465276cad8ead38223ee52908b4114\" class=\"link\"> Invoices
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"7\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDeliverySlip&amp;token=eb8492437a5ad38470ba58a27948e85b\" class=\"link\"> Delivery Slips
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"142\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrdersPlusPlus&amp;token=c7b1a465fa15b81b84ee0b5e5dd4b3b4\" class=\"link\"> Orders++
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone -active\" data-submenu=\"9\">
                  <a href=\"/nimda420/index.php/product/catalog?_token=X5dYnXL_mvxqUUyi-o1lrB35-S2zevjDzDblX42H_Q0\" class=\"link\">
                    <i class=\"material-icons\">store</i>
                    <span>
                    Catalog
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo -active\" data-submenu=\"10\">
                              <a href=\"/nimda420/index.php/product/catalog?_token=X5dYnXL_mvxqUUyi-o1lrB35-S2zevjDzDblX42H_Q0\" class=\"link\"> Products
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"11\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCategories&amp;token=17b8f2a88bfec8495a99c8e3cd2004ad\" class=\"link\"> Categories
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"12\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminTracking&amp;token=92553e4f1f404c4300cf1ccaee6feaac\" class=\"link\"> Monitoring
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"13\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAttributesGroups&amp;token=96642334d7c2f47f7d74c03a5cb1cf7a\" class=\"link\"> Attributes &amp; Features
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"16\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminManufacturers&amp;token=60ad0aeaddce7f7aa0e0b4f894079bb1\" class=\"link\"> Brands &amp; Suppliers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"19\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAttachments&amp;token=e0a19be487887de5c82bd114a6f16088\" class=\"link\"> Files
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"20\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCartRules&amp;token=32f3990b794538755ccaf5316184b5c7\" class=\"link\"> Discounts
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"23\">
                              <a href=\"/nimda420/index.php/stock/?_token=X5dYnXL_mvxqUUyi-o1lrB35-S2zevjDzDblX42H_Q0\" class=\"link\"> Stocks
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"125\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminMassEditProduct&amp;token=f598b7132cdbe377d706f6b6d04a1f64\" class=\"link\"> Mass edit product
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"132\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminProductGrid&amp;token=804d138b281699f7922b42537d6baf53\" class=\"link\"> Grid Products
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"24\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomers&amp;token=b503a7017552bcfae377c69683fce14e\" class=\"link\">
                    <i class=\"material-icons\">account_circle</i>
                    <span>
                    Customers
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"25\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomers&amp;token=b503a7017552bcfae377c69683fce14e\" class=\"link\"> Customers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"26\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAddresses&amp;token=4c5902b858f4fa0c8e5f52ab84270a7f\" class=\"link\"> Addresses
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"28\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrderMessage&amp;token=f98775ee0cbbbacba537feee3662c3fb\" class=\"link\">
                    <i class=\"material-icons\">chat</i>
                    <span>
                    Customer Service
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"30\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrderMessage&amp;token=f98775ee0cbbbacba537feee3662c3fb\" class=\"link\"> Order Messages
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"32\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminStats&amp;token=eae7c0f9a72d8c487990d23e7641aafd\" class=\"link\">
                    <i class=\"material-icons\">assessment</i>
                    <span>
                    Stats
                                        </span>

                  </a>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down \" data-submenu=\"42\">
              <span class=\"title\">Improve</span>
          </li>

                          
                
                                
                <li class=\"link-levelone \" data-submenu=\"43\">
                  <a href=\"/nimda420/index.php/module/catalog?_token=X5dYnXL_mvxqUUyi-o1lrB35-S2zevjDzDblX42H_Q0\" class=\"link\">
                    <i class=\"material-icons\">extension</i>
                    <span>
                    Modules
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"44\">
                              <a href=\"/nimda420/index.php/module/catalog?_token=X5dYnXL_mvxqUUyi-o1lrB35-S2zevjDzDblX42H_Q0\" class=\"link\"> Modules &amp; Services
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"46\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAddonsCatalog&amp;token=36d44ed0943846b759d6ae73d423b4bd\" class=\"link\"> Modules Catalog
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"47\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCmsContent&amp;token=960b6fb28997bc316882504fde1d7b5a\" class=\"link\">
                    <i class=\"material-icons\">desktop_mac</i>
                    <span>
                    Design
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-47\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"50\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCmsContent&amp;token=960b6fb28997bc316882504fde1d7b5a\" class=\"link\"> Pages
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"51\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModulesPositions&amp;token=e4b0198be5268753afe94dc3a929dab5\" class=\"link\"> Positions
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"52\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminImages&amp;token=d49e62ad4fa3becee20fc3634c87e47f\" class=\"link\"> Image Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"117\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLinkWidget&amp;token=3aed3a35e65f47acfdaf55f143b21d40\" class=\"link\"> Link Widget
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"53\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCarriers&amp;token=58d90124d4eb1f6de78d2d443a3e12f9\" class=\"link\">
                    <i class=\"material-icons\">local_shipping</i>
                    <span>
                    Shipping
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-53\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"54\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCarriers&amp;token=58d90124d4eb1f6de78d2d443a3e12f9\" class=\"link\"> Carriers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"55\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminShipping&amp;token=519634428e8f988b5cce3b6349d3f7be\" class=\"link\"> Preferences
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"56\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPayment&amp;token=63ad9f3f6c1cd9404f13749045440d5f\" class=\"link\">
                    <i class=\"material-icons\">payment</i>
                    <span>
                    Payment
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-56\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"57\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPayment&amp;token=63ad9f3f6c1cd9404f13749045440d5f\" class=\"link\"> Payment Methods
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"58\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPaymentPreferences&amp;token=cc25b825df4352b66d48e5ab24ec3551\" class=\"link\"> Preferences
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"59\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLocalization&amp;token=2f780734f1f31a41f635f94591ba4eda\" class=\"link\">
                    <i class=\"material-icons\">language</i>
                    <span>
                    International
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-59\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"60\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLocalization&amp;token=2f780734f1f31a41f635f94591ba4eda\" class=\"link\"> Localization
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"65\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCountries&amp;token=33e269a6ab68a25fa9ffc2c727731038\" class=\"link\"> Locations
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"72\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminTranslations&amp;token=a6a71f9bad5edd85c3860915e525062d\" class=\"link\"> Translations
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"171\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminNewsTicker&amp;token=87f1f6cda2403879dc4e0d493b8b624c\" class=\"link\">
                    <i class=\"material-icons\"></i>
                    <span>
                    News Ticker
                                        </span>

                  </a>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down \" data-submenu=\"73\">
              <span class=\"title\">Configure</span>
          </li>

                          
                
                                
                <li class=\"link-levelone \" data-submenu=\"74\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPreferences&amp;token=81bc36590a36ad25c2023318091466c2\" class=\"link\">
                    <i class=\"material-icons\">settings</i>
                    <span>
                    Shop Parameters
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-74\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"75\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPreferences&amp;token=81bc36590a36ad25c2023318091466c2\" class=\"link\"> General
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"78\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrderPreferences&amp;token=1277f56eadc4c81a827c7d671eb2cc81\" class=\"link\"> Order Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"81\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPPreferences&amp;token=c066eecb14afdea4b079f1608ea7825f\" class=\"link\"> Product Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"82\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomerPreferences&amp;token=0dffe13edbb7e626685aa56dc1af021e\" class=\"link\"> Customer Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"86\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminContacts&amp;token=0fc93a26ca8f17d8bfd565d61da407af\" class=\"link\"> Contact
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"96\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminInformation&amp;token=acd6e9da3a1f6f2cf3ae1a05fb9dfef9\" class=\"link\">
                    <i class=\"material-icons\">settings_applications</i>
                    <span>
                    Advanced Parameters
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-96\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"97\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminInformation&amp;token=acd6e9da3a1f6f2cf3ae1a05fb9dfef9\" class=\"link\"> Information
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"98\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPerformance&amp;token=9468a4d0dca693972c2c53a99000f85e\" class=\"link\"> Performance
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"99\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAdminPreferences&amp;token=30fa2f4fc02eb84179a6bc5f53544698\" class=\"link\"> Administration
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                                                                            
                
                                
                <li class=\"link-levelone \" data-submenu=\"128\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsCategory&amp;token=d67055e0012611ef28aae1089e93c188\" class=\"link\">
                    <i class=\"material-icons\">description</i>
                    <span>
                    Faqs
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-128\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"129\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsCategory&amp;token=d67055e0012611ef28aae1089e93c188\" class=\"link\"> Categories
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"130\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsPost&amp;token=c7f7636b25f091ddc980efcd8c7f1462\" class=\"link\"> Questions/Answers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"131\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsSettings&amp;token=1a5c344b13b787d5c6ca7cff4c08fd63\" class=\"link\"> Settings
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"287\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSlider&amp;token=5d18892d4ed99d27be229b53d5db8d67\" class=\"link\">
                    <i class=\"material-icons\">collections</i>
                    <span>
                    Creative Slider
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-287\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"288\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSlider&amp;token=5d18892d4ed99d27be229b53d5db8d67\" class=\"link\"> Sliders
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"290\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSliderRevisions&amp;token=5b55b3cccbb13a67b5b4b7f0742e1d54\" class=\"link\"> Revisions
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"294\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopup&amp;token=6eeb3c034a4c8106c2038afba04467be\" class=\"link\">
                    <i class=\"material-icons\">filter_none</i>
                    <span>
                    Creative Popup
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-294\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"295\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopup&amp;token=6eeb3c034a4c8106c2038afba04467be\" class=\"link\"> Popups
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"297\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopupRevisions&amp;token=6a608137cb8ef60256e4c999bf381929\" class=\"link\"> Revisions
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                          
        
            </ul>

  <span class=\"menu-collapse hidden-md-down\">
    <i class=\"material-icons\">&#xE8EE;</i>
  </span>

  
</nav>


<div id=\"main-div\">

  
    
<div class=\"header-toolbar\">

  
    <ol class=\"breadcrumb\">

              <li>
                      <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCatalog&amp;token=7a42910790cac314a488b589e0890ad5\">Catalog</a>
                  </li>
      
              <li>
                      <a href=\"/nimda420/index.php/product/catalog?_token=X5dYnXL_mvxqUUyi-o1lrB35-S2zevjDzDblX42H_Q0\">Products</a>
                  </li>
      
    </ol>
  

  
    <h2 class=\"title\">
      Products    </h2>
  

  
    <div class=\"toolbar-icons\">
                                  
        <a
          class=\"toolbar-button toolbar_btn\"
          id=\"page-header-desc-configuration-modules-list\"
          href=\"/nimda420/index.php/module/catalog?_token=X5dYnXL_mvxqUUyi-o1lrB35-S2zevjDzDblX42H_Q0\"          title=\"Recommended Modules and Services\"
                  >
                      <i class=\"material-icons\">extension</i>
                    <span class=\"title\">Recommended Modules and Services</span>
        </a>
            
                  <a class=\"toolbar-button\" href=\"http://help.prestashop.com/en/doc/AdminProducts?version=1.7.2.4&amp;country=en\" title=\"Help\">
            <i class=\"material-icons\">help</i>
            <span class=\"title\">Help</span>
          </a>
                  </div>
  
    
</div>
    <div class=\"modal fade\" id=\"modal_addons_connect\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\"><i class=\"icon-puzzle-piece\"></i> <a target=\"_blank\" href=\"http://addons.prestashop.com/?utm_source=back-office&utm_medium=modules&utm_campaign=back-office-EN&utm_content=download\">PrestaShop Addons</a></h4>
\t\t\t</div>
\t\t\t
\t\t\t
<div class=\"modal-body\">
\t\t\t\t\t\t<!--start addons login-->
\t\t\t<form id=\"addons_login_form\" method=\"post\" >
\t\t\t\t<div>
\t\t\t\t\t<a href=\"https://addons.prestashop.com/en/login?email=adam%40seedsherenow.com&amp;firstname=adam&amp;lastname=adam&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/nimda420/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
\t\t\t\t\t<h3 class=\"text-center\">Connect your shop to PrestaShop's marketplace in order to automatically import all your Addons purchases.</h3>
\t\t\t\t\t<hr />
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Don't have an account?</h4>
\t\t\t\t\t\t<p class='text-justify'>Discover the Power of PrestaShop Addons! Explore the PrestaShop Official Marketplace and find over 3 500 innovative modules and themes that optimize conversion rates, increase traffic, build customer loyalty and maximize your productivity</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Connect to PrestaShop Addons</h4>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><i class=\"icon-user\"></i></span>
\t\t\t\t\t\t\t\t<input id=\"username_addons\" name=\"username_addons\" type=\"text\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><i class=\"icon-key\"></i></span>
\t\t\t\t\t\t\t\t<input id=\"password_addons\" name=\"password_addons\" type=\"password\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"btn btn-link pull-right _blank\" href=\"//addons.prestashop.com/en/forgot-your-password\">I forgot my password</a>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row row-padding-top\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/en/login?email=adam%40seedsherenow.com&amp;firstname=adam&amp;lastname=adam&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\">
\t\t\t\t\t\t\t\tCreate an Account
\t\t\t\t\t\t\t\t<i class=\"icon-external-link\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<button id=\"addons_login_button\" class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">
\t\t\t\t\t\t\t\t<i class=\"icon-unlock\"></i> Sign in
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div id=\"addons_loading\" class=\"help-block\"></div>

\t\t\t</form>
\t\t\t<!--end addons login-->
\t\t\t</div>


\t\t\t\t\t</div>
\t</div>
</div>

    <div class=\"content-div \">

      

      

      

      
      
      
      

      <div class=\"row \">
        <div class=\"col-xs-12\">
          <div id=\"ajax_confirmation\" class=\"alert alert-success\" style=\"display: none;\"></div>




  ";
        // line 1049
        $this->displayBlock('content_header', $context, $blocks);
        // line 1050
        echo "                 ";
        $this->displayBlock('content', $context, $blocks);
        // line 1051
        echo "                 ";
        $this->displayBlock('content_footer', $context, $blocks);
        // line 1052
        echo "                 ";
        $this->displayBlock('sidebar_right', $context, $blocks);
        // line 1053
        echo "
        </div>
      </div>

    </div>

  
</div>

<div id=\"non-responsive\" class=\"js-non-responsive\">
  <h1>Oh no!</h1>
  <p class=\"m-t-3\">
    The mobile version of this page is not available yet.
  </p>
  <p class=\"m-t-2\">
    Please use a desktop computer to access this page, until is adapted to mobile.
  </p>
  <p class=\"m-t-2\">
    Thank you.
  </p>
  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDashboard&amp;token=30e5a7c03f02d2ef5cc248c72102c447\" class=\"btn btn-primary p-y-1 m-t-3\">
    <i class=\"material-icons\">arrow_back</i>
    Back
  </a>
</div>
<div class=\"mobile-layer\"></div>



  <div id=\"footer\" class=\"bootstrap hide\">
<!--
  <div class=\"col-sm-2 hidden-xs\">
    <a href=\"http://www.prestashop.com/\" class=\"_blank\">PrestaShop&trade;</a>
    -
    <span id=\"footer-load-time\"><i class=\"icon-time\" title=\"Load time: \"></i> 0.348s</span>
  </div>

  <div class=\"col-sm-2 hidden-xs\">
    <div class=\"social-networks\">
      <a class=\"link-social link-twitter _blank\" href=\"https://twitter.com/PrestaShop\" title=\"Twitter\">
        <i class=\"icon-twitter\"></i>
      </a>
      <a class=\"link-social link-facebook _blank\" href=\"https://www.facebook.com/prestashop\" title=\"Facebook\">
        <i class=\"icon-facebook\"></i>
      </a>
      <a class=\"link-social link-github _blank\" href=\"https://www.prestashop.com/github\" title=\"Github\">
        <i class=\"icon-github\"></i>
      </a>
      <a class=\"link-social link-google _blank\" href=\"https://plus.google.com/+prestashop/\" title=\"Google\">
        <i class=\"icon-google-plus\"></i>
      </a>
    </div>
  </div>
  <div class=\"col-sm-5\">
    <div class=\"footer-contact\">
      <a href=\"http://www.prestashop.com/en/contact_us?utm_source=back-office&amp;utm_medium=footer&amp;utm_campaign=back-office-EN&amp;utm_content=download\" class=\"footer_link _blank\">
        <i class=\"icon-envelope\"></i>
        Contact
      </a>
      /&nbsp;
      <a href=\"http://forge.prestashop.com/?utm_source=back-office&amp;utm_medium=footer&amp;utm_campaign=back-office-EN&amp;utm_content=download\" class=\"footer_link _blank\">
        <i class=\"icon-bug\"></i>
        Bug Tracker
      </a>
      /&nbsp;
      <a href=\"http://www.prestashop.com/forums/?utm_source=back-office&amp;utm_medium=footer&amp;utm_campaign=back-office-EN&amp;utm_content=download\" class=\"footer_link _blank\">
        <i class=\"icon-comments\"></i>
        Forum
      </a>
      /&nbsp;
      <a href=\"http://addons.prestashop.com/?utm_source=back-office&amp;utm_medium=footer&amp;utm_campaign=back-office-EN&amp;utm_content=download\" class=\"footer_link _blank\">
        <i class=\"icon-puzzle-piece\"></i>
        Addons
      </a>
      /&nbsp;
      <a href=\"http://www.prestashop.com/en/training-prestashop?utm_source=back-office&amp;utm_medium=footer&amp;utm_campaign=back-office-EN&amp;utm_content=download\" class=\"footer_link _blank\">
        <i class=\"icon-book\"></i>
        Training
      </a>
                </div>
  </div>

  <div class=\"col-sm-3\">
    
  </div>

  <div id=\"go-top\" class=\"hide\"><i class=\"icon-arrow-up\"></i></div>
  -->
</div>



  <div class=\"bootstrap\">
    <div class=\"modal fade\" id=\"modal_addons_connect\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\"><i class=\"icon-puzzle-piece\"></i> <a target=\"_blank\" href=\"http://addons.prestashop.com/?utm_source=back-office&utm_medium=modules&utm_campaign=back-office-EN&utm_content=download\">PrestaShop Addons</a></h4>
\t\t\t</div>
\t\t\t
\t\t\t
<div class=\"modal-body\">
\t\t\t\t\t\t<!--start addons login-->
\t\t\t<form id=\"addons_login_form\" method=\"post\" >
\t\t\t\t<div>
\t\t\t\t\t<a href=\"https://addons.prestashop.com/en/login?email=adam%40seedsherenow.com&amp;firstname=adam&amp;lastname=adam&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/nimda420/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
\t\t\t\t\t<h3 class=\"text-center\">Connect your shop to PrestaShop's marketplace in order to automatically import all your Addons purchases.</h3>
\t\t\t\t\t<hr />
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Don't have an account?</h4>
\t\t\t\t\t\t<p class='text-justify'>Discover the Power of PrestaShop Addons! Explore the PrestaShop Official Marketplace and find over 3 500 innovative modules and themes that optimize conversion rates, increase traffic, build customer loyalty and maximize your productivity</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Connect to PrestaShop Addons</h4>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><i class=\"icon-user\"></i></span>
\t\t\t\t\t\t\t\t<input id=\"username_addons\" name=\"username_addons\" type=\"text\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><i class=\"icon-key\"></i></span>
\t\t\t\t\t\t\t\t<input id=\"password_addons\" name=\"password_addons\" type=\"password\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"btn btn-link pull-right _blank\" href=\"//addons.prestashop.com/en/forgot-your-password\">I forgot my password</a>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row row-padding-top\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/en/login?email=adam%40seedsherenow.com&amp;firstname=adam&amp;lastname=adam&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\">
\t\t\t\t\t\t\t\tCreate an Account
\t\t\t\t\t\t\t\t<i class=\"icon-external-link\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<button id=\"addons_login_button\" class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">
\t\t\t\t\t\t\t\t<i class=\"icon-unlock\"></i> Sign in
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div id=\"addons_loading\" class=\"help-block\"></div>

\t\t\t</form>
\t\t\t<!--end addons login-->
\t\t\t</div>


\t\t\t\t\t</div>
\t</div>
</div>

  </div>

";
        // line 1218
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>
</html>";
    }

    // line 85
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    public function block_extra_stylesheets($context, array $blocks = array())
    {
    }

    // line 1049
    public function block_content_header($context, array $blocks = array())
    {
    }

    // line 1050
    public function block_content($context, array $blocks = array())
    {
    }

    // line 1051
    public function block_content_footer($context, array $blocks = array())
    {
    }

    // line 1052
    public function block_sidebar_right($context, array $blocks = array())
    {
    }

    // line 1218
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function block_extra_javascripts($context, array $blocks = array())
    {
    }

    public function block_translate_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "__string_template__58a368c25dba7f4548e53ebcffa66d628b3dd570b9fc44ef21fb0a302216324b";
    }

    public function getDebugInfo()
    {
        return array (  1297 => 1218,  1292 => 1052,  1287 => 1051,  1282 => 1050,  1277 => 1049,  1268 => 85,  1260 => 1218,  1093 => 1053,  1090 => 1052,  1087 => 1051,  1084 => 1050,  1082 => 1049,  114 => 85,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__58a368c25dba7f4548e53ebcffa66d628b3dd570b9fc44ef21fb0a302216324b", "");
    }
}
