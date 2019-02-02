Module is installed in a regular way - simply upload your archive and click install.

CHANGELOG:
===========================
v 2.8.0 (December 9, 2017)
===========================
- [+] Optionally minimize selected filters on page load
- [+] Optionally include sorting parameter in URL
- [+] Optionally show/hide group names of selected filters
- [+] Editable custom names for each filter group
- [+] Custom prefixes/suffixes for numeric sliders
- [+] Configurable decimal/thousand separators for numeric values (1500.5 or 1.500,5)
- [+] Possibility to duplicate templates
- [+] Possibility to display templates on all categories without explicit selection (including new created)
- [+] Recognize ranged values in numeric sliders (1-3 years, 1-5 years, 5-8 years etc...)
- [+] Smarty variables required for displaying add to cart button in product list in 1.7
- [*] Fixed weight indexation for products without combinations
- [*] Improved compatibility with transformer theme in 1.7
- [*] Initial sorting by price:asc on pricesdrop page in 1.6
- [*] Reload page on clicking back/forward in browser after URL was updated basing on applied filters
- [*] Misc fixes and optimizations

Files modified:
-----
- /amazzingfilter.php
- /controllers/front/myfilters.php
- /views/css/back.css
- /views/css/front.css
- /views/js/back.js
- /views/js/front.js
- /views/templates/admin/cat-tree.tpl
- /views/templates/admin/configure.tpl
- /views/templates/admin/filter-form.tpl
- /views/templates/admin/form-group.tpl
- /views/templates/hook/amazzingfilter.tpl

Files added:
-----
- /upgrade/install-2.8.0.php
- /views/templates/admin/available-filters.tpl
- /views/templates/admin/input.tpl
- /views/templates/admin/template-form.tpl

Files removed:
-----
- /override_files/controllers/front/ProductController.php

===========================
v 2.7.4 (September 24, 2017)
===========================
- [+] Numeric sliders for features/attributes
- [+] User input fields for numeric sliders
- [+] Radio buttons for filtering options
- [*] Fixed autoindexation on bulk product status update
- [*] Misc fixes and optimizations

Files modified:
-----
- /amazzingfilter.php
- /views/css/front.css
- /views/css/custom.css
- /views/js/front.js
- /override_files/controllers/admin/AdminProductsController.php
- /views/templates/admin/filter-form.tpl
- /views/templates/hook/amazzingfilter.tpl
- /src/AmazzingFilterProductSearchProvider.php

===========================
v 2.7.3 (August 14, 2017)
===========================
- [*] Compatibility with PS 1.7.2
- [*] Fixed scroll bug in compact view on mobile devices
- [*] Minor fixes and optimizations

Files modified:
-----
- /views/css/front.css
- /views/js/front.js
- /src/AmazzingFilterProductSearchProvider.php

===========================
v 2.7.2 (July 11, 2017)
===========================
- [+] New option: Display prices/images basing on selected attributes
- [*] Removed hidden checkbox options if they are not used on page
- [*] Improved performance on Search results page for PS 1.7
- [*] Minor fixes and optimizations

Files modified:
-----
- /amazzingfilter.php
- /views/js/front.js

===========================
v 2.7.1 (May 29, 2017)
===========================
- [*] Improved checking for stock/existence basing on selected attributes
- [*] Improved overflow-touch-scroll performance in compact view
- [*] Minor fixes and optimizations

Files modified:
-----
- /amazzingfilter.php
- /views/css/front.css
- /views/js/front.js
- /views/css/back.css
- /views/templates/admin/configure.tpl
- /controllers/front/cron.php

===========================
v 2.7.0 (April 27, 2017)
===========================
- [+] Compact view on mobile devices
- [+] Checkboxes/Selects for price/weight ranges
- [+] Optionally load products on button click
- [+] Optional infinite scroll (instead of standard pagination)
- [*] Show/hide filter blocks by clicking on title
- [*] Show more/less options, if there are too many of them
- [*] Improved range-sliders performance on mobile devices
- [*] Removed asterisk (*) from url params. Primary filter is defined by 1st position
- [*] Fixed compatibility of Autoscrolling to top with Load more button
- [*] Improved criteria selection in admin interface (instant search)
- [*] Minor fixes and optimizations

