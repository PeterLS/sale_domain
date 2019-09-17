Страница для продающихся доменов.

Загрузка с помощью composer:
"require": {
  "peterls/sale_domain": "dev-master#v1.0.1"
},
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/PeterLS/sale_domain"
  }
]

Пример использования (файл index.php):

<?php
require_once __DIR__ . '/vendor/autoload.php';
use PeterLS\SaleDomain\SaleDomain;
echo (string)new SaleDomain();
?>