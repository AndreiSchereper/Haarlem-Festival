<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/page.php';

class PageRepository extends Repository
{
    // createPageInstance gets result from database and creates a page instance from it.
    private function createPageInstance($dbRow): Page|null
    {
        try {
            $page = new Page();
            $page->setId($dbRow['id']);
            $page->setURI($dbRow['URI']);
            $page->setTitle($dbRow['title']);
            $page->setBodyContentHTML($dbRow['bodyContentHTML']);
            return $page;
        } catch (Exception $e) {
            echo "Error while creating user instance: " . $e->getMessage();
            return null;
        }
    }

    public function getPageByTitle(string $pageTitle)
    {
        try {
            // we make a query to database, to find the page with the given title.
            $stmt = $this->connection->prepare("SELECT * FROM page WHERE title = :title");
            // to increase security, we use bindParam.
            // more specifically, to prevent sql injection attack.
            $stmt->bindParam(':title', $pageTitle);
            // then execute the query.
            $stmt->execute();
            // if the number of records found with the given title is zero, then that title does not exist in the database.
            if ($stmt->rowCount() == 0) {
                return null;
            }
            // fetch gets the first row.
            $result = $stmt->fetch();
            // createPageInstance creates a page class in php from what is read from database
            return $this->createPageInstance($result);
        } catch (PDOException | Exception $e) {
            echo $e;
        }
    }

    public function updatePageById($pageID, $newPage)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE page SET title = :title, URI = :URI, bodyContentHTML = :bodyContentHTML WHERE id = :id;");
            // we use bindValue to increase security and prevent SQL injection.
            $stmt->bindValue(':URI', $newPage->getURI());
            $stmt->bindValue(':title', $newPage->getTitle());
            $stmt->bindValue(':bodyContentHTML', $newPage->getBodyContentHTML());
            $stmt->bindValue(':id', $pageID);

            $stmt->execute();
        } catch (PDOException | Exception $e) {
            echo $e;
        }
    }

}

