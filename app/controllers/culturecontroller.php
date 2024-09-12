<?php
require __DIR__ . '/controller.php';

class CultureController extends Controller {
    public function index() {
        require __DIR__ . '/../views/culture/culture.php';
    }
}