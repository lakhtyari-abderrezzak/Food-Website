<?php
require './config.php';

$foods = all('food', $conn);

require './views/food/index.view.php';
