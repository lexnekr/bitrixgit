<?

if(!method_exists($USER, "CanDoOperation"))
    return false;

IncludeModuleLangFile(__FILE__);

$aMenu = array();


$aMenu[] =     array(
		"parent_menu" => "global_menu_settings",
	//"sort" => 9,
        "url" => "coffeediz_git.php",
		"text" => GetMessage("MAIN_MENU_GIT"),
        "title" => GetMessage("MAIN_MENU_GIT"),
        "icon" => "coffeediz_git_menu_icon",
        "page_icon" => "form_page_icon",
        "module_id" => "coffeediz.git",
        "items_id" => "coffeediz.git",
        "items" => array(),
);

return $aMenu;


?>