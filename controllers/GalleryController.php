<?php

class ManipleGallery_GalleryController extends Maniple_Controller_Action
{
    public function galleryImagesAction()
    {
        $this->requireAuthentication();

        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout->disableLayout();

        /** @var ManipleDrive_DriveManager $driveManager */
        $driveManager = $this->getResource('drive.manager');
        $dir = $driveManager->getDir((int) $this->getScalarParam('dir_id'));

        $result = array();

        if ($dir) {
            $where = array('dir_id = ?' => (int) $dir->dir_id);
            $order = array('weight', 'name_normalized');

            $limit = (int) $this->getScalarParam('limit');
            if ($limit <= 0 || 50 < $limit) {
                $limit = 50;
            }
            $offset = max(0, (int) $this->getScalarParam('offset'));

            $table = $this->getResource('db')->getTableFactory()->getTable('ManipleDrive_Model_DbTable_Files');
            $files = $table->fetchAll($where, $order, $limit, $offset);

            $fileFields = array_flip(explode(' ',
                'file_id mimetype filter name title author description'
            ));

            foreach ($files as $file) {
                $result[] = array_intersect_key($file->toArray(), $fileFields);
            }
        }

        $this->_helper->json($result);
    }
}