Files modified:
-----
- /amazzingfilter.php
- /readme_en.pdf
- /views/css/back.css
- /views/css/front.css
- /views/css/front-17.css
- /views/js/back.js
- /views/js/front.js
- /views/js/main-page.js
- /views/templates/admin/configure.tpl
- /views/templates/admin/filter-form.tpl
- /views/templates/hook/amazzingfilter.tpl
- /views/templates/hook/dynamic-loading.tpl

Files added:
-----
- /upgrade/install-2.7.0.php
- /views/css/custom.css
- /views/js/jquery.ui.touch-punch.min.js

===========================
v 2.6.1 (March 30, 2017)
===========================
- [*] Improved performance on Search results page
- [*] Improved performance for "checking combinations existence"
- [*] Fixed recognition of initial params for top level category blocks

Files modified:
-----
- /amazzingfilter.php
- /override_files/classes/Product.php

===========================
v 2.6.0 (March 3, 2017)
===========================
- [+] Filter by product condition (new, used, refurbished)
- [+] CRON indexation
- [+] Compatibility with Jolisearch module
- [+] Introduced custom.js/custom.css for easier customization
- [*] Sort category options by position
- [*] Minor fixes, related to sorting products
- [*] Don't interrupt module installation if some overrides were not added
- [*] Admin interface for adding/removing overrides used by module (PS 1.6)
- [*] Minor fixes and optimizations

Files modified:
-----
- /amazzingfilter.php
- /controllers/front/myfilters.php
- /views/css/back.css
- /views/js/back.js
- /views/templates/admin/configure.tpl
- /views/templates/admin/filter-form.tpl
- /views/templates/front/my-filters.tpl
- /views/templates/hook/amazzingfilter.tpl
- /readme_en.pdf

Files added:
-----
- /controllers/front/cron.php
- /upgrade/install-2.6.0.php
- /views/js/custom.js

Files moved:
- all php overrides from /override/ to /override_files/. /override/ directory kept

===========================
v 2.5.5 (February 11, 2017)
===========================
- [+] Possibility to add multiple category filter blocks
- [*] Minor fixes and optimizations

Files modified:
-----
- /amazzingfilter.php
- /views/js/front.js
- /views/templates/admin/filter-form.tpl
- /views/templates/hook/amazzingfilter.tpl


===========================
v 2.5.3 (February 2, 2017)
===========================
- [+] Option to include/exclude all products from subcategories, even if they are not associated to current category
- [*] Sort products by position inside checked category, if only one is checked
- [*] PS17: automatically reindex product attributes after bulk generation
- [*] Multistore: Compatibility with shared stock
- [*] Minor fixes and optimizations

Files modified:
-----
- /amazzingfilter.php
- /views/css/front.css
- /views/js/front.js
- /views/templates/admin/form-group.tpl
- /views/templates/hook/amazzingfilter.tpl

Files added:
-----
- /upgrade/install-2.5.3.php
- /views/js/attribute-indexer.js

===========================
v 2.5.2 (January 14, 2017)
===========================
- [*] PS17: Fix filtering on search results page
- [*] Optimized category tree for filtering templates
- [*] Optimized behavior for price/weight sliders

Files modified:
-----
- /amazzingfilter.php
- /views/css/back.css
- views/js/back.js
- /views/js/front.js
- /views/templates/admin/filter-form.tpl

Files added:
-----
- /views/templates/admin/cat-tree.tpl

===========================
v 2.5.1 (December 18, 2016)
===========================
- [*] Multistore: register/unregister hooks only for current shop context
- [*] Minor fixes and optimizations

Files modified:
-----
- /amazzingfilter.php
- /views/css/icons.css
- /src/AmazzingFilterProductSearchProvider.php

===========================
v 2.5.0 (December 10, 2016)
===========================
- [+] Optionally load icon font. May be useful if theme does not support icon-xx classes
- [*] Compatibility with PS 1.7
- [*] Improved filtering time for prices-drop, new products, bestsellers
- [*] Improved time for sorting by stock, especially for stores with more than 30 000 products
- [*] Fixed load-more button appearance in cases when top pagination is not present in template files
- [*] Automatically deactivate templates for pages without current filter-hook on module installation
- [*] Multistore: register/unregister hooks only for current shop context
- [*] Minor fixes and optimizations

