<?php
require_once('mvc/model/brands.php');

require_once('mvc/controllers/auth.php');

$brands = getBrands();

require('mvc/view/cms/brands/brands.php');

?>