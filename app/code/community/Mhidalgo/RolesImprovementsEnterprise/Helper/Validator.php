<?php
/**
 * Created for  RolesImprovements.
 * @author:     mhidalgo@summasolutions.net
 * Date:        07/09/2015
 * Time:        04:36 PM
 * @copyright   Copyright (c) 2015
 */

class Mhidalgo_RolesImprovementsEnterprise_Helper_Validator
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
    public function can($allow) {
        return $this->getAdminSession()->isAllowed($allow);
    }

    public function canSalesEnterpriseGiftWrapping($action) {
        return $this->getAdminSession()->isAllowed('sales/enterprise_giftwrapping/'.$action);
    }

    public function canSalesEnterpriseRmaRma($action) {
        return $this->getAdminSession()->isAllowed('sales/enterprise_rma/rma/'.$action);
    }

    public function canSalesEnterpriseRmaRmaItemAttribute($action) {
        return $this->getAdminSession()->isAllowed('sales/enterprise_rma/rma_item_attribute/'.$action);
    }

    /**
     * @param Enterprise_GiftWrapping_Block_Adminhtml_Giftwrapping $block
     */
    public function validateEnterpriseGiftWrappingAdminhtmlGiftwrapping($block) {
        if (!$this->canSalesEnterpriseGiftWrapping('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Enterprise_GiftWrapping_Block_Adminhtml_Giftwrapping_Edit $block
     */
    public function validateEnterpriseGiftWrappingAdminhtmlGiftwrappingEdit($block) {
        if (!$this->canSalesEnterpriseGiftWrapping('edit')) {
            $block->removeButton('save');
            $block->removeButton('reset');
            $block->removeButton('save_and_continue_edit');
        }

        if (!$this->canSalesEnterpriseGiftWrapping('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Enterprise_GiftWrapping_Block_Adminhtml_Giftwrapping_Edit_Form $block
     */
    public function validateEnterpriseGiftWrappingAdminhtmlGiftwrappingEditForm($block) {
        if (!$this->canSalesEnterpriseGiftWrapping('edit')) {
            $block->getForm()->getElement('image')->setAfterElementHtml('');
        }
    }

    /**
     * @param Enterprise_Rma_Block_Adminhtml_Rma $block
     */
    public function validateEnterpriseRmaAdminhtmlRma($block) {
        if (!$this->canSalesEnterpriseRmaRma('edit')) {
            $block->getForm()->getElement('image')->setAfterElementHtml('');
        }
    }
}