Files modified:
-----
- /amazzingfilter.php
- /views/js/front.js
- /controllers/front/myfilters.php
- /views/css/front.css
- /views/css/my-filters.css
- /views/js/front.js
- /views/js/main-page.js
- /views/templates/admin/configure.tpl
- /views/templates/front/my-filters.tpl
- /views/templates/hook/amazzingfilter.tpl
- /views/templates/hook/my-filters-tab.tpl

Files added:
-----
- /src/AmazzingFilterProductSearchProvider.php
- /src/index.php
- /upgrade/install-2.5.0.php
- /views/css/back-17.css
- /views/css/front-17.css
- /views/css/icons.css
- /views/fonts/filterIcons.eot
- /views/fonts/filterIcons.svg
- /views/fonts/filterIcons.ttf
- /views/fonts/filterIcons.woff
- /views/fonts/index.php
- /views/templates/front/content-17.tpl
- /views/templates/front/basic-layout-17.tpl
- /views/templates/hook/dynamic-loading.tpl

===========================
v 2.3.1 (November 5, 2016)
===========================
- [*] Fixed bug with load more button in instant filter on main page
- [*] Fixed bug with indexation when a currency is deleted but still present in database
- [*] Fixed wrong numbers of matches in some complex scenarios when stock is checked for each combination
- [*] Minor code optimizations

Files modified:
-----
- /amazzingfilter.php
- /views/js/main-page.js
- /views/css/front.css

===========================
v 2.3.0 (October 29, 2016)
===========================
- [+] Show/Hide numbers of matches
- [+] Show/Hide/Dim options with zero matches
- [+] Optional foldered layout for subcategories
- [+] Optional autoscroll to top after updating product list dynamically
- [+] Autodetect overriden module files, that require updating
- [*] Improved layout of selected filters block for better buttons response on mobile devices
- [*] Improved instant filter on main page
- [*] Fixed translatable labels for price and weight sliders
- [*] Fixed breadcrumbs path on product page depending on previous visited category PSCSX-8559
- [*] Fixed possible duplicates in dynamic parameter urls
- [*] Consider category group access in customer filters
- [*] Minor fixes for checking combinations existence
- [*] Improved multishop indexation

Files modified:
-----
- /views/templates/hook/amazzingfilter.tpl -------------> important
- /views/css/front.css ---------------------------------> important
- /views/js/front.js -----------------------------------> important
- /views/js/main-page.js -------------------------------> important
- /amazzingfilter.php
- /controllers/front/myfilters.php
- /views/templates/admin/configure.tpl
- /views/templates/admin/filter-form.tpl
- /views/css/back.css
- /views/js/back.js

Files added:
-----
- /views/templates/admin/form-group.tpl
- /override/controllers/front/ProductController.php
- /upgrade/install-2.3.0.php

===========================
v 2.2.0 (July 9, 2016)
===========================
- [*] Fixed filtering on Supplier page
- [*] Fixed indexation bug when BO language is not active in FO
- [*] Fixed stock filtering for products with negative stock
- [*] Re-index products after updating tags in Tag menu
- [*] Misc minor fixes

Files modified:
-----
- /amazzingfilter.php
- /views/js/front.js
- /views/js/main-page.js
- /views/css/back.css

Files added:
-----
- /upgrade/install-2.2.0.php

===========================
v 2.1.2 (May 29, 2016)
===========================
- [+] Highlight filtering button after criteria selection on main page
- [*] Fix #PSCSX-8009, error on saving products when required overrides are out of date
- [*] Included manufacturer_name in filtered results
- [*] Fixed ordering bug on prices drop page
- [*] Fixed initial sorting by date_upd
- [*] Improved auto-indexation on saving products programmatically using $product_obj->save()

Files modified:
-----
- /amazzingfilter.php
- /views/js/main-page.js

===========================
v 2.1.1 (April 30, 2016)
===========================
- [*] Retro-compatibility fix for product indexation
- [*] Minor bug fix for counting stock basing on selected attributes

Files modified:
-----
- /amazzingfilter.php

===========================
v 2.1.0 (April 23, 2016)
===========================
- [+] Configurable out-of-stock behavior: include/exclude/move to the end
- [+] In stock filter
- [+] Easily select hook and change positions on module configuration page
- [*] Updated Admin interface
- [*] Improved indexation (both mass indexation and auto-indexation on product save)
- [*] Exclude inactive categories from filters
- [*] Fixed pagination bug after page refresh
- [*] Optimized count data gathering for large amounts of filters
- [*] Significantly decreased quantity of submitted fields on each ajax request
- [*] Multiple suppliers support
- [*] Retro-compatibility for tags indexation
- [*] Misc code optimizations

