{**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 *}

<div id="fsau-help" class="panel">
    <div class="panel-heading">
        <span>{l s='Help' mod='fsadvancedurl'}</span>
    </div>
    <div class="form-wrapper clearfix">
        Thank you for using our module. For the best user experience we provide some examples and information.
        If you need more help, please feel free to contact us.
        <h2>Getting Started</h2>
        <p>
            After installation you may delete all your shop's cache in Advanced Parameters -> <a href="{$fsau_performance_url|escape:'html':'UTF-8'|fsauCorrectTheMess}">Performance</a> -> Clear Cache<br />
            <br />
            When you have installed the module, all the URL types are enabled for advanced url.
        </p>
        <h2>Product URL Settings</h2>
        <h4 class="fsau-help-title">Parent categories or default category is enabled</h4>
        <div class="fsau-help-body fsau-hide">
            <p>
                If you enabled one of this feature, you are required to place the "<strong>{literal}{categories:/}{/literal}</strong>" or the "<strong>{literal}{category:/}{/literal}</strong>" keywords
                in the product URL schema.
                In this case you can use a same rewrite, if the products assigned for different categories.
            </p>
            <p>
                <i class="fsau-u">Example:</i><br />
                You have two products with same URL rewrite and the products have different default categories, the categories are 1. level categories so have no parents.<br />
                <br />
                Product 1: Rewrite: "messenger-bag" - Default category: "Bicycle"<br />
                Product 2: Rewrite: "messenger-bag" - Default category: "Skateboard"<br />
                <br />
                Product URL Schema: {literal}{categories:/}{rewrite}.html{/literal}<br />
                <br />
                Product 1 URL: https://www.yourdomain.com/bicycle/messenger-bag.html<br />
                Product 2 URL: https://www.yourdomain.com/skateboard/messenger-bag.html<br />
                <br />
                This module can identify the appropriate product based on the default category in the URL, so displays the proper Messenger Bag
            </p>
        </div>
        <h4 class="fsau-help-title">Product not found redirect type</h4>
        <div class="fsau-help-body fsau-hide">
            <p>
                Here you can select how to behave your store when loads a product url which is not exist.<br />
                <br />
                <span class="fsau-bold">No redirect:</span> Displays a 404 page while not changing the url<br />
                <br />
                <span class="fsau-bold">Try to redirect to category</span> Redirects to the not found product's category url based on the parent categories or default category in the URL<br />
                <i class="fsau-u">Broken product url:</i> https://www.yourdomain.com/bicycle/missing-product.html<br />
                <i class="fsau-u">Redirects to:</i> https://www.yourdomain.com/bicycle/<br />
                <br />
                <span class="fsau-bold">Redirect to page not found page</span> Redirects to: https://www.yourdomain.com/page-not-found
            </p>
        </div>
        <h2>Category URL Settings</h2>
        <h4 class="fsau-help-title">Parent categories are enabled</h4>
        <div class="fsau-help-body fsau-hide">
            <p>
                If you enabled this feature, you are required to place the "<strong>{literal}{categories:/}{/literal}</strong>" keyword in the category URL schema.
                In this case you can use a same rewrite, if the categories have different parent categories.
            </p>
            <p>
                <i class="fsau-u">Example:</i><br />
                You have two categories with same URL rewrite but the categories have different parent category<br />
                <br />
                Category 1: Rewrite: "shoes" - Parent category: "Running"<br />
                Category 2: Rewrite: "shoes" - Parent category: "Football"<br />
                <br />
                Category URL Schema: {literal}{categories:/}{rewrite}/{/literal}<br />
                <br />
                Category 1 URL: https://www.yourdomain.com/running/shoes/<br />
                Category 2 URL: https://www.yourdomain.com/football/shoes/<br />
                <br />
                This module can identify the appropriate category based on the parent category in the URL, so listing the proper Shoes (Running or Football).
            </p>
        </div>
        <h4 class="fsau-help-title">Category not found redirect type</h4>
        <div class="fsau-help-body fsau-hide">
            <p>
                Here you can select how to behave your store when loads a category url which is not exist.<br />
                <br />
                <span class="fsau-bold">No redirect:</span> Displays a 404 page while not changing the url<br />
                <br />
                <span class="fsau-bold">Display best matched category:</span> Finds the lowest sub level category based on the parent categories in the URL and try to redirect to the canonical URL<br />
                This option is required when you use the following category - layered rule combinations<br />
                <i class="fsau-u">Combination 1. - Category rule:</i> {literal}{categories:/}{rewrite}/{/literal}<br />
                <i class="fsau-u">Combination 1. - Layered rule:</i> {literal}{categories:/}{rewrite}{/:selected_filters}/{/literal}<br />
                <i class="fsau-u">Combination 2. - Category rule:</i> {literal}{categories:/}{rewrite}{/literal}<br />
                <i class="fsau-u">Combination 2. - Layered rule:</i> {literal}{categories:/}{rewrite}{/:selected_filters}{/literal}<br />
                <br />
                <span class="fsau-bold">Try to redirect to parent category</span> Redirects to the not found category's parent category url based on the parent categories in the URL<br />
                <i class="fsau-u">Broken category url:</i> https://www.yourdomain.com/bicycle/some-missing-category/<br />
                <i class="fsau-u">Redirects to:</i> https://www.yourdomain.com/bicycle/<br />
                <br />
                <span class="fsau-bold">Redirect to page not found page</span> Redirects to: https://www.yourdomain.com/page-not-found
            </p>
        </div>
        <h2>CMS & CMS Category URL Settings</h2>
        <h4 class="fsau-help-title">Parent categories are enabled in CMS Page URLs</h4>
        <div class="fsau-help-body fsau-hide">
            <p>
                If you enabled this feature, you are required to place the "<strong>{literal}{categories:/}{/literal}</strong>" keyword in the CMS Page URL schema.
                In this case you can use a same rewrite, if the CMS Pages are assigned to different category.
            </p>
            <p>
                <i class="fsau-u">Example:</i><br />
                You have two CMS Pages with same URL rewrite and the CMS Pages are assigned to different category.<br />
                <br />
                CMS Page 1: Rewrite: "messenger-bag" - Default category: "Bicycle"<br />
                CMS Page 2: Rewrite: "messenger-bag" - Default category: "Skateboard"<br />
                <br />
                CMS Page URL Schema: {literal}content/{categories:/}{rewrite}.html{/literal}<br />
                <br />
                CMS Page 1 URL: https://www.yourdomain.com/content/bicycle/messenger-bag.html<br />
                CMS Page 2 URL: https://www.yourdomain.com/content/skateboard/messenger-bag.html<br />
                <br />
                This module can identify the appropriate CMS Page based on the parent categories in the URL, so displays the proper Messenger Bag
            </p>
        </div>
        <h4 class="fsau-help-title">Parent categories are enabled in CMS Page Category URLs</h4>
        <div class="fsau-help-body fsau-hide">
            <p>
                If you enabled this feature, you are required to place the "<strong>{literal}{categories:/}{/literal}</strong>" keyword in the CMS Page Category URL schema.
                In this case you can use a same rewrite, if the CMS Page Categories have different parent CMS Page Categories
            </p>
            <p>
                <i class="fsau-u">Example:</i><br />
                You have two CMS Page Categories with same URL rewrite but the CMS Page Categories have different parent CMS Page Categories<br />
                <br />
                CMS Page Category 1: Rewrite: "shoes" - Parent category: "Running"<br />
                CMS Page Category 2: Rewrite: "shoes" - Parent category: "Football"<br />
                <br />
                CMS Page Category URL Schema: {literal}content/{categories:/}{rewrite}/{/literal}<br />
                <br />
                CMS Page Category 1 URL: https://www.yourdomain.com/content/running/shoes/<br />
                CMS Page Category 2 URL: https://www.yourdomain.com/content/football/shoes/<br />
                <br />
                This module can identify the appropriate CMS Page Category based on the parent CMS Page Category in the URL, so listing the proper Shoes (Running or Football) category pages.
            </p>
        </div>
        <h2>Schema of URLs</h2>
        <h4 class="fsau-help-title">Remove default language sign from URLs</h4>
        <div class="fsau-help-body fsau-hide">
            <p>
                If you enable this feature the linguistic sign removed from the default language URLs.
            </p>
            <p>
               <i class="fsau-u">Example:</i><br />
                You have a store with English and German languages, default language is English.<br />
                <br />
                English URL: https://www.yourdomain.com/category/product.html<br />
                German URL: https://www.yourdomain.com/de/category/product.html
            </p>
        </div>
        <h4 class="fsau-help-title">Multi Language Routes</h4>
        <div class="fsau-help-body fsau-hide">
            <p>
                If you enable this feature, you can setup different routes per language and you can edit routes right inside the module. The system routes are ignored!
            </p>
            <p>
                <i class="fsau-u">Example:</i><br />
                You have a store with English and German languages, and the current manufacturer route schema is "{literal}manufacturer/{rewrite}.html{/literal}"<br />
                <br />
                Now you can translate the manufacturer word and set the German route schema for "{literal}hersteller/{rewrite}.html{/literal}"<br />
                <br />
                English URL: https://www.yourdomain.com/manufacturer/manufacturer-rewrite.html<br />
                German URL: https://www.yourdomain.com/de/hersteller/hersteller-rewrite.html
            </p>
        </div>
        <h4 class="fsau-help-title">Schema of URLs</h4>
        <div class="fsau-help-body fsau-hide">
            <p>
                If you enabled "Multi Language Routes" feature, you can edit routes right inside the module. The system routes are ignored!<br />
                <br />
                If an URL end with "/", the URL also works without it and redirects to the canonical URL. It works same when an URL not end with "/", also works with "/" at the end.
            </p>
            <br />
            <p>
                <i class="fsau-u">Example 1 (Only Rewrite):</i><br />
                <table class="fsau-help-table">
                    <thead>
                        <tr>
                            <th>Route</th>
                            <th>Schema</th>
                            <th>URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Route to products</td>
                            <td>{literal}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/product-rewrite</td>
                        </tr>
                        <tr>
                            <td>Route to category</td>
                            <td>{literal}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/category-rewrite</td>
                        </tr>
                        <tr>
                            <td>Route to layered navigation</td>
                            <td>{literal}{rewrite}{/:selected_filters}{/literal}</td>
                            <td>https://www.yourdomain.com/category-rewrite/filter-param-1/filter-param-2</td>
                        </tr>
                        <tr>
                            <td>Route to supplier</td>
                            <td>{literal}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/supplier-rewrite</td>
                        </tr>
                        <tr>
                            <td>Route to manufacturer (brand)</td>
                            <td>{literal}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/manufacturer-rewrite</td>
                        </tr>
                        <tr>
                            <td>Route to page (CMS)</td>
                            <td>{literal}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/cms-rewrite</td>
                        </tr>
                        <tr>
                            <td>Route to page category (CMS Category)</td>
                            <td>{literal}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/cms-category-rewrite</td>
                        </tr>
                    </tbody>
                </table>
            </p>
            <br />
            <p>
                <i class="fsau-u">Example 2 (Categories + Rewrite):</i><br />
                <table class="fsau-help-table">
                    <thead>
                        <tr>
                            <th>Route</th>
                            <th>Schema</th>
                            <th>URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Route to products</td>
                            <td>{literal}{categories:/}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/parent-cat/child-cat/product-rewrite</td>
                        </tr>
                        <tr>
                            <td>Route to category</td>
                            <td>{literal}{categories:/}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/parent-cat/child-cat/category-rewrite</td>
                        </tr>
                        <tr>
                            <td>Route to layered navigation*</td>
                            <td>{literal}{categories:/}{rewrite}/{/:selected_filters}{/literal}</td>
                            <td>https://www.yourdomain.com/parent-cat/child-cat/category-rewrite//filter-param-1/filter-param-2</td>
                        </tr>
                        <tr>
                            <td>Route to supplier</td>
                            <td>{literal}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/supplier-rewrite</td>
                        </tr>
                        <tr>
                            <td>Route to manufacturer (brand)</td>
                            <td>{literal}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/manufacturer-rewrite</td>
                        </tr>
                        <tr>
                            <td>Route to page (CMS)</td>
                            <td>{literal}{categories:/}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/parent-cat/child-cat/cms-rewrite</td>
                        </tr>
                        <tr>
                            <td>Route to page category (CMS Category)</td>
                            <td>{literal}{categories:/}{rewrite}{/literal}</td>
                            <td>https://www.yourdomain.com/parent-cat/child-cat/cms-category-rewrite</td>
                        </tr>
                    </tbody>
                </table>
                <br />
                <i>
                    <strong>*</strong>
                    You can notice that the layered navigation url contains a double slash "//" in the URL.
                    If you want to use the layered URL without it, you need to set "<strong>Category not found redirect type</strong>" for "<strong>Display best matched category</strong>"
                    and set the layered schema for "<strong>{literal}{categories:/}{rewrite}{/:selected_filters}{/literal}</strong>"
                </i>
            </p>
            <br />
            <p>
                <i class="fsau-u">Example 3 (Default):</i><br />
                <table class="fsau-help-table">
                    <thead>
                        <tr>
                            <th>Route</th>
                            <th>Schema</th>
                            <th>URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Route to products</td>
                            <td>{literal}{categories:/}{rewrite}.html{/literal}</td>
                            <td>https://www.yourdomain.com/parent-cat/child-cat/product-rewrite.html</td>
                        </tr>
                        <tr>
                            <td>Route to category</td>
                            <td>{literal}{categories:/}{rewrite}/{/literal}</td>
                            <td>https://www.yourdomain.com/parent-cat/child-cat/category-rewrite/</td>
                        </tr>
                        <tr>
                            <td>Route to layered navigation*</td>
                            <td>{literal}{categories:/}{rewrite}/{/:selected_filters}/{/literal}</td>
                            <td>https://www.yourdomain.com/parent-cat/child-cat/category-rewrite//filter-param-1/filter-param-2/</td>
                        </tr>
                        <tr>
                            <td>Route to supplier</td>
                            <td>{literal}supplier/{rewrite}.html{/literal}</td>
                            <td>https://www.yourdomain.com/supplier/supplier-rewrite.html</td>
                        </tr>
                        <tr>
                            <td>Route to manufacturer (brand)</td>
                            <td>{literal}manufacturer/{rewrite}.html{/literal}</td>
                            <td>https://www.yourdomain.com/manufacturer/manufacturer-rewrite.html</td>
                        </tr>
                        <tr>
                            <td>Route to page (CMS)</td>
                            <td>{literal}content/{categories:/}{rewrite}.html{/literal}</td>
                            <td>https://www.yourdomain.com/content/parent-cat/child-cat/cms-rewrite.html</td>
                        </tr>
                        <tr>
                            <td>Route to page category (CMS Category)</td>
                            <td>{literal}content/{categories:/}{rewrite}/{/literal}</td>
                            <td>https://www.yourdomain.com/content/parent-cat/child-cat/cms-category-rewrite/</td>
                        </tr>
                    </tbody>
                </table>
                <br />
                <i>
                    <strong>*</strong>
                    You can notice that the layered navigation url contains a double slash "//" in the URL.
                    If you want to use the layered URL without it, you need to set "<strong>Category not found redirect type</strong>" for "<strong>Display best matched category</strong>"
                    and set the layered schema for "<strong>{literal}{categories:/}{rewrite}{/:selected_filters}/{/literal}</strong>"
                </i>
            </p>
        </div>
        {*
        <h4>Product URL Settings</h4>
        <p>
            In the Advanced URLs To Products tab you can Enabled/Disable advanced URL feature, Enable/Disable parent categories in the URL and also select redirect type if no product found.<br />
            <br />
            To change the schema of the URL navigate to Preferences -> <a href="{$fsau_seo_url|escape:'html':'UTF-8'|fsauCorrectTheMess}">SEO & URLs</a> -> Schema Of URLs panel and set the Route to products.
        </p>
        <br />
        <h4>Category URL Settings</h4>
        <p>
            In the Advanced URLs To Categories tab you can Enabled/Disable advanced URL feature, Enable/Disable parent categories in the URL and also select redirect type if no category found.<br />
            <br />
            To change the schema of the URL navigate to Preferences -> <a href="{$fsau_seo_url|escape:'html':'UTF-8'|fsauCorrectTheMess}">SEO & URLs</a> -> Schema Of URLs panel and set the Route to category.
        </p>
        <br />
        <h4>Manufacturer URL Settings</h4>
        <p>
            In the Advanced URLs To Manufacturers tab you can Enabled/Disable advanced URL feature.<br />
            <br />
            To change the schema of the URL navigate to Preferences -> <a href="{$fsau_seo_url|escape:'html':'UTF-8'|fsauCorrectTheMess}">SEO & URLs</a> -> Schema Of URLs panel and set the Route to manufacturer.
        </p>
        <br />
        <h4>Supplier URL Settings</h4>
        <p>
            In the Advanced URLs To Suppliers tab you can Enabled/Disable advanced URL feature.<br />
            <br />
            To change the schema of the URL navigate to Preferences -> <a href="{$fsau_seo_url|escape:'html':'UTF-8'|fsauCorrectTheMess}">SEO & URLs</a> -> Schema Of URLs panel and set the Route to supplier.
        </p>
        <br />
        <h4>CMS & CMS Category URL Settings</h4>
        <p>
            In the Advanced URLs To Suppliers tab you can Enabled/Disable advanced URL feature.<br />
            <br />
            To change the schema of the URL navigate to Preferences -> <a href="{$fsau_seo_url|escape:'html':'UTF-8'|fsauCorrectTheMess}">SEO & URLs</a> -> Schema Of URLs panel and set the Route to CMS page and Route to CMS category.
        </p>
        <br />*}

        <h2>Duplicated URLs</h2>
        <p>
            Detect duplicated URLs when saving a Product, Category, Manufacturer, Supplier, CMS, CMS Category. Also offers a unified list with all of duplicated URLs if no records found in that list, your shop is ok.
        </p>
        <h2>Recommendation</h2>
        <p>
            When you assign a category to a product, we recommend to assign to the default category the lowest level of the product categories. This will generate the best product URLs when you use parent categories in product URLs. (Recommended to use!)
        </p>
        <br />
        <br />
        <a id="fsau-developed-by" href="https://addons.prestashop.com/en/116_modulefactory" target="_blank">
            <img src="{$module_base_url|escape:'html':'UTF-8'}views/img/help_footer_1280x170.jpg">
        </a>
    </div>
</div>
