<?php
/*
 * workflow for Teledeploy 
 * 
 */

require_once('require/function_telediff_wk.php');
//TELEDIFF_WK
$activate=option_conf_activate('TELEDIFF_WK');
if ($activate){
	if(isset($protectedPost['MODIF']) and $protectedPost['MODIF'] != null){
		$protectedPost['onglet'] = 2;		
	}
	//print_r($protectedPost);
	$infos_status=list_status();
	if ($infos_status['NIV_BIS'] == ""){
		echo "<font color=RED><b>".$l->g(1089)."</b></font>";
	}else{
		 //define tab
		$data_on[1]=$l->g(1072);
		$data_on[2]=$l->g(1073);
	}
	
	if ($_SESSION['OCS']['CONFIGURATION']['TELEDIFF_WK'] == 'YES')
	$data_on[4]=$l->g(107);
	
	
	$form_name = "admins";
	echo "<form name='".$form_name."' id='".$form_name."' method='POST' action=''>";
	if (isset($data_on)){
		onglet($data_on,$form_name,"onglet",4);
		$table_name=$form_name;	
		
		echo '<div class="mlt_bordure" >';	
		if ($protectedPost['onglet'] == 2){			
			dde_form($form_name);
		}elseif ($protectedPost['onglet'] == 4){
			dde_conf($form_name);
		}elseif ($protectedPost['onglet'] == 1){
			dde_show($form_name);
		}
		echo '</div>';	
	}else
		echo "<font color=RED><b>En cours de configuration</b></font>";
	echo "</form>";
}else
	echo "<b><font color=red>" . $l->g(1075) . "<br>" . $l->g(1076) . "</font></b>";


?>