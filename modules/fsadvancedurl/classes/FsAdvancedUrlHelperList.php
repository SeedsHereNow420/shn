<?php
/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

class FsAdvancedUrlHelperList extends HelperList
{
    public function displayEditobjectLink($token, $id, $name = null)
    {
        $context = Context::getContext();
        list($type, $id) = explode('_', $id);

        $url = sha1(FsAdvancedUrlModule::jsonEncodeStatic($token).FsAdvancedUrlModule::jsonEncodeStatic($name));
        switch ($type) {
            case 'product':
                $url = $context->link->getAdminLink('AdminProducts');
                $url .= '&id_product='.$id.'&updateproduct&key_tab=Seo';
                if (FsAdvancedUrlModule::isPsMin17Static()) {
                    $url = $context->link->getAdminLink('AdminProducts', true, array(
                        'id_product' => $id
                    )).'#tab-step5';
                }
                break;
            case 'category':
                $url = $context->link->getAdminLink('AdminCategories');
                $url .= '&id_category='.$id.'&updatecategory';
                break;
            case 'manufacturer':
                $url = $context->link->getAdminLink('AdminManufacturers');
                $url .= '&id_manufacturer='.$id.'&updatemanufacturer';
                break;
            case 'supplier':
                $url = $context->link->getAdminLink('AdminSuppliers');
                $url .= '&id_supplier='.$id.'&updatesupplier';
                break;
            case 'cms':
                $url = $context->link->getAdminLink('AdminCmsContent');
                $url .= '&id_cms='.$id.'&updatecms';
                break;
            case 'cmscategory':
                $url = $context->link->getAdminLink('AdminCmsContent');
                $url .= '&id_cms_category='.$id.'&updatecms_category';
                break;
        }

        $this->module->smartyAssign(array(
            'button_url' => $url,
            'button_name' => $this->l('Edit')
        ));

        return $this->module->smartyFetch('admin/edit_object_link.tpl');
    }
}
