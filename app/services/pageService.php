<?php
require __DIR__ . '/../repositories/pageRepository.php';
require_once __DIR__ . '/../models/page.php';

class PageService
{
    public function getPageByTitle(string $pageTitle)
    {
        $repository = new PageRepository();
        return $repository->getPageByTitle($pageTitle);
    }

    public function updatePageById($pageID, $newPage): void 
    {
        $repository = new PageRepository();
        $repository->updatePageById($pageID, $newPage);
    }
}
