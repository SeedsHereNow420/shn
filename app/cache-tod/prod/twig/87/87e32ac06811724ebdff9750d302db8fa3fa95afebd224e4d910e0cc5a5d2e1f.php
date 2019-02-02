<?php

/* __string_template__a572b8e14bb922005004eeb0c731b1cebebd16e8d2f04203ac2c82022af73f11 */
class __TwigTemplate_b0252cb34525879eacd89278a8d3c60dab9c35476c0b279bca15eabfbaee703f extends Twig_Template
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

<title>Manage installed modules • Seeds Here Now</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminModules';
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
    var token = '983a041fde783ab5faa436f10d047a78';
    var token_admin_orders = '64d145d94bf774284b24c191badedf95';
    var token_admin_customers = 'e4d400629375755361a7783e93a232a7';
    var token_admin_customer_threads = '885cb0d29fb38760c91aa932ff587082';
    var currentIndex = 'index.php?controller=AdminModules';
    var employee_token = '70505f68808496533aa1d2683b3d1866';
    var choose_language_translate = 'Choose language';
    var default_language = '1';
    var admin_modules_link = '/nimda420/index.php/module/catalog/recommended?route=admin_module_catalog_post&_token=rjr0iLjPY8pt_yZNQcHWP5l4At1oJzEC3HuW4MYYQtE';
    var tab_modules_list = '';
    var update_success_msg = 'Update successful';
    var errorLogin = 'PrestaShop was unable to log in to Addons. Please check your credentials and your Internet connection.';
    var search_product_msg = 'Search for a product';
  </script>

      <link href=\"/modules/dealsofthedaypro/views/css/admin.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/nimda420/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/nimda420/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/prismpay/views/css/prismpayadmin.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var ajax_url = \"index.php?tab=AdminModules&configure=dealsofthedaypro&token=983a041fde783ab5faa436f10d047a78\";
