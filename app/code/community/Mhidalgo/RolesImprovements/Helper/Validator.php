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

    /**
     * @param Mage_Adminhtml_Block_Catalog_Product $block
     */
    public function validateAdminhtmlCatalogProduct($block) {
        if (!$this->canCatalogProduct('edit')) {
            $block->removeButton('add_new');
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
     * @param Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Options $block
     */
    public function validateAdminhtmlCatalogProductEditTabOptionsOption($block) {
        if (!$this->canCatalogProduct('edit')) {
            $block->unsetChild('delete_button');
        }
    }
}