Files modified:
-----
- /amazzingfilter.php
- /views/templates/admin/configure.tpl
- /views/templates/admin/filter-form.tpl
- /views/templates/hook/amazzingfilter.tpl
- /views/templates/front/my-filters.tpl
- /views/js/front.js
- /views/js/back.js
- /views/css/back.css
- /controllers/front/myfilters.php
- /override/constollers/admin/AdminProductsController

Files added:
-----
- /documentation_en.pdf
- /views/templates/admin/hook-positions-form.tpl
- /upgrade/install-2.1.0.php

Files removed:
- /readme_en.pdf

===========================
v 2.0.2 (March 09, 2016)
===========================
- [*] Fixed interference with 3rd party carousels of homepage
- [*] Initial uniform styling for filter selects

Files modified:
-----
- /amazzingfilter.php
- /views/templates/hook/amazzingfilter.tpl
- /override/classes/Manufacturer.php
- /override/classes/Product.php
- /override/classes/ProductSale.php
- /override/classes/Search.php
- /override/classes/Supplier.php

===========================
v 2.0.1 (January 30, 2016)
===========================
- [+] Order filter options by numbers in names (e.g. 1mm, 5mm, 10mm)
- [*] Proper ordering on search results
- [*] Misc fixes and optimizations

Files modified:
-----
- /amazzingfilter.php
- /views/templates/admin/filter-form.tpl
- /views/js/front.js

===========================
v 2.0.0 (November 20, 2015)
===========================
- [+] Adjustable customer filters
- [+] Compatibility with search results page
- [+] Compatibility with main page
- [+] Filter by: new products/bestsellers/specials/tags
- [+] Nested categories in filter templates
- [+] Order filter options by name/id/position (if available)
- [+] Dynamic ids/classes for layout. Filter is no longer dependent on hardcoded theme selectors
- [+] Prices are indexed separately for each user group
- [*] Improved filtering algorithm
- [*] Removed "#" from dynamic URLs
- [*] URL params are generated basing on shop URL rewrite settings
- [*] Initial product listing is ready when page loads. No need to run additional ajax request
- [*] Indexed prices are rounded basing on prestashop settings
- [*] Support for product visibility in both/catalog/search/none
- [*] Support for categories group access rights
- [*] Activated the show all products button
- [*] Misc code optimizations
- [*] PSR-2
- [-] Fixed bug of counting matches when count stock is enabled and none of combinations is in stock
- [-] Fixed bug on clicking indexer twice
- [-] Fixed display by position in category
- [-] Fixed out of stock status label
- [-] Removed FF/IE select bug happening when majority of options is hidden

Files modified:
-----
- /amazzingfilter.php
- /views/templates/admin/configure.tpl
- /views/templates/admin/filter-form.tpl
- /views/templates/hook/amazzingfilter.tpl
- /controllers/front/ajax.php
- /override/classes/Manufacturer.php
- /override/classes/Product.php
- /override/classes/ProductSale.php
- /override/classes/Search.php
- /override/classes/Supplier.php
- /views/css/front.css
- /views/css/back.css
- /views/js/front.js
- /views/js/back.js
- /translations/ru.php

Files added:
-----
- /controllers/front/myfilters.php
- /views/templates/front/basic-layout.tpl
- /views/templates/front/my-filters.tpl
- /views/templates/front/no-products.tpl
- /views/templates/front/index.php
- /views/templates/hook/my-filters-tab.tpl
- /views/css/my-filters.css
- /readme_en.pdf
- /views/js/my-filters.js
- /views/js/main-page.js

Files removed:
-----
- /views/templates/hook/result.tpl
- /views/templates/hook/sorting.tpl

===========================
v 1.5.4 (August 5, 2015)
===========================
- [*] Fixed accordion for filterblock on left/right column
- [*] If filter-value is checked and there is no match for it in count_data, it is not hidden.
- [*] Minor code optimizations

===========================
v 1.5.3 (July 27, 2015)
===========================
- [*] Fixed comparator functionality

===========================
v 1.5.2 (July 21, 2015)
===========================
- [+] Count stock for combinations
- [+] Check combinations existence
- [*] Misc code optimizations
