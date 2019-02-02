<?php

/* __string_template__91628c5acd6cb3df5897d6aa0c0b495a09ad777fe4efe2815a01427d29e1a943 */
class __TwigTemplate_63ce52e16fa372e5cce55c089e897595f77747b1dfe39f39d64eb0a488610bdb extends Twig_Template
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
    var token = '55f74d98009362f746acb3c5a9095c98';
    var token_admin_orders = '6765e4d212ea4d8afe68a5049c5f1c32';
    var token_admin_customers = '585da99b9bb7f5cbade3faaee79a1b0d';
    var token_admin_customer_threads = '43032b1db8350001ed7bc39d723c4a53';
    var currentIndex = 'index.php?controller=AdminProducts';
    var employee_token = '2348142b41267cc0159941f9315953d3';
    var choose_language_translate = 'Choose language';
    var default_language = '1';
    var admin_modules_link = '/nimda420/index.php/module/catalog/recommended?route=admin_module_catalog_post&_token=yEWRqFGfrC0I4QRRS_UYAFBveASRGIOsGuPuIv38tlE';
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
      <link href=\"/modules/prismpay/views/css/prismpayadmin.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var ajax_url = \"index.php?tab=AdminModules&configure=dealsofthedaypro&token=bc97b10524afbe7b2ca93ae237ef0d54\";
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
<script type=\"text/javascript\" src=\"/modules/prismpay/views/js/prismpayadmin.js\"></script>


  <script>
\t\t\t\tvar admin_stblog_ajax_url = 'https://www.seedsherenow.com/nimda420/index.php?controller=AdminStBlog&token=fb410664a525652cc63314ab56d73ce5';
\t\t\t\tvar current_id_tab = 10;
\t\t\t</script>
<script type=\"text/javascript\">
    var FSAU = FSAU || { };
    FSAU.menu_button_text = 'Duplicated URLs';
    FSAU.menu_button_url = 'https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;token=bc97b10524afbe7b2ca93ae237ef0d54&amp;configure=fsadvancedurl&amp;tab_section=fsau_duplicate_tab';
    FSAU.params_hash = '24f8afc0300f723d08c137a64b8f8c14f1ccdfc5';
</script>
<script type=\"text/javascript\" src=\"/modules/fsadvancedurl/views/js/admin.js\"></script>
                    <script type=\"text/javascript\">
                        var af_ajax_action_path = 'index.php?controller=AdminModules&configure=amazzingfilter&token=bc97b10524afbe7b2ca93ae237ef0d54&ajax=1';
                    </script>
                

";
        // line 94
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>
<body class=\"adminproducts\">



