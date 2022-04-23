<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>
<?$APPLICATION->IncludeComponent(
    'itrack.custom:documents24',
    '',
    [
        'SEF_FOLDER' => 'documents24',
        'SEF_MODE' => 'Y'
    ],
    false
);?>
<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');