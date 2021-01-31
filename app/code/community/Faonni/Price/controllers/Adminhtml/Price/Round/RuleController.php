<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
class Faonni_Price_Adminhtml_Price_Round_RuleController
    extends Mage_Adminhtml_Controller_Action
{
    /**
     * Initialize layout, breadcrumbs
     *
     * @return Faonni_Price_Adminhtml_Round_RuleController
     */
    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu('faonni_price/round_rule')->_addBreadcrumb(
            $this->__('Manage Rule'),
            $this->__('Manage Rule')
        );
        return $this;
    }

    /**
     * Index Action
     */
    public function indexAction()
    {
        $this->_title($this->__('Price'));
        $this->_title($this->__('Manager Rule'));

        $this->_initAction();
        $this->renderLayout();
    }

    /**
     * Edit Action
     */
    public function editAction()
    {
        $this->_title($this->__('Price'));
        $this->_title($this->__('Edit Rule'));

        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('faonni_price/round_rule')->load($id);

        if($model->getId()){
            Mage::register('current_faonni_price_round_rule', $model);
            $this->loadLayout();
            $this->_setActiveMenu('faonni_price/round_rule');

            $this->_addBreadcrumb(
                $this->__('Manage Rule'),
                $this->__('Manage Rule')
            );

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
            $this->_addContent(
                $this->getLayout()->createBlock('faonni_price/adminhtml_round_rule_edit')
            )->_addLeft($this->getLayout()->createBlock('faonni_price/adminhtml_round_rule_edit_tabs'));

            $this->renderLayout();
        }
        else{
            Mage::getSingleton('adminhtml/session')->addError(
                $this->__('Rule does not exist.')
            );
            $this->_redirect('*/*/');
        }
    }

    /**
     * New Action
     */
    public function newAction()
    {
        $this->_title($this->__('Price'));
        $this->_title($this->__('New Rule'));

        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('faonni_price/round_rule')->load($id);

        $data = Mage::getSingleton('adminhtml/session')->getCurrentFaonniPriceRoundRule(true);
        if(!empty($data)){
            $model->setData($data);
        }

        Mage::register('current_faonni_price_round_rule', $model);

        $this->loadLayout();
        $this->_setActiveMenu('faonni_price/round_rule');

        $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

        $this->_addBreadcrumb(
            $this->__('Manage Rule'),
            $this->__('Manage Rule')
        );

        $this->_addContent(
            $this->getLayout()->createBlock('faonni_price/adminhtml_round_rule_edit')
        )->_addLeft($this->getLayout()->createBlock('faonni_price/adminhtml_round_rule_edit_tabs'));

        $this->renderLayout();
    }

    /**
     * Save Action
     */
    public function saveAction()
    {
        $data = $this->getRequest()->getPost('round_rule');
        $id = $this->getRequest()->getParam('id');
        $tabId = $this->getRequest()->getParam('tab', null);
        if($data){
            try{
                $model = Mage::getModel('faonni_price/round_rule')->load($id)
                    ->addData($data)
                    ->setId($id)
                    ->save();

                Mage::getSingleton('adminhtml/session')->addSuccess(
                    $this->__('Rule was successfully saved')
                );
                Mage::getSingleton('adminhtml/session')->setCurrentFaonniPriceRoundRule(false);

                if($this->getRequest()->getParam('back')){
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), 'active_tab' => $tabId));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch(Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setCurrentFaonniPriceRoundRule($data);
                $this->_redirect('*/*/edit', array('id' => $id, 'active_tab' => $tabId));
                return;
            }
        }
        $this->_redirect('*/*/');
    }

    /**
     * Delete Action
     */
    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        if(0 < $id){
            try{
                $model = Mage::getModel('faonni_price/round_rule');
                $model->setId($id)->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess(
                    $this->__('Rule was successfully deleted')
                );
                $this->_redirect('*/*/');
            } catch(Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

    /**
     * massRemove Action
     */
    public function massRemoveAction()
    {
        try {
            $ids = $this->getRequest()->getPost('rule_ids', array());

            foreach($ids as $id){
                $model = Mage::getModel('faonni_price/round_rule');
                $model->setId($id)->delete();
            }

            Mage::getSingleton('adminhtml/session')->addSuccess(
                $this->__('Rule(s) was successfully removed')
            );
        } catch(Exception $e){
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
        $this->_redirect('*/*/');
    }

    /**
     * Export price round_rule grid to CSV format
     */
    public function exportCsvAction()
    {
        $fileName = 'price.round.rule.csv';
        $grid = $this->getLayout()->createBlock('faonni_price/adminhtml_round_rule_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    /**
     *  Export price round_rule grid to Excel XML format
     */
    public function exportExcelAction()
    {
        $fileName = 'price.round.rule.xml';
        $grid = $this->getLayout()->createBlock('faonni_price/adminhtml_round_rule_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
}