<header>
  <nav class=\"main-header\">

    <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

    
    

    
    <i class=\"material-icons pull-left p-x-1 js-mobile-menu hidden-md-up\">menu</i>
    <a class=\"logo pull-left\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDashboard&amp;token=8ed70639c2196bef5328bcfc25286045\"></a>

    <div class=\"component pull-left hidden-md-down\"><div class=\"ps-dropdown dropdown\">
  <span type=\"button\" id=\"quick-access\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
    <span class=\"selected-item\">Quick Access</span> 
    <i class=\"material-icons arrow-down pull-right\">keyboard_arrow_down</i>
  </span>
  <div class=\"ps-dropdown-menu dropdown-menu\" aria-labelledby=\"quick-access\">
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=steasycontent&amp;token=bc97b10524afbe7b2ca93ae237ef0d54\"
                 data-item=\"ACC  (ADMIN-ONLY)\"
      >ACC  (ADMIN-ONLY)</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php/product/new?token=efa7fb6aa353566b79feaf06fe692bb9\"
                 data-item=\"ADD NEW PRODUCT\"
      >ADD NEW PRODUCT</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminStBlog&amp;token=fb410664a525652cc63314ab56d73ce5\"
                 data-item=\"BLOG\"
      >BLOG</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPerformance&amp;token=d0b838378e8fbb55e6569a2a0748e4a0\"
                 data-item=\"CLEAR CACHE\"
      >CLEAR CACHE</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=dealsofthedaypro&amp;token=bc97b10524afbe7b2ca93ae237ef0d54\"
                 data-item=\"DAILY DEALS (ADMIN-ONLY)\"
      >DAILY DEALS (ADMIN-ONLY)</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=pscleaner&amp;token=bc97b10524afbe7b2ca93ae237ef0d54\"
                 data-item=\"DANGER (ADMIN-ONLY)\"
      >DANGER (ADMIN-ONLY)</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php/module/manage?token=efa7fb6aa353566b79feaf06fe692bb9\"
                 data-item=\"IM (ADMIN-ONLY)\"
      >IM (ADMIN-ONLY)</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=stmegamenu&amp;token=bc97b10524afbe7b2ca93ae237ef0d54\"
                 data-item=\"MEGA MENU\"
      >MEGA MENU</a>
        <hr>
          <a
        class=\"dropdown-item js-quick-link\"
        data-rand=\"5\"
        data-icon=\"icon-AdminCatalog\"
        data-method=\"add\"
        data-url=\"index.php/product/catalog\"
        data-post-link=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminQuickAccesses&token=cfd8503da48b59a50bf3a6db74c5bcca\"
        data-prompt-text=\"Please name this shortcut:\"
        data-link=\"Products - List\"
      >
        <i class=\"material-icons\">add_circle_outline</i>
        Add current page to QuickAccess
      </a>
        <a class=\"dropdown-item\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminQuickAccesses&token=cfd8503da48b59a50bf3a6db74c5bcca\">
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
      action=\"/nimda420/index.php?controller=AdminSearch&amp;token=d61321acc7bc050a9e1997f1374765cf\"
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
      <img class=\"avatar img-circle\" src=\"https://profile.prestashop.com/ar%40seedsherenow.com.jpg\" /><br>
      <span>A R</span>
    </div>
    <hr>
    <a class=\"employee-link profile-link\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminEmployees&amp;token=2348142b41267cc0159941f9315953d3&amp;id_employee=31&amp;updateemployee\">
      <i class=\"material-icons\">settings_applications</i> Your profile
    </a>
    <a class=\"employee-link m-t-1\" id=\"header_logout\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLogin&amp;token=636d149b90f366e54526d233976b4b97&amp;logout\">
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
            <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDashboard&amp;token=8ed70639c2196bef5328bcfc25286045\" class=\"link\" >
              <i class=\"material-icons\">trending_up</i> <span>Dashboard</span>
            </a>
          </li>

        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down -active\" data-submenu=\"2\">
              <span class=\"title\">Sell</span>
          </li>

                          
                
                                
                <li class=\"link-levelone \" data-submenu=\"3\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrders&amp;token=6765e4d212ea4d8afe68a5049c5f1c32\" class=\"link\">
                    <i class=\"material-icons\">shopping_basket</i>
                    <span>
                    Orders
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"4\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrders&amp;token=6765e4d212ea4d8afe68a5049c5f1c32\" class=\"link\"> Orders
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"5\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminInvoices&amp;token=f7ca528e6ebe0fa59724ad84fcf9c209\" class=\"link\"> Invoices
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"6\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminSlip&amp;token=ba13490599380521880c421fcce6d4df\" class=\"link\"> Credit Slips
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"7\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDeliverySlip&amp;token=78e9d8da402c78c8cee406f4b55d97f4\" class=\"link\"> Delivery Slips
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"8\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCarts&amp;token=e3fab8325cfbd8f9ab03653ed18c4c33\" class=\"link\"> Shopping Carts
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"142\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrdersPlusPlus&amp;token=fe17b91e97cf5feab270033727f4e464\" class=\"link\"> Orders++
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone -active\" data-submenu=\"9\">
                  <a href=\"/nimda420/index.php/product/catalog?_token=yEWRqFGfrC0I4QRRS_UYAFBveASRGIOsGuPuIv38tlE\" class=\"link\">
                    <i class=\"material-icons\">store</i>
                    <span>
                    Catalog
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo -active\" data-submenu=\"10\">
                              <a href=\"/nimda420/index.php/product/catalog?_token=yEWRqFGfrC0I4QRRS_UYAFBveASRGIOsGuPuIv38tlE\" class=\"link\"> Products
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"11\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCategories&amp;token=e12ef30b0acddd5dec794820e610b8ea\" class=\"link\"> Categories
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"12\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminTracking&amp;token=9e7eef6d0352f959a58ecb60687b03cc\" class=\"link\"> Monitoring
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"13\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAttributesGroups&amp;token=d323f1a5ed6c39e27b2874bacc495639\" class=\"link\"> Attributes &amp; Features
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"16\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminManufacturers&amp;token=6a65c8de4c1f03b0f6e755bd20836fb9\" class=\"link\"> Brands &amp; Suppliers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"19\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAttachments&amp;token=9e7ed85d62087c633dd2bfc2a32c539e\" class=\"link\"> Files
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"20\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCartRules&amp;token=c2616e831ddcbf63b8b8deffe7439222\" class=\"link\"> Discounts
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"23\">
                              <a href=\"/nimda420/index.php/stock/?_token=yEWRqFGfrC0I4QRRS_UYAFBveASRGIOsGuPuIv38tlE\" class=\"link\"> Stocks
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"125\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminMassEditProduct&amp;token=e5ba664163eeb3e57a92c447ab228893\" class=\"link\"> Mass edit product
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"132\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminProductGrid&amp;token=d8b4256c455258ba4cb27f3baeca3fc0\" class=\"link\"> Grid Products
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"24\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomers&amp;token=585da99b9bb7f5cbade3faaee79a1b0d\" class=\"link\">
                    <i class=\"material-icons\">account_circle</i>
                    <span>
                    Customers
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"25\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomers&amp;token=585da99b9bb7f5cbade3faaee79a1b0d\" class=\"link\"> Customers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"26\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAddresses&amp;token=a3bfd795d277e1856327a9b0f9c1474d\" class=\"link\"> Addresses
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"28\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomerThreads&amp;token=43032b1db8350001ed7bc39d723c4a53\" class=\"link\">
                    <i class=\"material-icons\">chat</i>
                    <span>
                    Customer Service
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"29\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomerThreads&amp;token=43032b1db8350001ed7bc39d723c4a53\" class=\"link\"> Customer Service
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"30\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrderMessage&amp;token=beab814942eb94fee1783b0af2450135\" class=\"link\"> Order Messages
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"31\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminReturn&amp;token=336a37bbaa765db78cfa1971748707b5\" class=\"link\"> Merchandise Returns
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"32\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminStats&amp;token=0fa14e5e927c2d3b8b207b0572ee87b2\" class=\"link\">
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
                  <a href=\"/nimda420/index.php/module/catalog?_token=yEWRqFGfrC0I4QRRS_UYAFBveASRGIOsGuPuIv38tlE\" class=\"link\">
                    <i class=\"material-icons\">extension</i>
                    <span>
                    Modules
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"44\">
                              <a href=\"/nimda420/index.php/module/catalog?_token=yEWRqFGfrC0I4QRRS_UYAFBveASRGIOsGuPuIv38tlE\" class=\"link\"> Modules &amp; Services
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"46\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAddonsCatalog&amp;token=78ed75485a7d8354b9294f4d1fa31cfe\" class=\"link\"> Modules Catalog
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"47\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminThemes&amp;token=152d95539799a3a21674aacaffb349a9\" class=\"link\">
                    <i class=\"material-icons\">desktop_mac</i>
                    <span>
                    Design
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-47\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"48\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminThemes&amp;token=152d95539799a3a21674aacaffb349a9\" class=\"link\"> Theme &amp; Logo
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"49\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminThemesCatalog&amp;token=bb2f13634acab52806712ce103a3ef17\" class=\"link\"> Theme Catalog
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"50\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCmsContent&amp;token=08eae2f5c32b8750195e043c964f3d00\" class=\"link\"> Pages
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"51\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModulesPositions&amp;token=56c315323ca38c42fcdba4da6d32a0bd\" class=\"link\"> Positions
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"52\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminImages&amp;token=d18e0cae2dfcbcb8b3d6cccc26fd50f5\" class=\"link\"> Image Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"117\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLinkWidget&amp;token=9135e4f29a7f97d87cb401bd0dc7490e\" class=\"link\"> Link Widget
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"53\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCarriers&amp;token=572e293a659720cdd86f34138b61d49f\" class=\"link\">
                    <i class=\"material-icons\">local_shipping</i>
                    <span>
                    Shipping
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-53\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"54\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCarriers&amp;token=572e293a659720cdd86f34138b61d49f\" class=\"link\"> Carriers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"55\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminShipping&amp;token=149c0fe7232e19922eaae0f0ad72fb64\" class=\"link\"> Preferences
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"56\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPayment&amp;token=6fda9eba53c7582293047fd55613ad10\" class=\"link\">
                    <i class=\"material-icons\">payment</i>
                    <span>
                    Payment
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-56\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"57\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPayment&amp;token=6fda9eba53c7582293047fd55613ad10\" class=\"link\"> Payment Methods
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"58\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPaymentPreferences&amp;token=8ad606cffe49f138a4d35352a38db499\" class=\"link\"> Preferences
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"59\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLocalization&amp;token=3182d28c8a333d49b1fdeae62ac5e73c\" class=\"link\">
                    <i class=\"material-icons\">language</i>
                    <span>
                    International
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-59\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"60\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLocalization&amp;token=3182d28c8a333d49b1fdeae62ac5e73c\" class=\"link\"> Localization
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"65\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCountries&amp;token=f147f86c4364100fee5369b1ff68e37e\" class=\"link\"> Locations
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"69\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminTaxes&amp;token=b67eaa61a42f991691e664caf146b377\" class=\"link\"> Taxes
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"72\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminTranslations&amp;token=8284d733c300f70b7929566ec3445a1d\" class=\"link\"> Translations
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"171\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminNewsTicker&amp;token=62fd01f69c8c3fac3d2497751678a0bc\" class=\"link\">
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
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPreferences&amp;token=636444fc462a8a3aa98641365192b2a8\" class=\"link\">
                    <i class=\"material-icons\">settings</i>
                    <span>
                    Shop Parameters
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-74\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"75\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPreferences&amp;token=636444fc462a8a3aa98641365192b2a8\" class=\"link\"> General
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"78\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrderPreferences&amp;token=ac28bb72ab7fd75e6e11e109cfd7edb3\" class=\"link\"> Order Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"81\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPPreferences&amp;token=e6599ecdba413672ea76bd89a71ac676\" class=\"link\"> Product Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"82\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomerPreferences&amp;token=95bd666323b15b4d3291368efbaa61a1\" class=\"link\"> Customer Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"86\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminContacts&amp;token=62e70a2cb750da57a01b189613fa3c4e\" class=\"link\"> Contact
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"89\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminMeta&amp;token=86e1e42832125b29439aee9b2a5e4fe7\" class=\"link\"> Traffic &amp; SEO
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"93\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminSearchConf&amp;token=979542b49901776ff059b9c547b9668b\" class=\"link\"> Search
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"119\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminGamification&amp;token=2e39e842c67f14609042313cac95c43d\" class=\"link\"> Merchant Expertise
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"96\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminInformation&amp;token=c3d42dadc1b7e7e9d74e62d9c0656ad3\" class=\"link\">
                    <i class=\"material-icons\">settings_applications</i>
                    <span>
                    Advanced Parameters
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-96\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"97\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminInformation&amp;token=c3d42dadc1b7e7e9d74e62d9c0656ad3\" class=\"link\"> Information
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"98\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPerformance&amp;token=d0b838378e8fbb55e6569a2a0748e4a0\" class=\"link\"> Performance
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"99\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAdminPreferences&amp;token=7fa5f534ce22b3e773ddb28ecd259646\" class=\"link\"> Administration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"100\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminEmails&amp;token=b8409d6b1a82592e8b2f35f94c1334dc\" class=\"link\"> E-mail
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"101\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminImport&amp;token=b5cdc5dfbfd8fc7eba1801a6ec8cf308\" class=\"link\"> Import
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"102\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminEmployees&amp;token=2348142b41267cc0159941f9315953d3\" class=\"link\"> Team
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"106\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminRequestSql&amp;token=ad65f2cf5ad615cdfa4eb40402b01a0c\" class=\"link\"> Database
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"109\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLogs&amp;token=ac32c394a6ef82f0c028db9afb42f9c6\" class=\"link\"> Logs
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"110\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminWebservice&amp;token=0fdf61ab80d12e1cc3591b4c4c209e9d\" class=\"link\"> Webservice
                              </a>
                            </li>

                                                                                                                                                                            </ul>
                                    </li>
                                                                                            
                
                                
                <li class=\"link-levelone \" data-submenu=\"128\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsCategory&amp;token=da17b834bcdae0e8485fa44cdab0657f\" class=\"link\">
                    <i class=\"material-icons\">description</i>
                    <span>
                    Faqs
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-128\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"129\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsCategory&amp;token=da17b834bcdae0e8485fa44cdab0657f\" class=\"link\"> Categories
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"130\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsPost&amp;token=86db807c371a0581a9beaa5f88b918d7\" class=\"link\"> Questions/Answers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"131\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsSettings&amp;token=9a4bb12c246174c2e6108c23cc06a4de\" class=\"link\"> Settings
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"287\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSlider&amp;token=11cb36a1e4eee7d3d0479d86b2a9b34a\" class=\"link\">
                    <i class=\"material-icons\">collections</i>
                    <span>
                    Creative Slider
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-287\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"288\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSlider&amp;token=11cb36a1e4eee7d3d0479d86b2a9b34a\" class=\"link\"> Sliders
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"290\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSliderRevisions&amp;token=7b6b81890da5467cbfe1618bf0ed261c\" class=\"link\"> Revisions
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"291\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSliderTransition&amp;token=6e25b67a21df8ab653dc6a6f12ecc373\" class=\"link\"> Transition Builder
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"292\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSliderSkin&amp;token=33290000617fc1c23a3c3a43151c68b4\" class=\"link\"> Skin Editor
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"293\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSliderStyle&amp;token=6b8ee5fe73506b897e3f717d832ed1d6\" class=\"link\"> CSS Editor
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"294\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopup&amp;token=47c45fc9368b83ea24216d386c7660e5\" class=\"link\">
                    <i class=\"material-icons\">filter_none</i>
                    <span>
                    Creative Popup
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-294\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"295\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopup&amp;token=47c45fc9368b83ea24216d386c7660e5\" class=\"link\"> Popups
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"297\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopupRevisions&amp;token=1918858a09053c98110493dc70c21b72\" class=\"link\"> Revisions
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"298\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopupTransition&amp;token=b553b363f413b5d50b8c8e5165b267d7\" class=\"link\"> Transition Builder
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"299\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopupSkin&amp;token=579fd5cc6ce42ffd73cf18ec33c1f5e3\" class=\"link\"> Skin Editor
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"300\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopupStyle&amp;token=14c3437b2d6969f25ee5529ab4bd12b8\" class=\"link\"> CSS Editor
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
                      <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCatalog&amp;token=2123f6e8d8ac8a84d9e510675ffb9ee4\">Catalog</a>
                  </li>
      
              <li>
                      <a href=\"/nimda420/index.php/product/catalog?_token=yEWRqFGfrC0I4QRRS_UYAFBveASRGIOsGuPuIv38tlE\">Products</a>
                  </li>
      
    </ol>
  

  
    <h2 class=\"title\">
      Products    </h2>
  

  
    <div class=\"toolbar-icons\">
                                  
        <a
          class=\"toolbar-button toolbar_btn\"
          id=\"page-header-desc-configuration-modules-list\"
          href=\"/nimda420/index.php/module/catalog?_token=yEWRqFGfrC0I4QRRS_UYAFBveASRGIOsGuPuIv38tlE\"          title=\"Recommended Modules and Services\"
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
\t\t\t\t\t<a href=\"https://addons.prestashop.com/en/login?email=ar%40seedsherenow.com&amp;firstname=A&amp;lastname=R&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/nimda420/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
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
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/en/login?email=ar%40seedsherenow.com&amp;firstname=A&amp;lastname=R&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\">
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
        // line 1234
        $this->displayBlock('content_header', $context, $blocks);
        // line 1235
        echo "                 ";
        $this->displayBlock('content', $context, $blocks);
        // line 1236
        echo "                 ";
        $this->displayBlock('content_footer', $context, $blocks);
        // line 1237
        echo "                 ";
        $this->displayBlock('sidebar_right', $context, $blocks);
        // line 1238
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
  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDashboard&amp;token=8ed70639c2196bef5328bcfc25286045\" class=\"btn btn-primary p-y-1 m-t-3\">
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
    <span id=\"footer-load-time\"><i class=\"icon-time\" title=\"Load time: \"></i> 0.485s</span>
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
\t\t\t\t\t<a href=\"https://addons.prestashop.com/en/login?email=ar%40seedsherenow.com&amp;firstname=A&amp;lastname=R&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/nimda420/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
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
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/en/login?email=ar%40seedsherenow.com&amp;firstname=A&amp;lastname=R&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\">
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
        // line 1403
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>
</html>";
    }

    // line 94
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    public function block_extra_stylesheets($context, array $blocks = array())
    {
    }

    // line 1234
    public function block_content_header($context, array $blocks = array())
    {
    }

    // line 1235
    public function block_content($context, array $blocks = array())
    {
    }

    // line 1236
    public function block_content_footer($context, array $blocks = array())
    {
    }

    // line 1237
    public function block_sidebar_right($context, array $blocks = array())
    {
    }

    // line 1403
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
        return "__string_template__91628c5acd6cb3df5897d6aa0c0b495a09ad777fe4efe2815a01427d29e1a943";
    }

    public function getDebugInfo()
    {
        return array (  1482 => 1403,  1477 => 1237,  1472 => 1236,  1467 => 1235,  1462 => 1234,  1453 => 94,  1445 => 1403,  1278 => 1238,  1275 => 1237,  1272 => 1236,  1269 => 1235,  1267 => 1234,  123 => 94,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__91628c5acd6cb3df5897d6aa0c0b495a09ad777fe4efe2815a01427d29e1a943", "");
    }
}
