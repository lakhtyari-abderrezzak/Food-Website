<?php 

use Middleware\AuthMiddleware;

require_once './bootstrap.php';

require './middleware/AuthMiddleware.php';

$auth = new AuthMiddleware();

$auth->handle();

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'id';
$sort_dir = strtolower($_GET['sort_dir'] ?? 'asc') === 'desc' ? 'desc' : 'asc';
$next_sort_dir = $sort_dir === 'asc' ? 'desc' : 'asc';

$sql = "SELECT * FROM categories WHERE categories.title LIKE '%$search%' ORDER BY $sort_by $sort_dir";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories =  $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once './admin/views/categories/index.view.php';