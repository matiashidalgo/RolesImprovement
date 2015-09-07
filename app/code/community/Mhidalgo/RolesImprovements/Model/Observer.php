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
        if ($block instanceof Mage_Adminhtml_Block_Catalog_Product) {
            $validator->validateAdminhtmlCatalogProduct($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Edit) {
            $validator->validateAdminhtmlCatalogProductEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Price_Tier ||
            $block instanceof Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Price_Group) {
            $validator->validateAdminhtmlCatalogProductEditTabPrice($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Options) {
            $validator->validateAdminhtmlCatalogProductEditTabOptions($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Options_Option) {
            $validator->validateAdminhtmlCatalogProductEditTabOptionsOption($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Attribute) {
            $validator->validateAdminhtmlCatalogProductAttribute($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Attribute_Edit) {
            $validator->validateAdminhtmlCatalogProductAttributeEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Attribute_Edit_Tab_Options) {
            $validator->validateAdminhtmlCatalogProductAttributeEditTabOptions($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Attribute_Set_Toolbar_Main) {
            $validator->validateAdminhtmlCatalogProductAttributeSetToolbarMain($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Attribute_Set_Main) {
            $validator->validateAdminhtmlCatalogProductAttributeSetMain($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Category_Edit_Form) {
            $validator->validateAdminhtmlCatalogCategoryEditForm($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Category_Tree) {
            $validator->validateAdminhtmlCatalogCategoryTree($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Media_Uploader) {
            $validator->validateAdminhtmlMediaUploader($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Urlrewrite) {
            $validator->validateAdminhtmlUrlrewrite($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Urlrewrite_Edit) {
            $validator->validateAdminhtmlUrlrewriteEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Search) {
            $validator->validateAdminhtmlCatalogSearch($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Search_Edit) {
            $validator->validateAdminhtmlCatalogSearchEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Review_Main) {
            $validator->validateAdminhtmlReviewMain($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Review_Edit) {
            $validator->validateAdminhtmlReviewEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Rating_Rating) {
            $validator->validateAdminhtmlRatingRating($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Rating_Edit) {
            $validator->validateAdminhtmlRatingEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Sitemap) {
            $validator->validateAdminhtmlSitemap($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Sitemap_Edit) {
            $validator->validateAdminhtmlSitemapEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Customer) {
            $validator->validateAdminhtmlCustomer($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Customer_Edit) {
            $validator->validateAdminhtmlCustomerEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Customer_Group) {
            $validator->validateAdminhtmlCustomerGroup($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Customer_Group_Edit) {
            $validator->validateAdminhtmlCustomerGroupEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Newsletter_Template) {
            $validator->validateAdminhtmlNewsletterTemplate($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Newsletter_Template_Edit) {
            $validator->validateAdminhtmlNewsletterTemplateEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Newsletter_Queue_Edit) {
            $validator->validateAdminhtmlNewsletterQueueEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Promo_Catalog) {
            $validator->validateAdminhtmlPromoCatalog($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Promo_Catalog_Edit) {
            $validator->validateAdminhtmlPromoCatalogEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Promo_Quote) {
            $validator->validateAdminhtmlPromoQuote($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Promo_Quote_Edit) {
            $validator->validateAdminhtmlPromoQuoteEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Cms_Block) {
            $validator->validateAdminhtmlCmsBlock($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Cms_Block_Edit) {
            $validator->validateAdminhtmlCmsBlockEdit($block);

        } elseif ($block instanceof Mage_Widget_Block_Adminhtml_Widget_Instance) {
            $validator->validateWidgetAdminhtmlWidgetInstance($block);

        } elseif ($block instanceof Mage_Widget_Block_Adminhtml_Widget_Instance_Edit) {
            $validator->validateWidgetAdminhtmlWidgetInstanceEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Checkout_Agreement) {
            $validator->validateAdminhtmlCheckoutAgreement($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Checkout_Agreement_Edit) {
            $validator->validateAdminhtmlCheckoutAgreementEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Backup) {
            $validator->validateAdminhtmlBackup($block);

        } elseif ($block instanceof Mage_Compiler_Block_Process) {
            $validator->validateCompilerProcess($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Tax_Rule) {
            $validator->validateAdminhtmlTaxRule($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Tax_Rule_Edit) {
            $validator->validateAdminhtmlTaxRuleEdit($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Tax_Rate_Toolbar_Add) {
            $validator->validateAdminhtmlTaxRateToolbarAdd($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Tax_Rate_Toolbar_Save) {
            $validator->validateAdminhtmlTaxRateToolbarSave($block);

        }
    }

    public function adminhtmlBlockHtmlBefore($observer)
    {
        $validator = $this->_getValidatorHelper();
        $block = $observer->getBlock();
        if ($block instanceof Mage_Adminhtml_Block_Catalog_Product_Grid) {
            $validator->validateAdminhtmlCatalogProductGrid($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Catalog_Search_Grid) {
            $validator->validateAdminhtmlCatalogSearchGrid($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Review_Grid) {
            $validator->validateAdminhtmlCatalogSearchGrid($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Sitemap_Grid) {
            $validator->validateAdminhtmlSitemapGrid($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Customer_Grid) {
            $validator->validateAdminhtmlCustomerGrid($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Customer_Edit_Tab_Orders) {
            $validator->validateAdminhtmlCustomerEditTabOrders($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Customer_Edit_Tab_Addresses) {
            $validator->validateAdminhtmlCustomerEditTabAddresses($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Customer_Edit_Tab_View_Orders) {
            $validator->validateAdminhtmlCustomerEditTabViewOrders($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Customer_Edit_Tab_Cart) {
            $validator->validateAdminhtmlCustomerEditTabCart($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Customer_Edit_Tab_Wishlist) {
            $validator->validateAdminhtmlCustomerEditTabWishlist($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Newsletter_Template_Grid) {
            $validator->validateAdminhtmlNewsletterTemplateGrid($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Newsletter_Subscriber_Grid) {
            $validator->validateAdminhtmlNewsletterSubscriberGrid($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Promo_Catalog_Edit_Tab_Conditions) {
            $validator->validateAdminhtmlPromoCatalogEditTabConditions($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Promo_Quote_Edit_Tab_Actions) {
            $validator->validateAdminhtmlPromoQuoteEditTabActions($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Promo_Quote_Edit_Tab_Conditions) {
            $validator->validateAdminhtmlPromoQuoteEditTabConditions($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Promo_Quote_Edit_Tab_Coupons_Grid) {
            $validator->validateAdminhtmlPromoQuoteEditTabCouponsGrid($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Promo_Quote_Edit_Tab_Coupons_Form) {
            $validator->validateAdminhtmlPromoQuoteEditTabCouponsForm($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Backup_Grid) {
            $validator->validateAdminhtmlBackupGrid($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Tax_Class) {
            $validator->validateAdminhtmlTaxClass($block);

        } elseif ($block instanceof Mage_Adminhtml_Block_Tax_Class_Edit) {
            $validator->validateAdminhtmlTaxClassEdit($block);

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