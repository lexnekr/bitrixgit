<?
global $MESS;
$PathInstall = str_replace("\\", "/", __FILE__);
$PathInstall = substr($PathInstall, 0, strlen($PathInstall)-strlen("/index.php"));
IncludeModuleLangFile($PathInstall."/index.php");
Class coffeediz_git extends CModule
{
	var $MODULE_ID = "coffeediz.git";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";
	function coffeediz_git()
	{
		$arModuleVersion = array();
		include(dirname(__FILE__)."/version.php");
		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		$this->MODULE_NAME = GetMessage("COFFEEDIZ_INSTALL_NAME_GIT");
		$this->MODULE_DESCRIPTION = GetMessage("COFFEEDIZ_INSTALL_DESCRIPTION_GIT");
		$this->PARTNER_NAME = GetMessage("SPER_PARTNER_GIT");
		$this->PARTNER_URI = GetMessage("PARTNER_URI_GIT");
	}
	function InstallDB($install_wizard = true)
	{
        RegisterModule("coffeediz.git");
		return true;
	}
	function UnInstallDB($arParams = Array())
	{
        UnRegisterModule("coffeediz.git");
		return true;
	}
	function InstallEvents()
	{
		return true;
	}
	function UnInstallEvents()
	{
		return true;
	}
	function InstallFiles()
	{
        CopyDirFiles(
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/components",
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/components/", true, true
        );
        CopyDirFiles(
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/admin/coffeediz_git.php",
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin/coffeediz_git.php", true, true
        );
		CopyDirFiles(
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/themes", 
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/themes", true, true
		);
		return true;
	}
	function InstallPublic()
	{
	}
	function UnInstallFiles()
	{
        DeleteDirFilesEx($_SERVER["DOCUMENT_ROOT"]."/bitrix/components/".$this->MODULE_ID."/");
        DeleteDirFilesEx($_SERVER["DOCUMENT_ROOT"]."/bitrix/admin/coffeediz_git.php");
		DeleteDirFilesEx($_SERVER["DOCUMENT_ROOT"].'/bitrix/themes/.default/icons/coffeediz.git/');
        DeleteDirFilesEx($_SERVER["DOCUMENT_ROOT"].'/bitrix/themes/.default/coffeediz.git.css');
		return true;
	}
	function DoInstall()
	{
        $this->InstallDB();
        $this->InstallFiles();
    }
	function DoUninstall()
	{
        $this->UnInstallDB();
        $this->UnInstallFiles();
    }
}
?>