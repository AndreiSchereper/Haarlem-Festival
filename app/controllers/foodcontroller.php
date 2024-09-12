<?php
require __DIR__ . '/controller.php';

class FoodController extends Controller {
    public function index() {
        require __DIR__ . '/../views/food/food.php';
    }
}
