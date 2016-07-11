<?php

class ManipleGallery_Bootstrap extends Maniple_Application_Module_Bootstrap
{
    protected function _initView()
    {
        $bootstrap = $this->getApplication();
        $bootstrap->bootstrap('View');

        /** @var Zend_View $view */
        $view = $bootstrap->getResource('View');
        $view->addHelperPath(dirname(__FILE__) . '/library/ManipleGallery/View/Helper/', 'ManipleGallery_View_Helper_');
        $view->addScriptPath(dirname(__FILE__) . '/views');

        /** @var Zefram_Controller_Action_Helper_ViewRenderer $viewRenderer */
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $viewRenderer->setViewScriptPathSpec(':module/:controller/:action.:suffix', 'maniple-gallery');
    }
}
