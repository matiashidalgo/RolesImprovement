<?php
/**
 * Created for  RolesImprovements.
 * @author:     mhidalgo@summasolutions.net
 * Date:        17/08/15
 * Time:        08:42
 * @copyright   Copyright (c) 2015
 */

class Mhidalgo_RolesImprovements_Block_Adminhtml_Catalog_Product_Grid
    extends Mage_Adminhtml_Block_Catalog_Product_Grid
{
    protected function _prepareColumns()
    {
        parent::_prepareColumns();

        if (!$this->_getRoleValidatorHelper()->canCatalogProduct('edit')) {
            $this->removeColumn('action');
        }

        return $this;
    }

    /**
     * @return Mhidalgo_RolesImprovements_Helper_Validator
     */
    protected function _getRoleValidatorHelper() {
        return Mage::helper('mhidalgo_rolesimprovements/validator');
    }
}