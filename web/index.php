<?php
	$username = $_GET['username'];
	$info = file_get_contents("http://eu-bns.ncsoft.com/ingame/bs/character/data/equipments?c=".urlencode($username));
	$weapon = array();
	$necklace = array();
	$ring = array();
	$earring = array();
	$bracelet = array();
	$belt = array();

	function getStage($name,$info){
		$stage = explode($name, $info)[1];
		$stage = explode("Stage ",$stage)[1];
		$stage = explode('"',$stage)[0];
		return $stage;
	}

	if(strpos($info, "Baleful") !== false){
		$weapon["name"] = "Baleful";
		$weapon["stage"] = getStage("Baleful",$info);
		$weapon["point"] = intval($weapon["stage"]);
	}else if(strpos($info, "Seraph") !== false){
		$weapon["name"] = "Seraph";
		$weapon["stage"] = getStage("Seraph",$info);
		$weapon["point"] = intval($weapon["stage"]);
	}else if (strpos($info, "Raven") !== false) {
		$weapon["name"] = "Raven";
		$weapon["stage"] = getStage("Raven",$info);
		$weapon["point"] = intval($weapon["stage"])*3;
		$weapon["point"] += 12;
	}else if (strpos($info, "Dawnforged") !== false) {
		$weapon["name"] = "Dawnforged";
		$weapon["stage"] = getStage("Dawnforged",$info);
		$weapon["point"] = intval($weapon["stage"])*2;
		$weapon["point"] += 12;
	}else if (strpos($info, "Riftwalk") !== false) {
		$weapon["name"] = "Riftwalk";
		$weapon["stage"] = getStage("Riftwalk",$info);
		$weapon["point"] = intval($weapon["stage"])*2;
		$weapon["point"] += 12;
	}else{
		$weapon["name"] = "Unknown";
		$weapon["stage"] = 0;
		$weapon["point"] = 0;
	}

	if(strpos($info, "Oath Necklace") !== false){
		$necklace["name"] = "Oath";
		$necklace["stage"] = getStage("Oath",$info);
		$necklace["point"] = intval($necklace["stage"])*2;
	}else{
		$necklace["name"] = "Unknown";
		$necklace["stage"] = 0;
		$necklace["point"] = 0;
	}

	if(strpos($info, "Destiny Ring") !== false){
		$ring["name"] = "Destiny";
		$ring["stage"] = getStage("Destiny",$info);
		$ring["point"] = intval($ring["stage"]);
	}else if(strpos($info, "Ignitor Ring") !== false){
		$ring["name"] = "Ignitor";
		$ring["stage"] = getStage("Ignitor",$info);
		$ring["point"] = intval($ring["stage"])*4;
	}else if(strpos($info, "Lodestar Ring") !== false){
		$ring["name"] = "Lodestar";
		$ring["stage"] = getStage("Lodestar",$info);
		$ring["point"] = intval($ring["stage"])*4;
	}else if(strpos($info, "Dragonstorm Ring") !== false){
		$ring["name"] = "Dragonstorm";
		$ring["stage"] = getStage("Dragonstorm",$info);
		$ring["point"] = intval($ring["stage"])*4;
	}else if(strpos($info, "Frostfall Ring") !== false){
		$ring["name"] = "Frostfall";
		$ring["stage"] = getStage("Frostfall",$info);
		$ring["point"] = intval($ring["stage"])*4;
	}else if(strpos($info, "Tremor Ring") !== false){
		$ring["name"] = "Tremor";
		$ring["stage"] = getStage("Tremor",$info);
		$ring["point"] = intval($ring["stage"])*4;
	}else if(strpos($info, "Penumbra Ring") !== false){
		$ring["name"] = "Penumbra";
		$ring["stage"] = getStage("Penumbra",$info);
		$ring["point"] = intval($ring["stage"])*4;
	}else{
		$ring["name"] = "Unknown";
		$ring["stage"] = 0;
		$ring["point"] = 0;
	}

	if(strpos($info, "Seismic Earring") !== false){
		$earring["name"] = "Seismic";
		$earring["stage"] = getStage("Seismic",$info);
		$earring["point"] = intval($earring["stage"])*4;
	}else if(strpos($info, "Permafrost Earring") !== false){
		$earring["name"] = "Permafrost";
		$earring["stage"] = getStage("Permafrost",$info);
		$earring["point"] = intval($earring["stage"])*4;
	}else if(strpos($info, "Phantasm Earring") !== false){
		$earring["name"] = "Phantasm";
		$earring["stage"] = getStage("Phantasm",$info);
		$earring["point"] = intval($earring["stage"])*4;
	}else if(strpos($info, "Dragonsong Earring") !== false){
		$earring["name"] = "Dragonsong";
		$earring["stage"] = getStage("Dragonsong",$info);
		$earring["point"] = intval($earring["stage"])*4;
	}else if(strpos($info, "Supernova Earring") !== false){
		$earring["name"] = "Supernova";
		$earring["stage"] = getStage("Supernova",$info);
		$earring["point"] = intval($earring["stage"])*4;
	}else if(strpos($info, "Igneous Earring") !== false){
		$earring["name"] = "Igneous";
		$earring["stage"] = getStage("Igneous",$info);
		$earring["point"] = intval($earring["stage"])*4;
	}

	if(strpos($info, "Divine Dragon Bracelet") !== false){
		$bracelet["name"] = "Divine Dragon";
		$bracelet["stage"] = getStage("Divine Dragon",$info);
		$bracelet["point"] = intval($bracelet["stage"])*4;
	}else if(strpos($info, "Tiger Bracelet") !== false){
		$bracelet["name"] = "Tiger";
		$bracelet["stage"] = getStage("Tiger",$info);
		$bracelet["point"] = intval($bracelet["stage"])*4;
	}

	if(strpos($info, "Eternity Belt") !== false){
		$belt["name"] = "Eternity";
		$belt["stage"] = getStage("Eternity",$info);
		$belt["point"] = intval($belt["stage"])*3;
	}

	print_r($belt);
?>
