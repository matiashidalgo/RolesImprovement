<?php
/**
 * Created for  RolesImprovements.
 * @author:     mhidalgo@summasolutions.net
 * Date:        17/08/15
 * Time:        08:55
 * @copyright   Copyright (c) 2015
 */

class Mhidalgo_RolesImprovements_Model_Observer
{
    /**
     * @param $observer
     */
    public function coreBlockAbstractPrepareLayoutAfter($observer) {
        $validator = $this->_getValidatorHelper();
        $block = $observer->getBlock();
        switch (get_class($block)) {
            case 'Mage_Adminhtml_Block_Catalog_Product':
                $validator->validateAdminhtmlCatalogProduct($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Product_Edit':
                $validator->validateAdminhtmlCatalogProductEdit($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Price_Tier':
            case 'Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Price_Group':
                $validator->validateAdminhtmlCatalogProductEditTabPrice($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Options':
                $validator->validateAdminhtmlCatalogProductEditTabOptions($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Options_Option':
                $validator->validateAdminhtmlCatalogProductEditTabOptionsOption($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Product_Attribute':
                $validator->validateAdminhtmlCatalogProductAttribute($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Product_Attribute_Edit':
                $validator->validateAdminhtmlCatalogProductAttributeEdit($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Product_Attribute_Edit_Tab_Options':
                $validator->validateAdminhtmlCatalogProductAttributeEditTabOptions($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Product_Attribute_Set_Toolbar_Main':
                $validator->validateAdminhtmlCatalogProductAttributeSetToolbarMain($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Product_Attribute_Set_Main':
                $validator->validateAdminhtmlCatalogProductAttributeSetMain($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Category_Edit_Form':
                $validator->validateAdminhtmlCatalogCategoryEditForm($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Category_Tree':
                $validator->validateAdminhtmlCatalogCategoryTree($block);
                break;
            case 'Mage_Adminhtml_Block_Media_Uploader':
                $validator->validateAdminhtmlMediaUploader($block);
                break;
            case 'Mage_Adminhtml_Block_Urlrewrite':
                $validator->validateAdminhtmlUrlrewrite($block);
                break;
            case 'Mage_Adminhtml_Block_Urlrewrite_Edit':
                $validator->validateAdminhtmlUrlrewriteEdit($block);
                break;
        }
    }

    /**
     * @param $observer
     */
    public function adminhtmlCatalogProductGridPrepareMassaction($observer) {
        /** @var Mage_Adminhtml_Block_Catalog_Product_Grid $block */
        $block = $observer->getBlock();

        if (!$this->_getValidatorHelper()->canCatalogProduct('delete')) {
            $block->getMassactionBlock()->removeItem('delete');
        }

        if (!$this->_getValidatorHelper()->canCatalogProduct('edit')) {
            $block->getMassactionBlock()->removeItem('status');
        }
    }

    /**
     * @return Mhidalgo_RolesImprovements_Helper_Validator
     */
    protected function _getValidatorHelper() {
        return Mage::helper('mhidalgo_rolesimprovements/validator');
    }
}