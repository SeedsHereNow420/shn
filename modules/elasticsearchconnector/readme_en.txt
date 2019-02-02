# elasticsearchconnector
Connector to make Prestashop use the powerfull and free Elasticsearch search engine. Search 100 000+ products in few milliseconds!

## ABOUT
This module provides access to Elasticsearch that is a free search server and it provides multitenant-capable full-text search engine.

## SUPPORTED PRESTASHOP VERSIONS
1.6.X - 1.7.X

## FEATURES:
- support typoes and mispelings correction
- support field weight to define importance of fields
- support up to 3 node servers in the cluster
- elasticsearch log in all available log levels
- support auto indexation on product add/update/duplicate
- support indexation defined on cron
- manual indexation fired in background with slow server timeout protection
- indexation cron links ready to use with 'Cron task manager'
- support full index regeneration and new add only missing products to index
- work with all PrestaShop search methods like: 
a) normal search
b) ajax search
c) instant search
- support advanced custom index configuration as json string
- support advanced custom search configuration as json string
- create multiple indexes separatly for each shop and language
- take as initial settings already configured options like:
a) Search within word
b) Minimum word length
c) Blacklisted words
d) Field weight

## INSTALLATION
1. Elasticsearch installation
- Download elasticsearch
- Start elasticsearch 
2. Install ElasticsearchConnector
- Please use default PrestaShop module installation scenerio.
Please note this module use class override file /override/classes/Search.php
Server environment should allow http user to be able to override that file.
3. Configure ElasticsearchConnector
4. Start full indexation process by click on the button "Regenerate now"

## CONFIGURATION:
General settings
1. Host 1 
- 1st node server (default: http://localhost:9200)
2. Host 2 
- 2nd node server used in the cluster
3. Host 3 
- 3rd node server used in the cluster
4. Logging 
- Disable or enable elasticsearch logging (default: disabled)
5. Log file path 
- Path to the file used for elasticsearch logging (default: [MODULE DIR]/log/log.txt)
Please note file have to be accessible and writable.
6. Log level 
- Type of information saved by elasticsearch to log file (default: INFO)

Index fields
Please note that edit any of this group setting need to full index rebuild.
1. Product name 
- Disable or enable product name indexation
2. Product reference 
- Disable or enable product reference indexation
3. Product short description 
- Disable or enable product short description indexation
4. Product description 
- Disable or enable product description indexation
5. Category name 
- Disable or enable category name indexation
6. Manufacturer name 
- Disable or enable manufacturer name indexation
7. Supplier name
- Disable or enable supplier name indexation
8. Tag
- Disable or enable product tag indexation
9. Product attribute
- Disable or enable product attribute indexation
10. Product feature
- Disable or enable product feature indexation
11. Product EAN13
- Disable or enable product EAN13 indexation
12. Disable ElasticSearch while indexing
- Disable or enable default PrestaShop search engine while ElasticSearch full index regeneration in progress.

Index settings
Please note that edit any of this group setting need to full index rebuild.
1. Advanced
- Disable or enable advanced index configuration (only for advanced elasticsearch users).
When enabled all fields from this part are hidden and textarea with json code is visible.
You can configure here all available index features that elasticsearch server prepare for You.
More about advanced index configuration can be find in elasticsearch server documentation.
2. Minimum word length
- Define minimum word lenght to be indexed (default: 3)
3. Maximum word length
- Define maximum word lenght to be indexed (default: 255)
4. Search exact match
- Disable or enable search withing words or exact match only
5. Blacklisted words
- Define list of words that will be skipp while indexing
Each word should be separate by char |

Search settings
1. Advanced
- Disable or enable advanced search configuration (only for advanced elasticsearch users).
When enabled all fields from this part are hidden and textarea with json code is visible.
You can configure here all available search features that elasticsearch server prepare for You.
More about advanced index configuration can be find in elasticsearch server documentation.
2. Search operator
- Define search operator used in multi word searching (default: AND)
3. Inteligent search
- Disable or enable inteligent search that is typoes and mispelings correction
4. Product name weight
- Numeric value represents product name importance
5. Product reference weight 
- Numeric value represents product reference importance
6. Product short description weight 
- Numeric value represents product short description importance
7. Product description weight
- Numeric value represents product description importance
8. Category name weight
- Numeric value represents category name importance
9. Manufacturer name weight
- Numeric value represents manufacturer name importance
10. Supplier name weight
- Numeric value represents supplier name importance
11. Tag weight
- Numeric value represents tag importance
12. Product attribute weight
- Numeric value represents product attribute importance
13. Product feature weight
- Numeric value represents product feature importance
14. Product EAN13 weight
- Numeric value represents product EAN13 importance

Indexing
You can find here interesting informations about indexation process.
This section also give You buttons and links to rebuild entire index or add missing products to index.
1. Indexing
- This is core PrestaShop setting added to Elasticsearchconnector configuration to have all related settings in one place.
It's exactly same switch that You can find on 'Preferences' -> 'Search'
It allow You to enable or disable automatic index update after each product save.

## THE BENEFITS FOR MERCHANTS
Merchant gets access to powerfull text search server features like autocomplete, stemmers, phonetic, synonyms and many many more elasticsearch features.
When inteligent search enabled this module will reduce number of searches done by customer that will return 0 results because of typo or misspell.

## THE BENEFITS FOR CUSTOMERS
Customers will get best matched products in most short time using powerfull text search server.
When inteligent search enabled Your customers will get best matched products in case originally searched phase return 0 results.
This feature will be very usefull for Your customers as it can fix mistakes done by them while they use search feature.

## CONTRIBUTING
Searchcorrect module is open-source extensions to the PrestaShop e-commerce solution. 
Everyone is welcome and even encouraged to contribute with their own improvements.

## KEYWORDS
elastic, server, text, full-text, search, correction, autocorrection, searchcorrection, misspell, typo, 

## DEMO
http://demo.prestawach.info/admin_dev/
demo@demo.com / demodemo