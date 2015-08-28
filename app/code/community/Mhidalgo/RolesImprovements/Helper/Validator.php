<?php
/**
 * Created for  RolesImprovements.
 * @author:     mhidalgo@summasolutions.net
 * Date:        17/08/15
 * Time:        09:09
 * @copyright   Copyright (c) 2015
 */

class Mhidalgo_RolesImprovements_Helper_Validator
    extends Mage_Core_Helper_Abstract
{
    /**
     * Return Admin Session Model
     * @return Mage_Admin_Model_Session
     */
    protected function getAdminSession() {
        return Mage::getSingleton('admin/session');
    }

    /**
     * Validate role access
     * @return bool
     */
    public function can() {
        return $this->getAdminSession()->isAllowed('');
    }
    public function validateAdminhtml() {

    }

    // Catalog Related Validations
    public function canCatalogProduct($action) {
        return $this->getAdminSession()->isAllowed('catalog/product/'.$action);
    }

    public function canCatalogAttribute($action) {
        return $this->getAdminSession()->isAllowed('catalog/attributes/attributes/'.$action);
    }

    public function canCatalogAttributeSet($action) {
        return $this->getAdminSession()->isAllowed('catalog/attributes/sets/'.$action);
    }

    public function canCatalogCategories($action) {
        return $this->getAdminSession()->isAllowed('catalog/categories/'.$action);
    }

    public function canCatalogUrlRewrite($action) {
        return $this->getAdminSession()->isAllowed('catalog/urlrewrite/'.$action);
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Product $block
     */
    public function validateAdminhtmlCatalogProduct($block) {
        if (!$this->canCatalogProduct('edit')) {
            $block->removeButton('add_new');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Product_Edit $block
     */
    public function validateAdminhtmlCatalogProductEdit($block) {
        if (!$this->canCatalogProduct('edit')) {
            $block->unsetChild('reset_button');
            $block->unsetChild('save_button');
            $block->unsetChild('save_and_edit_button');
            $block->unsetChild('duplicate_button');
        }
        if (!$this->canCatalogProduct('delete')) {
            $block->unsetChild('delete_button');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Price_Tier|Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Price_Group $block
     */
    public function validateAdminhtmlCatalogProductEditTabPrice($block) {
        if (!$this->canCatalogProduct('edit')) {
            $block->unsetChild('add_button');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Media_Uploader $block
     */
    public function validateAdminhtmlMediaUploader($block) {
        if (Mage::app()->getRequest()->getModuleName() == 'admin' &&
            Mage::app()->getRequest()->getControllerName() == 'catalog_product' &&
            Mage::app()->getRequest()->getActionName() == 'edit'
        ) {
            if (!$this->canCatalogProduct('edit')) {
                $block->setTemplate('');
            }
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Options $block
     */
    public function validateAdminhtmlCatalogProductEditTabOptions($block) {
        if (!$this->canCatalogProduct('edit')) {
            $block->unsetChild('add_button');
            $block->unsetChild('options_box');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Options_Option $block
     */
    public function validateAdminhtmlCatalogProductEditTabOptionsOption($block) {
        if (!$this->canCatalogProduct('edit')) {
            $block->unsetChild('delete_button');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Product_Attribute $block
     */
    public function validateAdminhtmlCatalogProductAttribute($block) {
        if (!$this->canCatalogAttribute('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Product_Attribute_Edit $block
     */
    public function validateAdminhtmlCatalogProductAttributeEdit($block) {
        if (!$this->canCatalogAttribute('edit')) {
            $block->removeButton('save_and_edit_button');
            $block->removeButton('save');
            $block->removeButton('reset');
        }

        if (!$this->canCatalogAttribute('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Product_Attribute_Edit_Tab_Options $block
     */
    public function validateAdminhtmlCatalogProductAttributeEditTabOptions($block) {
        if (!$this->canCatalogAttribute('edit')) {
            $block->unsetChild('add_button');
        }

        if (!$this->canCatalogAttribute('delete')) {
            $block->unsetChild('delete_button');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Product_Attribute_Set_Toolbar_Main $block
     */
    public function validateAdminhtmlCatalogProductAttributeSetToolbarMain($block) {
        if (!$this->canCatalogAttribute('edit')) {
            $block->unsetChild('addButton');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Product_Attribute_Set_Main $block
     */
    public function validateAdminhtmlCatalogProductAttributeSetMain($block) {
        if (!$this->canCatalogAttribute('edit')) {
            $block->unsetChild('add_group_button');
            $block->unsetChild('reset_button');
            $block->unsetChild('save_button');
            $block->unsetChild('rename_button');
        }
        if (!$this->canCatalogAttribute('delete')) {
            $block->unsetChild('delete_group_button');
            $block->unsetChild('delete_button');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Category_Tree $block
     */
    public function validateAdminhtmlCatalogCategoryEditForm($block) {
        if (!$this->canCatalogCategories('edit')) {
            $block->unsetChild('save_button');
            $block->unsetChild('reset_button');
        }
        if (!$this->canCatalogCategories('delete')) {
            $block->unsetChild('delete_button');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Category_Tree $block
     */
    public function validateAdminhtmlCatalogCategoryTree($block) {
        if (!$this->canCatalogCategories('edit')) {
            $block->unsetChild('add_sub_button');
            $block->unsetChild('add_root_button');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Urlrewrite $block
     */
    public function validateAdminhtmlUrlrewrite($block) {
        if (!$this->canCatalogUrlRewrite('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Urlrewrite_Edit $block
     */
    public function validateAdminhtmlUrlrewriteEdit($block) {
        if (!$this->canCatalogUrlRewrite('edit')) {
            $block->removeButton('reset');
            $block->removeButton('save');
        }

        if (!$this->canCatalogUrlRewrite('delete')) {
            $block->removeButton('delete');
        }

        if ($this->getProductId()) {
            $this->setChild('product_link', $this->getLayout()->createBlock('adminhtml/urlrewrite_link')
                    ->setData(array(
                        'item_url' => Mage::helper('adminhtml')->getUrl('*/*/*') . 'product',
                        'item'     => Mage::registry('current_product'),
                        'label'    => Mage::helper('adminhtml')->__('Product:')
                    ))
            );
        }
        if ($this->getCategoryId()) {
            $itemUrl = Mage::helper('adminhtml')->getUrl('*/*/*') . 'category';
            $this->getChild('category_link')
                ->setData(array(
                    'item_url' => ''
                ));

        }
    }
}