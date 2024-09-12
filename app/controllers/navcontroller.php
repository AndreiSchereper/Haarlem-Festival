<?php
require __DIR__ . '/controller.php';

class NavController extends Controller {
    public function index() {
        require __DIR__ . '/../views/shareditems/nav/nav.php';
    }
}