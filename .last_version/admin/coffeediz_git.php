<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
//CJSCore::Init(array("jquery"));
///bitrix/css/main/bootstrap.css
$APPLICATION->SetAdditionalCss("/bitrix/css/main/bootstrap.css");
$APPLICATION->SetTitle(GetMessage("GIT_TITLE"));
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");


$aTabs = array(
    array(
        "DIV" => "repo1",
        "TAB" => "Репо 1",
        "ICON" => "main_user_edit",
        "TITLE" => "",
    ),
    array(
        "DIV" => "settings",
        "TAB" => "Список репозиториев",
        "ICON" => "main_user_edit",
        "TITLE" => "",
    ),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);
$tabControl->Begin();
?>


    <?
    /**
     * Добавить новые редиректы
     */
    $tabControl->BeginNextTab();
    ?>

<h1>111111111111<h1>




<?
/**
 * Список репозиториев
 */
$tabControl->BeginNextTab();
?>
<h2><?=GetMessage("LIST_OF_GIT_REPOS");?><h2>
<form method="POST" action="/bitrix/admin/coffeediz_git.php" name="RULES" id="RULES">
<table class="table table-responsive">
	<thead>
		<tr>
			<th>Name</th>
			<th>src</th>
		</tr>
	</thead>
	<tbody>
		<tr class="border_havechecked">
			<th scope="row">
				<input name="repo_name0" type="text" value="Core" class="form-control">
			</th>
			<th scope="row">
				<input name="repo_src0" type="text" value="/u00/app/bitrix/Apache/htdocs/bitrix/" class="form-control">
			</th>
		</tr>
		<tr class="border_havechecked">
			<th scope="row">
				<input name="repo_name1" type="text" value="Репо 1" class="form-control">
			</th>
			<th scope="row">
				<input name="repo_src1" type="text" value="/u00/app/bitrix/Apache/htdocs/site/" class="form-control">
			</th>
		</tr>
		<tr class="border_havechecked">
			<th scope="row">
				<input name="repo_name2" type="text" value="" class="form-control">
			</th>
			<th scope="row">
				<input name="repo_src2" type="text" value="" class="form-control">
			</th>
		</tr>
	<tbody>
</table>
<input type="submit" name="save" value="Сохранить" title="Сохранить" class="adm-btn-save">

</form>


<?

//COption::SetOptionString("coffeediz.git", "repo_name1", "Репозиторий1");

$value = COption::GetOptionString("coffeediz.git", "repo_name1", "-1");
echo $value;



?>



<?if(!empty($_POST['save'])){

	$List = array_chunk($_POST, 2, true);

	$j = 0;
	for ($i = 0; $i < (count($_POST)-1)/2; $i++) {
		echo 'i:'.$i.'- j:'.$j;;
		echo "<pre>";
		print_r($List[$i]);
		echo "</pre>";

		if (!empty($List[$i]['repo_name'.$i]) && !empty($List[$i]['repo_src'.$i]) ) {
			COption::SetOptionString("coffeediz.git", 'repo_name'.$j, $List[$i]['repo_name'.$i]);
			COption::SetOptionString("coffeediz.git", 'repo_src'.$j, $List[$i]['repo_src'.$i]);
			$j++;
		}
	}

	while (true) {
		if (COption::GetOptionString("coffeediz.git", "repo_name".$j, "-1") != -1) {
			COption::RemoveOption("coffeediz.git", "repo_name".$j);
			COption::RemoveOption("coffeediz.git", "repo_src".$j);
		}
		else {
			break;
		}
		$j++;
	}

}?>








    <?
    /**
     * Кнопки
     */
    $tabControl->Buttons();
    ?>

    <?$tabControl->End();?>
