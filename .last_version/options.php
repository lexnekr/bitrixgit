<?
$module_id = 'coffeediz.git';

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$module_id.'/include.php');
IncludeModuleLangFile($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$module_id.'/options.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$module_id.'/CModuleOptions.php');

$showRightsTab = true;
//$arSel = array('REFERENCE_ID' => array(1, 3, 5, 7), 'REFERENCE' => array('Значение 1', 'Значение 2', 'Значение 3', 'Значение 4'));

$arTabs = array(
	/*array(
        'DIV' => 'edit1',
        'TAB' => GetMessage("TAB_1_NAME"),
        'ICON' => '',
        'TITLE' => GetMessage("TAB_1_NAME")
)*/
);

$arGroups = array(
//'MAIN' => array('TITLE' => GetMessage("TAB_1_NAME"), 'TAB' => 0)
);

$arOptions = array(/*
    'LICENSE' => array(
        'GROUP' => 'MAIN',
        'TITLE' => GetMessage("MAIN_LICENSE"),
        'TYPE' => 'STRING',
        'DEFAULT' => 'FREE',
        'SORT' => '0',
        'NOTES' => GetMessage("MAIN_LICENSE_TEXT").'<br/><a href="http://xn--80ahcjeib4ac4d.xn--p1ai/solutions/php/startup/?LICENSE='.md5("BITRIX".LICENSE_KEY."LICENCE").'">'.GetMessage("MAIN_LICENSE_BUY").'</a>'
)*/
);

/*
Конструктор класса CModuleOptions
$module_id - ID модуля
$arTabs - массив вкладок с параметрами
$arGroups - массив групп параметров
$arOptions - собственно сам массив, содержащий параметры
$showRightsTab - определяет надо ли показывать вкладку с настройками прав доступа к модулю ( true / false )
*/

$opt = new CModuleOptions($module_id, $arTabs, $arGroups, $arOptions, $showRightsTab);
$opt->ShowHTML();

?>