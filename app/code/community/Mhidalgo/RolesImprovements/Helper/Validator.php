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

    public function canCatalogSearch($action) {
        return $this->getAdminSession()->isAllowed('catalog/search/'.$action);
    }

    public function canCatalogReviewPending($action) {
        return $this->getAdminSession()->isAllowed('catalog/reviews_ratings/review/pending/'.$action);
    }

    public function canCatalogReviewAll($action) {
        return $this->getAdminSession()->isAllowed('catalog/reviews_ratings/review/all/'.$action);
    }

    public function canCatalogRating($action) {
        return $this->getAdminSession()->isAllowed('catalog/reviews_ratings/rating/'.$action);
    }

    public function canCatalogSitemap($action) {
        return $this->getAdminSession()->isAllowed('catalog/sitemap/'.$action);
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
     * @param Mage_Adminhtml_Block_Catalog_Product_Grid $block
     */
    public function validateAdminhtmlCatalogProductGrid($block) {
        if (!$this->canCatalogProduct('edit')) {
            $block->removeColumn('action');
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
            $block->unsetChild('product_link');
            $block->unsetChild('category_link');
        }

        if (!$this->canCatalogUrlRewrite('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Search $block
     */
    public function validateAdminhtmlCatalogSearch($block) {
        if (!$this->canCatalogSearch('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Search_Grid $block
     */
    public function validateAdminhtmlCatalogSearchGrid($block) {
        if (!$this->canCatalogSearch('edit')) {
            $block->removeColumn('action');
        }

        if (!$this->canCatalogSearch('delete')) {
            $block->getMassactionBlock()->removeItem('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Catalog_Search_Edit $block
     */
    public function validateAdminhtmlCatalogSearchEdit($block) {
        if (!$this->canCatalogSearch('edit')) {
            $block->removeButton('save');
            $block->removeButton('reset');
        }

        if (!$this->canCatalogSearch('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Review_Main $block
     */
    public function validateAdminhtmlReviewMain($block) {
        if( Mage::registry('usePendingFilter') === true ) {
            if (!$this->canCatalogReviewPending('edit')) {
                $block->removeButton('add');
            }
        } else {
            if (!$this->canCatalogReviewAll('edit')) {
                $block->removeButton('add');
            }
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Review_Edit $block
     */
    public function validateAdminhtmlReviewEdit($block) {
        if( Mage::registry('usePendingFilter') === true ) {
            if (!$this->canCatalogReviewPending('edit')) {
                $block->removeButton('save');
                $block->removeButton('reset');
            }

            if (!$this->canCatalogReviewPending('delete')) {
                $block->removeButton('delete');
            }
        } else {
            if (!$this->canCatalogReviewAll('edit')) {
                $block->removeButton('save');
                $block->removeButton('reset');
            }

            if (!$this->canCatalogReviewAll('delete')) {
                $block->removeButton('delete');
            }
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Review_Grid $block
     */
    public function validateAdminhtmlReviewGrid($block) {
        if (!$this->canCatalogReviewPending('edit')) {
            $block->removeColumn('action');
            $block->getMassactionBlock()->removeItem('update_status');
        }

        if (!$this->canCatalogReviewPending('delete')) {
            $block->getMassactionBlock()->removeItem('delete');
        }

        if (!$this->canCatalogReviewAll('edit')) {
            $block->removeColumn('action');
            $block->getMassactionBlock()->removeItem('update_status');
        }

        if (!$this->canCatalogReviewAll('delete')) {
            $block->getMassactionBlock()->removeItem('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Rating_Rating $block
     */
    public function validateAdminhtmlRatingRating($block) {
        if (!$this->canCatalogRating('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Rating_Edit $block
     */
    public function validateAdminhtmlRatingEdit($block) {
        if (!$this->canCatalogRating('edit')) {
            $block->removeButton('save');
            $block->removeButton('reset');
        }

        if (!$this->canCatalogRating('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Sitemap $block
     */
    public function validateAdminhtmlSitemap($block) {
        if (!$this->canCatalogSitemap('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Sitemap_Edit $block
     */
    public function validateAdminhtmlSitemapEdit($block) {
        if (!$this->canCatalogSitemap('edit')) {
            $block->removeButton('save');
            $block->removeButton('generate');
            $block->removeButton('reset');
        }

        if (!$this->canCatalogRating('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Sitemap_Grid $block
     */
    public function validateAdminhtmlSitemapGrid($block) {
        if (!$this->canCatalogSitemap('edit')) {
            $block->removeColumn('action');
        }
    }
}