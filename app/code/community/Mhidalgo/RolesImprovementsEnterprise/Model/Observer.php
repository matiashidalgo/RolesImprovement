<?php
/**
 * Created for  RolesImprovements.
 * @author:     mhidalgo@summasolutions.net
 * Date:        07/09/2015
 * Time:        04:37 PM
 * @copyright   Copyright (c) 2015
 */
class Mhidalgo_RolesImprovementsEnterprise_Model_Observer
    extends Mage_Core_Model_Abstract
{
    /**
     * @param $observer
     */
    public function coreBlockAbstractPrepareLayoutAfter($observer)
    {
        $validator = $this->_getValidatorHelper();
        $block = $observer->getBlock();

        if ($block instanceof Enterprise_GiftWrapping_Block_Adminhtml_Giftwrapping) {
            $validator->validateEnterpriseGiftWrappingAdminhtmlGiftwrapping($block);

        } elseif ($block instanceof Enterprise_GiftWrapping_Block_Adminhtml_Giftwrapping_Edit) {
            $validator->validateEnterpriseGiftWrappingAdminhtmlGiftwrappingEdit($block);

        } elseif ($block instanceof Enterprise_Rma_Block_Adminhtml_Rma) {
            $validator->validateEnterpriseRmaAdminhtmlRma($block);

        }
    }

    public function adminhtmlBlockHtmlBefore($observer)
    {
        $validator = $this->_getValidatorHelper();
        $block = $observer->getBlock();

        if ($block instanceof Enterprise_GiftWrapping_Block_Adminhtml_Giftwrapping_Edit_Form) {
            $validator->validateEnterpriseGiftWrappingAdminhtmlGiftwrappingEditForm($block);

        }
    }

    /**
     * @return Mhidalgo_RolesImprovementsEnterprise_Helper_Validator
     */
    protected function _getValidatorHelper() {
        return Mage::helper('mhidalgo_rolesimprovementsenterprise/validator');
    }
}