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
    public function can($allow) {
        return $this->getAdminSession()->isAllowed($allow);
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

    public function canCustomerManage($action) {
        return $this->getAdminSession()->isAllowed('customer/manage/'.$action);
    }

    public function canCustomerGroup($action) {
        return $this->getAdminSession()->isAllowed('customer/group/'.$action);
    }

    public function canNewsletterTemplate($action) {
        return $this->getAdminSession()->isAllowed('newsletter/template/'.$action);
    }

    public function canNewsletterSubscriber($action) {
        return $this->getAdminSession()->isAllowed('newsletter/subscriber/'.$action);
    }

    public function canNewsletterQueue($action) {
        return $this->getAdminSession()->isAllowed('newsletter/queue/'.$action);
    }

    public function canPromoCatalog($action) {
        return $this->getAdminSession()->isAllowed('promo/catalog/'.$action);
    }

    public function canPromoQuote($action) {
        return $this->getAdminSession()->isAllowed('promo/quote/'.$action);
    }

    public function canCmsBlock($action) {
        return $this->getAdminSession()->isAllowed('cms/block/'.$action);
    }

    public function canCmsWidgetInstance($action) {
        return $this->getAdminSession()->isAllowed('cms/widget_instance/'.$action);
    }

    public function canSalesCheckoutagreement($action) {
        return $this->getAdminSession()->isAllowed('sales/checkoutagreement/'.$action);
    }

    public function canSystemToolsBackup($action) {
        return $this->getAdminSession()->isAllowed('system/tools/backup/'.$action);
    }

    public function canSystemToolsCompiler($action) {
        return $this->getAdminSession()->isAllowed('system/tools/compiler/'.$action);
    }

    public function canBillingAgreement($action) {
        switch ($action) {
            case 'view' :
                $action = 'view';
                break;
            case 'edit' :
                $action = 'manage';
                break;
            case 'delete':
                $action = 'manage';
                break;
        }
        return $this->getAdminSession()->isAllowed('sales/billing_agreement/actions/'.$action);
    }

    public function canSalesOrder($action) {
        $action = strtolower($action);
        switch ($action) {
            case 'hold':
                $aclResource = 'sales/order/actions/hold';
                break;
            case 'unhold':
                $aclResource = 'sales/order/actions/unhold';
                break;
            case 'email':
                $aclResource = 'sales/order/actions/email';
                break;
            case 'cancel':
                $aclResource = 'sales/order/actions/cancel';
                break;
            case 'view':
                $aclResource = 'sales/order/actions/view';
                break;
            case 'addcomment':
                $aclResource = 'sales/order/actions/comment';
                break;
            case 'creditmemos':
                $aclResource = 'sales/order/actions/creditmemo';
                break;
            case 'reviewpayment':
                $aclResource = 'sales/order/actions/review_payment';
                break;
            case 'edit':
                $aclResource = 'sales/order/actions/edit';
                break;
            case 'save':
                $aclResource = 'sales/order/actions/create';
                break;
            case 'reorder':
                $aclResource = 'sales/order/actions/reorder';
                break;
            /*case 'creditmemo': //todo this
                $aclResource = 'sales/creditmemo';
                break;
            case 'invoice':
                $aclResource = 'sales/invoice';
                break;*/
            default:
                $aclResource = 'sales/order/actions';
                break;

        }
        return $this->getAdminSession()->isAllowed($aclResource);
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

        if (!$this->canCatalogSitemap('delete')) {
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

    /**
     * @param Mage_Adminhtml_Block_Customer $block
     */
    public function validateAdminhtmlCustomer($block) {
        if (!$this->canCustomerManage('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Customer_Edit $block
     */
    public function validateAdminhtmlCustomerEdit($block) {
        if (!$this->canCustomerManage('edit')) {
            $block->removeButton('save');
            $block->removeButton('save_and_continue');
            $block->removeButton('reset');
        }

        if (!$this->canCustomerManage('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Customer_Grid $block
     */
    public function validateAdminhtmlCustomerGrid($block) {
        if (!$this->canCustomerManage('edit')) {
            $block->removeColumn('action');
        }

        if (!$this->canCustomerManage('delete')) {
            $block->getMassactionBlock()->removeItem('delete');
        }

        if (!$this->canCustomerGroup('edit')) {
            $block->getMassactionBlock()->removeItem('assign_group');
        }

        if (!$this->canNewsletterSubscriber('edit')) {
            $block->getMassactionBlock()->removeItem('newsletter_subscribe');
            $block->getMassactionBlock()->removeItem('newsletter_unsubscribe');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Customer_Edit_Tab_Orders $block
     */
    public function validateAdminhtmlCustomerEditTabOrders($block) {
        if (!$this->canSalesOrder('reorder')) {
            $block->removeColumn('action');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Customer_Edit_Tab_Addresses $block
     */
    public function validateAdminhtmlCustomerEditTabAddresses($block) {
        if (!$this->canCustomerManage('edit')) {
            $block->unsetChild('add_address_button');
            $block->unsetChild('cancel_button');
            Mage::registry('current_customer')->setIsReadonly(true);
        }

        if (!$this->canCustomerManage('delete')) {
            $block->unsetChild('delete_button');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Customer_Edit_Tab_View_Orders $block
     */
    public function validateAdminhtmlCustomerEditTabViewOrders($block) {
        if (!$this->canSalesOrder('reorder')) {
            $block->removeColumn('action');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Customer_Edit_Tab_Cart $block
     */
    public function validateAdminhtmlCustomerEditTabCart($block) {
        if (!$this->canCustomerManage('edit')) {
            $block->removeColumn('action');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Customer_Edit_Tab_Wishlist $block
     */
    public function validateAdminhtmlCustomerEditTabWishlist($block) {
        if (!$this->canCustomerManage('edit')) {
            $block->removeColumn('action');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Customer_Group $block
     */
    public function validateAdminhtmlCustomerGroup($block) {
        if (!$this->canCustomerGroup('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Customer_Group_Edit $block
     */
    public function validateAdminhtmlCustomerGroupEdit($block) {
        if (!$this->canCustomerGroup('edit')) {
            $block->removeButton('save');
            $block->removeButton('reset');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Newsletter_Template $block
     */
    public function validateAdminhtmlNewsletterTemplate($block) {
        if (!$this->canNewsletterTemplate('edit')) {
            $block->setTemplate('newsletter/template/listWithoutAdd.phtml');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Newsletter_Template_Grid $block
     */
    public function validateAdminhtmlNewsletterTemplateGrid($block) {
        if (!$this->canNewsletterTemplate('edit')) {
            $block->removeColumn('action');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Newsletter_Template_Edit $block
     */
    public function validateAdminhtmlNewsletterTemplateEdit($block) {
        if (!$this->canNewsletterTemplate('edit')) {
            $block->unsetChild('reset_button');
            $block->unsetChild('to_plain_button');
            $block->unsetChild('to_html_button');
            $block->unsetChild('save_button');
            $block->unsetChild('save_as_button');
        }

        if (!$this->canNewsletterTemplate('delete')) {
            $block->unsetChild('delete_button');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Newsletter_Subscriber_Grid $block
     */
    public function validateAdminhtmlNewsletterSubscriberGrid($block) {
        if (!$this->canNewsletterSubscriber('edit')) {
            $block->getMassactionBlock()->removeItem('unsubscribe');
        }

        if (!$this->canNewsletterSubscriber('delete')) {
            $block->getMassactionBlock()->removeItem('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Newsletter_Queue_Edit $block
     */
    public function validateAdminhtmlNewsletterQueueEdit($block) {
        if (!$this->canNewsletterQueue('edit')) {
            $block->unsetChild('reset_button');
            $block->unsetChild('save_button');
            $block->unsetChild('save_and_resume');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Promo_Catalog $block
     */
    public function validateAdminhtmlPromoCatalog($block) {
        if (!$this->canPromoCatalog('edit')) {
            $block->removeButton('apply_rules');
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Promo_Catalog_Edit $block
     */
    public function validateAdminhtmlPromoCatalogEdit($block) {
        if (!$this->canPromoCatalog('edit')) {
            $block->removeButton('save');
            $block->removeButton('save_apply');
            $block->removeButton('save_and_continue_edit');
            $block->removeButton('reset');
        }

        if (!$this->canPromoCatalog('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Promo_Catalog_Edit_Tab_Conditions $block
     */
    public function validateAdminhtmlPromoCatalogEditTabConditions($block) {
        if (!$this->canPromoCatalog('edit') || !$this->canPromoCatalog('delete')) {
            foreach ($block->getForm()->getElements() as $element) {
                $element->setReadonly(true);
            }
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Promo_Quote $block
     */
    public function validateAdminhtmlPromoQuote($block) {
        if (!$this->canPromoQuote('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Promo_Quote_Edit $block
     */
    public function validateAdminhtmlPromoQuoteEdit($block) {
        if (!$this->canPromoQuote('edit')) {
            $block->removeButton('save');
            $block->removeButton('save_and_continue_edit');
        }

        if (!$this->canPromoQuote('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Promo_Quote_Edit_Tab_Actions $block
     */
    public function validateAdminhtmlPromoQuoteEditTabActions($block) {
        if (!$this->canPromoQuote('edit') || !$this->canPromoQuote('delete')) {
            foreach ($block->getForm()->getElements() as $element) {
                $element->setReadonly(true);
            }
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Promo_Quote_Edit_Tab_Conditions $block
     */
    public function validateAdminhtmlPromoQuoteEditTabConditions($block) {
        if (!$this->canPromoQuote('edit') || !$this->canPromoQuote('delete')) {
            foreach ($block->getForm()->getElements() as $element) {
                $element->setReadonly(true);
            }
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Promo_Quote_Edit_Tab_Coupons_Grid $block
     */
    public function validateAdminhtmlPromoQuoteEditTabCouponsGrid($block) {
        if (!$this->canPromoQuote('delete')) {
            $block->getMassactionBlock()->removeItem('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Promo_Quote_Edit_Tab_Coupons_Form $block
     */
    public function validateAdminhtmlPromoQuoteEditTabCouponsForm($block) {
        if (!$this->canPromoQuote('edit')) {
            $block->setForm(new Varien_Data_Form());
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Cms_Block $block
     */
    public function validateAdminhtmlCmsBlock($block) {
        if (!$this->canCmsBlock('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Cms_Block_Edit $block
     */
    public function validateAdminhtmlCmsBlockEdit($block) {
        if (!$this->canCmsBlock('edit')) {
            $block->removeButton('save');
            $block->removeButton('saveandcontinue');
            $block->removeButton('reset');
        }

        if (!$this->canCmsBlock('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Mage_Widget_Block_Adminhtml_Widget_Instance $block
     */
    public function validateWidgetAdminhtmlWidgetInstance($block) {
        if (!$this->canCmsWidgetInstance('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Widget_Block_Adminhtml_Widget_Instance_Edit $block
     */
    public function validateWidgetAdminhtmlWidgetInstanceEdit($block) {
        if (!$this->canCmsWidgetInstance('edit')) {
            $block->removeButton('save');
            $block->removeButton('save_and_edit_button');
            $block->removeButton('reset');
        }

        if (!$this->canCmsWidgetInstance('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Checkout_Agreement $block
     */
    public function validateAdminhtmlCheckoutAgreement($block) {
        if (!$this->canSalesCheckoutagreement('edit')) {
            $block->removeButton('add');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Checkout_Agreement_Edit $block
     */
    public function validateAdminhtmlCheckoutAgreementEdit($block) {
        if (!$this->canSalesCheckoutagreement('edit')) {
            $block->removeButton('save');
            $block->removeButton('reset');
        }

        if (!$this->canSalesCheckoutagreement('delete')) {
            $block->removeButton('delete');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Backup $block
     */
    public function validateAdminhtmlBackup($block) {
        if (!$this->canSystemToolsBackup('edit')) {
            $block->unsetChild('createButton');
            $block->unsetChild('createSnapshotButton');
            $block->unsetChild('createMediaBackupButton');
        }
    }

    /**
     * @param Mage_Adminhtml_Block_Backup_Grid $block
     */
    public function validateAdminhtmlBackupGrid($block) {
        if(!$this->canSystemToolsBackup('delete')) {
            $block->getMassactionBlock()->removeItem('delete');
        }
    }

    /**
     * @param Mage_Compiler_Block_Process $block
     */
    public function validateCompilerProcess($block) {
        if (!$this->canSystemToolsCompiler('run')) {
            $block->unsetChild('run_button');
        }

        if (!$this->canSystemToolsCompiler('change_status')) {
            $block->unsetChild('change_status_button');
        }
    }
}