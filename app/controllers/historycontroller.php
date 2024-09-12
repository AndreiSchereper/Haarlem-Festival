<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageService.php';

class HistoryController extends Controller
{
    private $pageService;

    // initialize services
    function __construct()
    {
        parent::__construct();
        $this->pageService = new PageService();
    }


    public function index()
    {
        // get page from db with title "history-main"
        // if there is no page with this title, it returns null.
        $page = $this->pageService->getPageByTitle("history-main");
        // we create model as a stdClass so that we can put different things in it.
        $model = new stdClass;
        // model->title is the value used for Title of the page.
        $model->title =  "Haarlem - History";
        
        if($page != null) {
            // model->body is the html value that is shown between nav bar and footer of the page.
            $model->body = $page->getBodyContentHTML();
        }
        // if the title is not found in the database, we show the following error.
        else {
            $model->body = "<p> This is history </p>";
        }
        
        $this->displayPageViewWithModel("history/history", $model);
    }
}


