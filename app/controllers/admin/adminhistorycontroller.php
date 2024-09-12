<?php
require_once '/app/controllers/controller.php';
require_once '/app/services/userService.php';
require_once '/app/services/pageService.php';
require_once '/app/models/user.php';
require_once '/app/models/page.php';

class AdminHistoryController extends Controller
{
    private $pageService;
    // initialize services
    function __construct()
    {
        parent::__construct();
        // we check if user is logged in and is admin.
        $userIsAdmin = FALSE;
        // check if user is logged in or not
        if (isset($_SESSION["loggedUser"])) {
            // we check to see if the logged in user 
            $user = unserialize(serialize($_SESSION["loggedUser"]));
            if ($user->isAdministrator() == TRUE) {
                $userIsAdmin = TRUE;
            }
        }
        // if user in not an admin, we redirect her to home page.
        if ($userIsAdmin == FALSE) {
            header("location: /home");
            exit();
        }
        $this->pageService = new PageService();
    }
    public function index()
    {
        $this->editHistoryPage();
    }
    public function editHistoryPage()
    {
        $page = $this->pageService->getPageByTitle("history-main");
        $model = new stdClass;
        $model->page = $page;
        $this->displayPageViewWithModel("admin/history/history-main", $model);
    }
    public function editSubmit()
    {
        // check to see that we are here from clicking update button
        if (isset($_POST["formSubmit"])) {
            // save to database
            $page = new Page();
            // comment: correct URI later.
            $page->setURI($_POST['pageTitle']);
            $page->setTitle($_POST['pageTitle']);
            $page->setBodyContentHTML($_POST["tinyMCEform"]);

            // updatePageById gets $pageId as its first input and $page as its second input and updates the page with the given $pageId in the database with $page.
            $this->pageService->updatePageById($_POST['pageID'], $page);

            echo "updated " . $_POST['pageTitle'];
        }
        exit();
    }
}


