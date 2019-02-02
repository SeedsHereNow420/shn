<?php
/**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

class ValidateTypeCPM
{
    const IS_IP2_LONG = 'isIp2Long';
    const IS_ANYTHING = 'isAnything';
    const IS_EMAIL = 'isEmail';
    const IS_MODULE_URL = 'isModuleUrl';
    const IS_MD5 = 'isMd5';
    const IS_SHA1 = 'isSha1';
    const IS_FLOAT = 'isFloat';
    const IS_UNSIGNED_FLOAT = 'isUnsignedFloat';
    const IS_OPT_FLOAT = 'isOptFloat';
    const IS_CARRIER_NAME = 'isCarrierName';
    const IS_IMAGE_SIZE = 'isImageSize';
    const IS_NAME = 'isName';
    const IS_HOOK_NAME = 'isHookName';
    const IS_MAIL_NAME = 'isMailName';
    const IS_MAIL_SUBJECT = 'isMailSubject';
    const IS_MODULE_NAME = 'isModuleName';
    const IS_TPL_NAME = 'isTplName';
    const IS_IMAGE_TYPE_NAME = 'isImageTypeName';
    const IS_PRICE = 'isPrice';
    const IS_NEGATIVE_PRICE = 'isNegativePrice';
    const IS_LANGUAGE_ISO_CODE = 'isLanguageIsoCode';
    const IS_LANGUAGE_CODE = 'isLanguageCode';
    const IS_STATE_ISO_CODE = 'isStateIsoCode';
    const IS_NUMERIC_ISO_CODE = 'isNumericIsoCode';
    const IS_DISCOUNT_NAME = 'isDiscountName';
    const IS_CATALOG_NAME = 'isCatalogName';
    const IS_MESSAGE = 'isMessage';
    const IS_COUNTRY_NAME = 'isCountryName';
    const IS_LINK_REWRITE = 'isLinkRewrite';
    const IS_ROUTE_PATTERN = 'isRoutePattern';
    const IS_ADDRESS = 'isAddress';
    const IS_CITY_NAME = 'isCityName';
    const IS_VALID_SEARCH = 'isValidSearch';
    const IS_GENERIC_NAME = 'isGenericName';
    const IS_CLEAN_HTML = 'isCleanHtml';
    const IS_REFERENCE = 'isReference';
    const IS_PASSWD = 'isPasswd';
    const IS_PASSWD_ADMIN = 'isPasswdAdmin';
    const IS_CONFIG_NAME = 'isConfigName';
    const IS_PHP_DATE_FORMAT = 'isPhpDateFormat';
    const IS_DATE_FORMAT = 'isDateFormat';
    const IS_DATE = 'isDate';
    const IS_BIRTH_DATE = 'isBirthDate';
    const IS_BOOL = 'isBool';
    const IS_PHONE_NUMBER = 'isPhoneNumber';
    const IS_EAN13 = 'isEan13';
    const IS_UPC = 'isUpc';
    const IS_POST_CODE = 'isPostCode';
    const IS_ZIP_CODE_FORMAT = 'isZipCodeFormat';
    const IS_ORDER_WAY = 'isOrderWay';
    const IS_ORDER_BY = 'isOrderBy';
    const IS_TABLE_OR_IDENTIFIER = 'isTableOrIdentifier';
    const IS_VALUES_LIST = 'isValuesList';
    const IS_TAGS_LIST = 'isTagsList';
    const IS_PRODUCT_VISIBILITY = 'isProductVisibility';
    const IS_INT = 'isInt';
    const IS_UNSIGNED_INT = 'isUnsignedInt';
    const IS_PERCENTAGE = 'isPercentage';
    const IS_UNSIGNED_ID = 'isUnsignedId';
    const IS_NULL_OR_UNSIGNED_ID = 'isNullOrUnsignedId';
    const IS_LOADED_OBJECT = 'isLoadedObject';
    const IS_COLOR = 'isColor';
    const IS_URL = 'isUrl';
    const IS_TRACKING_NUMBER = 'isTrackingNumber';
    const IS_URL_OR_EMPTY = 'isUrlOrEmpty';
    const IS_ABSOLUTE_URL = 'isAbsoluteUrl';
    const IS_MYSQL_ENGINE = 'isMySQLEngine';
    const IS_UNIX_NAME = 'isUnixName';
    const IS_TABLE_PREFIX = 'isTablePrefix';
    const IS_FILE_NAME = 'isFileName';
    const IS_DIR_NAME = 'isDirName';
    const IS_TAB_NAME = 'isTabName';
    const IS_WEIGHT_UNIT = 'isWeightUnit';
    const IS_DISTANCE_UNIT = 'isDistanceUnit';
    const IS_SUB_DOMAIN_NAME = 'isSubDomainName';
    const IS_VOUCHER_DESCRIPTION = 'isVoucherDescription';
    const IS_SORT_DIRECTION = 'isSortDirection';
    const IS_LABEL = 'isLabel';
    const IS_PRICE_DISPLAY_METHOD = 'isPriceDisplayMethod';
    const IS_DNI_LITE = 'isDniLite';
    const IS_COOKIE = 'isCookie';
    const IS_STRING = 'isString';
    const IS_REDUCTION_TYPE = 'isReductionType';
    const IS_BOOL_ID = 'isBoolId';
    const IS_BOOL__ID = 'isBool_Id';
    const IS_LOCALIZATION_PACK_SELECTION = 'isLocalizationPackSelection';
    const IS_SERIALIZED_ARRAY = 'isSerializedArray';
    const IS_COORDINATE = 'isCoordinate';
    const IS_LANG_ISO_CODE = 'isLangIsoCode';
    const IS_LANGUAGE_FILE_NAME = 'isLanguageFileName';
    const IS_ARRAY_WITH_IDS = 'isArrayWithIds';
    const IS_SCENE_ZONES = 'isSceneZones';
    const IS_STOCK_MANAGEMENT = 'isStockManagement';
    const IS_SIRET = 'isSiret';
    const IS_APE = 'isApe';
    const IS_CONTROLLER_NAME = 'isControllerName';
    const IS_PRESTA_SHOP_VERSION = 'isPrestaShopVersion';
    const IS_ORDER_INVOICE_NUMBER = 'isOrderInvoiceNumber';
}
