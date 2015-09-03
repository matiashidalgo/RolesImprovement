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
            case 'Mage_Adminhtml_Block_Catalog_Search':
                $validator->validateAdminhtmlCatalogSearch($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Search_Edit':
                $validator->validateAdminhtmlCatalogSearchEdit($block);
                break;
            case 'Mage_Adminhtml_Block_Review_Main':
                $validator->validateAdminhtmlReviewMain($block);
                break;
            case 'Mage_Adminhtml_Block_Review_Edit':
                $validator->validateAdminhtmlReviewEdit($block);
                break;
            case 'Mage_Adminhtml_Block_Rating_Rating':
                $validator->validateAdminhtmlRatingRating($block);
                break;
            case 'Mage_Adminhtml_Block_Rating_Edit':
                $validator->validateAdminhtmlRatingEdit($block);
                break;
            case 'Mage_Adminhtml_Block_Sitemap':
                $validator->validateAdminhtmlSitemap($block);
                break;
            case 'Mage_Adminhtml_Block_Sitemap_Edit':
                $validator->validateAdminhtmlSitemapEdit($block);
                break;
            case 'Mage_Adminhtml_Block_Customer':
                $validator->validateAdminhtmlCustomer($block);
                break;
            case 'Mage_Adminhtml_Block_Customer_Edit':
                $validator->validateAdminhtmlCustomerEdit($block);
                break;
            case 'Mage_Adminhtml_Block_Customer_Group':
                $validator->validateAdminhtmlCustomerGroup($block);
                break;
            case 'Mage_Adminhtml_Block_Customer_Group_Edit':
                $validator->validateAdminhtmlCustomerGroupEdit($block);
                break;
            case 'Mage_Adminhtml_Block_Newsletter_Template':
                $validator->validateAdminhtmlNewsletterTemplate($block);
                break;
            case 'Mage_Adminhtml_Block_Newsletter_Template_Edit':
                $validator->validateAdminhtmlNewsletterTemplateEdit($block);
                break;
            case 'Mage_Adminhtml_Block_Newsletter_Queue_Edit':
                $validator->validateAdminhtmlNewsletterQueueEdit($block);
                break;
            case 'Mage_Adminhtml_Block_Promo_Catalog':
                $validator->validateAdminhtmlPromoCatalog($block);
                break;
            case 'Mage_Adminhtml_Block_Promo_Catalog_Edit':
                $validator->validateAdminhtmlPromoCatalogEdit($block);
                break;
            case 'Mage_Adminhtml_Block_Promo_Quote':
                $validator->validateAdminhtmlPromoQuote($block);
                break;
            case 'Mage_Adminhtml_Block_Promo_Quote_Edit':
                $validator->validateAdminhtmlPromoQuoteEdit($block);
                break;
        }
    }

    public function adminhtmlBlockHtmlBefore($observer)
    {
        $validator = $this->_getValidatorHelper();
        $block = $observer->getBlock();
        switch (get_class($block)) {
            case 'Mage_Adminhtml_Block_Catalog_Product_Grid':
                $validator->validateAdminhtmlCatalogProductGrid($block);
                break;
            case 'Mage_Adminhtml_Block_Catalog_Search_Grid':
                $validator->validateAdminhtmlCatalogSearchGrid($block);
                break;
            case 'Mage_Adminhtml_Block_Review_Grid':
                $validator->validateAdminhtmlReviewGrid($block);
                break;
            case 'Mage_Adminhtml_Block_Sitemap_Grid':
                $validator->validateAdminhtmlSitemapGrid($block);
                break;
            case 'Mage_Adminhtml_Block_Customer_Grid':
                $validator->validateAdminhtmlCustomerGrid($block);
                break;
            case 'Mage_Adminhtml_Block_Customer_Edit_Tab_Orders':
                $validator->validateAdminhtmlCustomerEditTabOrders($block);
                break;
            case 'Mage_Adminhtml_Block_Customer_Edit_Tab_Addresses':
                $validator->validateAdminhtmlCustomerEditTabAddresses($block);
                break;
            case 'Mage_Adminhtml_Block_Customer_Edit_Tab_View_Orders':
                $validator->validateAdminhtmlCustomerEditTabViewOrders($block);
                break;
            case 'Mage_Adminhtml_Block_Customer_Edit_Tab_Cart':
                $validator->validateAdminhtmlCustomerEditTabCart($block);
                break;
            case 'Mage_Adminhtml_Block_Customer_Edit_Tab_Wishlist':
                $validator->validateAdminhtmlCustomerEditTabWishlist($block);
                break;
            case 'Mage_Adminhtml_Block_Newsletter_Template_Grid':
                $validator->validateAdminhtmlNewsletterTemplateGrid($block);
                break;
            case 'Mage_Adminhtml_Block_Newsletter_Subscriber_Grid':
                $validator->validateAdminhtmlNewsletterSubscriberGrid($block);
                break;
            case 'Mage_Adminhtml_Block_Promo_Catalog_Edit_Tab_Conditions':
                $validator->validateAdminhtmlPromoCatalogEditTabConditions($block);
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