var baseAdminDir = \"\\/nimda420\\/\";
var baseDir = \"\\/\";
var currency = {\"iso_code\":\"USD\",\"sign\":\"\$\",\"name\":\"US Dollar\",\"format\":\"\\u00a4#,##0.00\"};
var host_mode = false;
var show_new_customers = \"0\";
var show_new_messages = false;
var show_new_orders = \"0\";
</script>
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
\t\t\t\tvar admin_stblog_ajax_url = 'https://www.seedsherenow.com/nimda420/index.php?controller=AdminStBlog&token=529bc83db6db6c8d270e1a6af40efe62';
\t\t\t\tvar current_id_tab = 45;
\t\t\t</script>
<script type=\"text/javascript\">
    var FSAU = FSAU || { };
    FSAU.menu_button_text = 'Duplicated URLs';
    FSAU.menu_button_url = 'https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;token=983a041fde783ab5faa436f10d047a78&amp;configure=fsadvancedurl&amp;tab_section=fsau_duplicate_tab';
    FSAU.params_hash = '23ad5cb1e18349c183a1f104e82a0deaae98d38c';
</script>
<script type=\"text/javascript\" src=\"/modules/fsadvancedurl/views/js/admin.js\"></script>

";
        // line 86
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>
<body class=\"adminmodules\">



<header>
  <nav class=\"main-header\">

    <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

    
    

    
    <i class=\"material-icons pull-left p-x-1 js-mobile-menu hidden-md-up\">menu</i>
    <a class=\"logo pull-left\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDashboard&amp;token=4596cfee2d3fda7e5d76bd8ac189d80f\"></a>

    <div class=\"component pull-left hidden-md-down\"><div class=\"ps-dropdown dropdown\">
  <span type=\"button\" id=\"quick-access\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
    <span class=\"selected-item\">Quick Access</span> 
    <i class=\"material-icons arrow-down pull-right\">keyboard_arrow_down</i>
  </span>
  <div class=\"ps-dropdown-menu dropdown-menu\" aria-labelledby=\"quick-access\">
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=steasycontent&amp;token=983a041fde783ab5faa436f10d047a78\"
                 data-item=\"ACC  (ADMIN-ONLY)\"
      >ACC  (ADMIN-ONLY)</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php/product/new?token=f36726b9489c80c9f5404fd383cb59f1\"
                 data-item=\"ADD NEW PRODUCT\"
      >ADD NEW PRODUCT</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminStBlog&amp;token=529bc83db6db6c8d270e1a6af40efe62\"
                 data-item=\"BLOG\"
      >BLOG</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPerformance&amp;token=2747811941417322a644c3ec03cc5044\"
                 data-item=\"CLEAR CACHE\"
      >CLEAR CACHE</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=dealsofthedaypro&amp;token=983a041fde783ab5faa436f10d047a78\"
                 data-item=\"DAILY DEALS (ADMIN-ONLY)\"
      >DAILY DEALS (ADMIN-ONLY)</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=pscleaner&amp;token=983a041fde783ab5faa436f10d047a78\"
                 data-item=\"DANGER (ADMIN-ONLY)\"
      >DANGER (ADMIN-ONLY)</a>
          <a class=\"dropdown-item active\"
         href=\"https://www.seedsherenow.com/nimda420/index.php/module/manage?token=f36726b9489c80c9f5404fd383cb59f1\"
                 data-item=\"IM (ADMIN-ONLY)\"
      >IM (ADMIN-ONLY)</a>
          <a class=\"dropdown-item\"
         href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModules&amp;configure=stmegamenu&amp;token=983a041fde783ab5faa436f10d047a78\"
                 data-item=\"MEGA MENU\"
      >MEGA MENU</a>
        <hr>
          <a
         class=\"dropdown-item js-quick-link\"
         data-method=\"remove\"
         data-quicklink-id=\"5\"
         data-rand=\"134\"
         data-icon=\"icon-AdminParentModulesSf\"
         data-url=\"index.php/module/manage\"
         data-post-link=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminQuickAccesses&token=0b4ab288a90840e980279558d314485a\"
         data-prompt-text=\"Please name this shortcut:\"
         data-link=\" - List\"
      >
        <i class=\"material-icons\">remove_circle_outline</i>
        Remove from QuickAccess
      </a>
        <a class=\"dropdown-item\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminQuickAccesses&token=0b4ab288a90840e980279558d314485a\">
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
      action=\"/nimda420/index.php?controller=AdminSearch&amp;token=ec225b2cc07dcfd082ccc4f54f04f75b\"
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
      <img class=\"avatar img-circle\" src=\"https://profile.prestashop.com/webmaster%40420cyber.com.jpg\" /><br>
      <span>web master</span>
    </div>
    <hr>
    <a class=\"employee-link profile-link\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminEmployees&amp;token=70505f68808496533aa1d2683b3d1866&amp;id_employee=1&amp;updateemployee\">
      <i class=\"material-icons\">settings_applications</i> Your profile
    </a>
    <a class=\"employee-link m-t-1\" id=\"header_logout\" href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLogin&amp;token=4a392aae99acd90bef2d9674232dfb9a&amp;logout\">
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
            <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDashboard&amp;token=4596cfee2d3fda7e5d76bd8ac189d80f\" class=\"link\" >
              <i class=\"material-icons\">trending_up</i> <span>Dashboard</span>
            </a>
          </li>

        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down \" data-submenu=\"2\">
              <span class=\"title\">Sell</span>
          </li>

                          
                
                                
                <li class=\"link-levelone \" data-submenu=\"3\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrders&amp;token=64d145d94bf774284b24c191badedf95\" class=\"link\">
                    <i class=\"material-icons\">shopping_basket</i>
                    <span>
                    Orders
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"4\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrders&amp;token=64d145d94bf774284b24c191badedf95\" class=\"link\"> Orders
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"5\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminInvoices&amp;token=007fc01da29826247e89da9791265ca2\" class=\"link\"> Invoices
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"6\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminSlip&amp;token=97394907766fc154213334636cdcad79\" class=\"link\"> Credit Slips
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"7\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDeliverySlip&amp;token=366fd42aec3c66e0a2743d385fd51170\" class=\"link\"> Delivery Slips
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"8\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCarts&amp;token=0062d0abf3014f71da7f9053065ef825\" class=\"link\"> Shopping Carts
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"142\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrdersPlusPlus&amp;token=56281d335ecb35e226eff19d1ad33421\" class=\"link\"> Orders++
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"9\">
                  <a href=\"/nimda420/index.php/product/catalog?_token=rjr0iLjPY8pt_yZNQcHWP5l4At1oJzEC3HuW4MYYQtE\" class=\"link\">
                    <i class=\"material-icons\">store</i>
                    <span>
                    Catalog
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"10\">
                              <a href=\"/nimda420/index.php/product/catalog?_token=rjr0iLjPY8pt_yZNQcHWP5l4At1oJzEC3HuW4MYYQtE\" class=\"link\"> Products
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"11\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCategories&amp;token=9e10966b4fe7fe0f69719f0a89131823\" class=\"link\"> Categories
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"12\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminTracking&amp;token=44de0d0f4d68ea00a0b26501b833241b\" class=\"link\"> Monitoring
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"13\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAttributesGroups&amp;token=2fa2dada698311c38ad1313b63a1e828\" class=\"link\"> Attributes &amp; Features
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"16\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminManufacturers&amp;token=dc1c66cda2c26772ccf552270b514b1e\" class=\"link\"> Brands &amp; Suppliers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"19\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAttachments&amp;token=7c72d159e4deadb5bd38644ff1df3239\" class=\"link\"> Files
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"20\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCartRules&amp;token=2a7d1d79c4ea3fe1057cc55186e17b2f\" class=\"link\"> Discounts
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"23\">
                              <a href=\"/nimda420/index.php/stock/?_token=rjr0iLjPY8pt_yZNQcHWP5l4At1oJzEC3HuW4MYYQtE\" class=\"link\"> Stocks
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"125\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminMassEditProduct&amp;token=f334848247e54f7328046ed70e56eb18\" class=\"link\"> Mass edit product
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"132\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminProductGrid&amp;token=8bf02e4def93cef8d6bae0d422b3c507\" class=\"link\"> Grid Products
                              </a>
                            </li>

                                                                                                                                                                            </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"24\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomers&amp;token=e4d400629375755361a7783e93a232a7\" class=\"link\">
                    <i class=\"material-icons\">account_circle</i>
                    <span>
                    Customers
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"25\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomers&amp;token=e4d400629375755361a7783e93a232a7\" class=\"link\"> Customers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"26\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAddresses&amp;token=3f74ec386826785dd27752e6fb0d3937\" class=\"link\"> Addresses
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"28\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomerThreads&amp;token=885cb0d29fb38760c91aa932ff587082\" class=\"link\">
                    <i class=\"material-icons\">chat</i>
                    <span>
                    Customer Service
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"29\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomerThreads&amp;token=885cb0d29fb38760c91aa932ff587082\" class=\"link\"> Customer Service
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"30\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrderMessage&amp;token=dc6e0e2c4733c154687a82e73424558e\" class=\"link\"> Order Messages
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"31\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminReturn&amp;token=73d8796c584f8f456761e05799aa61a1\" class=\"link\"> Merchandise Returns
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"32\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminStats&amp;token=99c1cf43a2896c5b14dc010005f44cba\" class=\"link\">
                    <i class=\"material-icons\">assessment</i>
                    <span>
                    Stats
                                        </span>

                  </a>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down -active\" data-submenu=\"42\">
              <span class=\"title\">Improve</span>
          </li>

                          
                
                                
                <li class=\"link-levelone -active\" data-submenu=\"43\">
                  <a href=\"/nimda420/index.php/module/catalog?_token=rjr0iLjPY8pt_yZNQcHWP5l4At1oJzEC3HuW4MYYQtE\" class=\"link\">
                    <i class=\"material-icons\">extension</i>
                    <span>
                    Modules
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"44\">
                              <a href=\"/nimda420/index.php/module/catalog?_token=rjr0iLjPY8pt_yZNQcHWP5l4At1oJzEC3HuW4MYYQtE\" class=\"link\"> Modules &amp; Services
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"46\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAddonsCatalog&amp;token=cf71a7d0c7ed8c9739393c7fe07fa392\" class=\"link\"> Modules Catalog
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"47\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminThemes&amp;token=dd28c37b53d5a130f3ea793988c0a6f2\" class=\"link\">
                    <i class=\"material-icons\">desktop_mac</i>
                    <span>
                    Design
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-47\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"48\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminThemes&amp;token=dd28c37b53d5a130f3ea793988c0a6f2\" class=\"link\"> Theme &amp; Logo
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"49\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminThemesCatalog&amp;token=3be9841d67aab091028895c09d3cc3a6\" class=\"link\"> Theme Catalog
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"50\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCmsContent&amp;token=841a71d86c859ed0da60f896f459065d\" class=\"link\"> Pages
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"51\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminModulesPositions&amp;token=06fb2bd0637ea7284d556f38e79ef39f\" class=\"link\"> Positions
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"52\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminImages&amp;token=8001da3b5345bfd50359c8c5f38557ac\" class=\"link\"> Image Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"117\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLinkWidget&amp;token=b383f2af8cdd0577d72ce459c45325cb\" class=\"link\"> Link Widget
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"53\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCarriers&amp;token=295a8a30ce2181059b503a5911207d3d\" class=\"link\">
                    <i class=\"material-icons\">local_shipping</i>
                    <span>
                    Shipping
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-53\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"54\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCarriers&amp;token=295a8a30ce2181059b503a5911207d3d\" class=\"link\"> Carriers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"55\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminShipping&amp;token=e974b4af300909cfd1551ead999bacee\" class=\"link\"> Preferences
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"56\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPayment&amp;token=d8a77870f4cc58cf13820b63d76a0016\" class=\"link\">
                    <i class=\"material-icons\">payment</i>
                    <span>
                    Payment
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-56\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"57\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPayment&amp;token=d8a77870f4cc58cf13820b63d76a0016\" class=\"link\"> Payment Methods
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"58\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPaymentPreferences&amp;token=8cd515a21903a3045ab4e96449e81cb7\" class=\"link\"> Preferences
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"59\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLocalization&amp;token=3f702a29a187c50160a5568c12089922\" class=\"link\">
                    <i class=\"material-icons\">language</i>
                    <span>
                    International
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-59\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"60\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLocalization&amp;token=3f702a29a187c50160a5568c12089922\" class=\"link\"> Localization
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"65\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCountries&amp;token=964c6554f848598a52bfdd6890ec22a1\" class=\"link\"> Locations
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"69\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminTaxes&amp;token=66403dea59e41c5d15feabeae85a978d\" class=\"link\"> Taxes
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"72\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminTranslations&amp;token=e8a404f94e90759977795e7bda10fd01\" class=\"link\"> Translations
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"171\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminNewsTicker&amp;token=3ef8bb8d13bca419c7b529a98948ea35\" class=\"link\">
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
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPreferences&amp;token=e1db5b231dc19f6fe0878518c0084fc1\" class=\"link\">
                    <i class=\"material-icons\">settings</i>
                    <span>
                    Shop Parameters
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-74\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"75\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPreferences&amp;token=e1db5b231dc19f6fe0878518c0084fc1\" class=\"link\"> General
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"78\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminOrderPreferences&amp;token=15528f00d9e7ec7ab69db15232dd8eb0\" class=\"link\"> Order Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"81\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPPreferences&amp;token=d53cd29f73b2127dbfc6db835d64b3f2\" class=\"link\"> Product Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"82\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCustomerPreferences&amp;token=1143984ed7c867f98a8fdfe50397b8c6\" class=\"link\"> Customer Settings
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"86\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminContacts&amp;token=1dedead6d6af003d54adb4d917548051\" class=\"link\"> Contact
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"89\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminMeta&amp;token=e519bbccb476f5371280b2a1b9dfaa25\" class=\"link\"> Traffic &amp; SEO
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"93\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminSearchConf&amp;token=1bddb0faa69a70db5026325bbc0cef6b\" class=\"link\"> Search
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"119\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminGamification&amp;token=48fb69bb4595e52e0aa42e52a8cffee3\" class=\"link\"> Merchant Expertise
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"96\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminInformation&amp;token=3653b0d8cc4ed9a97426cb7300c2eaac\" class=\"link\">
                    <i class=\"material-icons\">settings_applications</i>
                    <span>
                    Advanced Parameters
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-96\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"97\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminInformation&amp;token=3653b0d8cc4ed9a97426cb7300c2eaac\" class=\"link\"> Information
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"98\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminPerformance&amp;token=2747811941417322a644c3ec03cc5044\" class=\"link\"> Performance
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"99\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminAdminPreferences&amp;token=4219228ac3a0fedbd04bebb62550e13b\" class=\"link\"> Administration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"100\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminEmails&amp;token=4159f5290fe455004f79cc4975a59583\" class=\"link\"> E-mail
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"101\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminImport&amp;token=1ec3a2b2abdb99457be03bb5a671382b\" class=\"link\"> Import
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"102\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminEmployees&amp;token=70505f68808496533aa1d2683b3d1866\" class=\"link\"> Team
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"106\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminRequestSql&amp;token=17cb84128e972051a12e8ef042f17513\" class=\"link\"> Database
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"109\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLogs&amp;token=be42370a9206300ce01e56a05ce4cbf1\" class=\"link\"> Logs
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"110\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminWebservice&amp;token=c3214d9109eb4ddc844190b9aec32f1d\" class=\"link\"> Webservice
                              </a>
                            </li>

                                                                                                                                                                            </ul>
                                    </li>
                                                                                            
                
                                
                <li class=\"link-levelone \" data-submenu=\"128\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsCategory&amp;token=d7e89517e8dda50eadb38c8f2a183082\" class=\"link\">
                    <i class=\"material-icons\">description</i>
                    <span>
                    Faqs
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-128\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"129\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsCategory&amp;token=d7e89517e8dda50eadb38c8f2a183082\" class=\"link\"> Categories
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"130\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsPost&amp;token=739dca0b56ce3185200c2fc514dcf812\" class=\"link\"> Questions/Answers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"131\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminFaqsSettings&amp;token=d595f1dada2b96a944bc40d8c8c4e035\" class=\"link\"> Settings
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"287\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSlider&amp;token=6724d0fcf91928a7c4c9960374f5057c\" class=\"link\">
                    <i class=\"material-icons\">collections</i>
                    <span>
                    Creative Slider
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-287\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"288\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSlider&amp;token=6724d0fcf91928a7c4c9960374f5057c\" class=\"link\"> Sliders
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"290\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSliderRevisions&amp;token=8ed3042b42480dcb4c9e47bddd2813f0\" class=\"link\"> Revisions
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"291\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSliderTransition&amp;token=535d05bc882d7da475d133a3fed5486f\" class=\"link\"> Transition Builder
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"292\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSliderSkin&amp;token=066705404e0e270fbb669ae73940854e\" class=\"link\"> Skin Editor
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"293\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminLayerSliderStyle&amp;token=5fafced06d1f8059a366cf3301338711\" class=\"link\"> CSS Editor
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"294\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopup&amp;token=89884a00017d13f4a8850afefd154767\" class=\"link\">
                    <i class=\"material-icons\">filter_none</i>
                    <span>
                    Creative Popup
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-294\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"295\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopup&amp;token=89884a00017d13f4a8850afefd154767\" class=\"link\"> Popups
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"297\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopupRevisions&amp;token=e7b8fe2348b9c05bb7ae49dd45a9a42c\" class=\"link\"> Revisions
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"298\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopupTransition&amp;token=43ad4b8193b21535b4079ed8e3e605c3\" class=\"link\"> Transition Builder
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"299\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopupSkin&amp;token=b8501b6f21432ffbecee156aa5b788a2\" class=\"link\"> Skin Editor
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"300\">
                              <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminCreativePopupStyle&amp;token=f11e3821b9cd537d7a923178d1ab6221\" class=\"link\"> CSS Editor
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down \" data-submenu=\"114\">
              <span class=\"title\">More</span>
          </li>

                          
                
                                
                <li class=\"link-levelone \" data-submenu=\"301\">
                  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminSelfUpgrade&amp;token=4ee14e52c804f1e336adc9c2b0711077\" class=\"link\">
                    <i class=\"material-icons\"></i>
                    <span>
                    1-Click Upgrade
                                        </span>

                  </a>
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
                      <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminParentModulesSf&amp;token=47fbe1446a86a5b49f034949a2925a15\">Modules</a>
                  </li>
      
      
    </ol>
  

  
    <h2 class=\"title\">
      Manage installed modules    </h2>
  

  
    <div class=\"toolbar-icons\">
                        
          <a
            class=\"m-b-2 m-r-1 btn btn-primary  pointer\"            id=\"page-header-desc-configuration-add_module\"
            href=\"#\"            title=\"Upload a module\"            data-toggle=\"tooltip\"
            data-placement=\"bottom\"          >
            <i class=\"material-icons\">cloud_upload</i>
            <span class=\"title\">Upload a module</span>
          </a>
                                
          <a
            class=\"m-b-2 m-r-1 btn btn-primary  pointer\"            id=\"page-header-desc-configuration-addons_connect\"
            href=\"#\"            title=\"Connect to Addons marketplace\"            data-toggle=\"tooltip\"
            data-placement=\"bottom\"          >
            <i class=\"material-icons\">vpn_key</i>
            <span class=\"title\">Connect to Addons marketplace</span>
          </a>
                          
                  <a class=\"toolbar-button btn-help btn-sidebar\" href=\"#\"
             title=\"Help\"
             data-toggle=\"sidebar\"
             data-target=\"#right-sidebar\"
             data-url=\"/nimda420/index.php/common/sidebar/http%253A%252F%252Fhelp.prestashop.com%252Fen%252Fdoc%252FAdminModules%253Fversion%253D1.7.2.4%2526country%253Den/Help?_token=rjr0iLjPY8pt_yZNQcHWP5l4At1oJzEC3HuW4MYYQtE\"
             id=\"product_form_open_help\"
          >
            <i class=\"material-icons\">help</i>
            <span class=\"title\">Help</span>
          </a>
                  </div>
  
        <div class=\"page-head-tabs\">
                <a class=\"tab\"
   href=\"/nimda420/index.php/module/catalog?_token=rjr0iLjPY8pt_yZNQcHWP5l4At1oJzEC3HuW4MYYQtE\">Selection</a>

                <a class=\"tab current\"
   href=\"/nimda420/index.php/module/manage?_token=rjr0iLjPY8pt_yZNQcHWP5l4At1oJzEC3HuW4MYYQtE\">Installed modules</a>

                <a class=\"tab\"
   href=\"/nimda420/index.php/module/notifications?_token=rjr0iLjPY8pt_yZNQcHWP5l4At1oJzEC3HuW4MYYQtE\">Notifications  <div class=\"notification-container\">
    <span class=\"notification-counter\">5</span>
  </div>
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
\t\t\t\t\t<a href=\"https://addons.prestashop.com/en/login?email=webmaster%40420cyber.com&amp;firstname=web&amp;lastname=master&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/nimda420/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
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
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/en/login?email=webmaster%40420cyber.com&amp;firstname=web&amp;lastname=master&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\">
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
        // line 1273
        $this->displayBlock('content_header', $context, $blocks);
        // line 1274
        echo "                 ";
        $this->displayBlock('content', $context, $blocks);
        // line 1275
        echo "                 ";
        $this->displayBlock('content_footer', $context, $blocks);
        // line 1276
        echo "                 ";
        $this->displayBlock('sidebar_right', $context, $blocks);
        // line 1277
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
  <a href=\"https://www.seedsherenow.com/nimda420/index.php?controller=AdminDashboard&amp;token=4596cfee2d3fda7e5d76bd8ac189d80f\" class=\"btn btn-primary p-y-1 m-t-3\">
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
    <span id=\"footer-load-time\"><i class=\"icon-time\" title=\"Load time: \"></i> 1.053s</span>
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
\t\t\t\t\t<a href=\"https://addons.prestashop.com/en/login?email=webmaster%40420cyber.com&amp;firstname=web&amp;lastname=master&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/nimda420/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
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
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/en/login?email=webmaster%40420cyber.com&amp;firstname=web&amp;lastname=master&amp;website=http%3A%2F%2Fwww.seedsherenow.com%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\">
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
        // line 1442
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>
</html>";
    }

    // line 86
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    public function block_extra_stylesheets($context, array $blocks = array())
    {
    }

    // line 1273
    public function block_content_header($context, array $blocks = array())
    {
    }

    // line 1274
    public function block_content($context, array $blocks = array())
    {
    }

    // line 1275
    public function block_content_footer($context, array $blocks = array())
    {
    }

    // line 1276
    public function block_sidebar_right($context, array $blocks = array())
    {
    }

    // line 1442
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
        return "__string_template__a572b8e14bb922005004eeb0c731b1cebebd16e8d2f04203ac2c82022af73f11";
    }

    public function getDebugInfo()
    {
        return array (  1521 => 1442,  1516 => 1276,  1511 => 1275,  1506 => 1274,  1501 => 1273,  1492 => 86,  1484 => 1442,  1317 => 1277,  1314 => 1276,  1311 => 1275,  1308 => 1274,  1306 => 1273,  115 => 86,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__a572b8e14bb922005004eeb0c731b1cebebd16e8d2f04203ac2c82022af73f11", "");
    }
}
