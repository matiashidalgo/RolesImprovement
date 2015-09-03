<?php
/**
 * Created for  RolesImprovement.
 *
 * @author:     mhidalgo@summasolutions.net
 *              Date: 03/09/15
 *              Time: 15:44
 * @copyright   Copyright (c) 2015 Summa Solutions (http://www.summasolutions.net)
 */

class Mhidalgo_RolesImprovements_Block_Widget_Adminhtml_Instance_Edit_Tab_Main_Layout
    extends Mage_Widget_Block_Adminhtml_Widget_Instance_Edit_Tab_Main_Layout
{
    /**
     * @return Mhidalgo_RolesImprovements_Helper_Validator
     */
    public function getValidatorHelper()
    {
        return Mage::helper('mhidalgo_rolesimprovements/validator');
    }

    /**
     * Retrieve add layout button html
     *
     * @return string
     */
    public function getAddLayoutButtonHtml()
    {
        if (!$this->getValidatorHelper()->canCmsWidgetInstance('edit')) {
            return '';
        }
        return parent::getAddLayoutButtonHtml();
    }

    /**
     * Retrieve remove layout button html
     *
     * @return string
     */
    public function getRemoveLayoutButtonHtml()
    {
        if (!$this->getValidatorHelper()->canCmsWidgetInstance('edit')) {
            return '';
        }
        return parent::getRemoveLayoutButtonHtml();
    }
}