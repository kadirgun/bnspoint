<?php
	$username = $_GET['username'];
	$info = file_get_contents("http://eu-bns.ncsoft.com/ingame/bs/character/data/equipments?c=".urlencode($username));
	$profile = file_get_contents("http://eu-bns.ncsoft.com/ingame/bs/character/profile?c=".urlencode($username));

	$total = 0;
	$weapon = array();
	$necklace = array();
	$ring = array();
	$earring = array();
	$bracelet = array();
	$belt = array();
	$soul = array();
	$pet = array();
	$gem = array();

	if(strpos($profile, "HongmoonLevel") !== false){
		$level = explode("HongmoonLevel ", $profile)[1];
		$level = explode("<", $level)[0];
		$level = intval($level);
		$levelpoint = $level * 5;
	}else{
		$level = 0;
		$levelpoint = 0;
	}
	

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
		$weapon["name"] = "Unrated";
		$weapon["stage"] = 0;
		$weapon["point"] = 0;
	}

	if(strpos($info, "Oath Necklace") !== false){
		$necklace["name"] = "Oath";
		$necklace["stage"] = getStage("Oath",$info);
		$necklace["point"] = intval($necklace["stage"])*2;
	}else{
		$necklace["name"] = "Unrated";
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
		$ring["name"] = "Unrated";
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
	}else{
		$earring["name"] = "Unrated";
		$earring["stage"] = 0;
		$earring["point"] = 0;
	}

	if(strpos($info, "Divine Dragon Bracelet") !== false){
		$bracelet["name"] = "Divine Dragon";
		$bracelet["stage"] = getStage("Divine Dragon",$info);
		$bracelet["point"] = intval($bracelet["stage"])*4;
	}else if(strpos($info, "Tiger Bracelet") !== false){
		$bracelet["name"] = "Tiger";
		$bracelet["stage"] = getStage("Tiger",$info);
		$bracelet["point"] = intval($bracelet["stage"])*4;
	}else{
		$bracelet["name"] = "Unrated";
		$bracelet["stage"] = 0;
		$bracelet["point"] = 0;
	}

	if(strpos($info, "Eternity Belt") !== false){
		$belt["name"] = "Eternity";
		$belt["stage"] = getStage("Eternity",$info);
		$belt["point"] = intval($belt["stage"])*3;
	}else{
		$belt["name"] = "Unrated";
		$belt["stage"] = 0;
		$belt["point"] = 0;
	}

	if(strpos($info, ">Hongmoon Energy") !== false){
		$soul["name"] = "Hongmoon Energy";
		$soul["stage"] = getStage("Hongmoon Energy",$info);
		$soul["point"] = intval($soul["stage"])*5;
	}else if(strpos($info, ">Awakened Hongmoon Critical Energy") !== false){
		$soul["name"] = "Awakened Hongmoon Critical Energy";
		$soul["stage"] = 10;
		$soul["point"] = 15*5;
	}else if(strpos($info, ">Awakened Ascending Soul") !== false){
		$soul["name"] = "Awakened Ascending Soul";
		$soul["stage"] = 10;
		$soul["point"] = 15*5;
	}else if(strpos($info, ">True Hongmoon Energy") !== false){
		$soul["name"] = "True Hongmoon Energy";
		$soul["stage"] = 10;
		$soul["point"] = 20*5;
	}else if(strpos($info, ">True Ascending Soul") !== false){
		$soul["name"] = "True Ascending Soul";
		$soul["stage"] = 10;
		$soul["point"] = 20*5;
	}else if(strpos($info, ">Transcendent Soul") !== false){
		$soul["name"] = "Transcendent Soul";
		$soul["stage"] = getStage("Transcendent Soul",$info);
		$soul["point"] = (20+$soul["stage"])*5;
	}else if(strpos($info, ">Cosmic Soul") !== false){
		$soul["name"] = "Cosmic Soul";
		$soul["stage"] = getStage("Cosmic Soul",$info);
		$soul["point"] = (20+$soul["stage"])*5;
	}else if(strpos($info, ">Awakened Transcendent Soul") !== false){
		$soul["name"] = "Awakened Transcendent Soul";
		$soul["stage"] = getStage("Awakened Transcendent Soul",$info);
		$soul["point"] = (25+$soul["stage"])*5;
	}else if(strpos($info, ">Awakened Cosmic Soul") !== false){
		$soul["name"] = "Awakened Cosmic Soul";
		$soul["stage"] = getStage("Awakened Cosmic Soul",$info);
		$soul["point"] = (25+$soul["stage"])*5;
	}else{
		$soul["name"] = "Unrated Soul";
		$soul["stage"] = 0;
		$soul["point"] = 0;
	}

	if(strpos($info, ">Unleashed Pet Aura") !== false){
		$pet["name"] = "Unleashed Pet Aura";
		$pet["stage"] = 0;
		$pet["point"] = 20*3;
	}else if(strpos($info, ">Ultimate Pet Aura") !== false){
		$pet["name"] = "Ultimate Pet Aura";
		$pet["stage"] = 0;
		$pet["point"] = 11*3;
	}else if(strpos($info, ">Loyal Pet Aura") !== false){
		$pet["name"] = "Loyal Pet Aura";
		$pet["stage"] = 0;
		$pet["point"] = intval($pet["stage"])*3;
	}else if(strpos($info, ">Gusty Pet Aura") !== false){
		$pet["name"] = "Gusty Pet Aura";
		$pet["stage"] = 0;
		$pet["point"] = intval($pet["stage"])*3;
	}else if(strpos($info, ">Furious Pet Aura") !== false){
		$pet["name"] = "Furious Pet Aura";
		$pet["stage"] = 0;
		$pet["point"] = intval($pet["stage"])*3;
	}else if(strpos($info, ">Awakened Pet Aura") !== false){
		$pet["name"] = "Awakened Pet Aura";
		$pet["stage"] = getStage("Awakened Pet Aura",$info);
		$pet["point"] = intval($pet["stage"])*3;
	}else if(preg_match("/Awakened (\w+) Pet/", $info)){
		$pet["name"] = "Awakened X Pet";
		$pet["stage"] = getStage(" Pet ",$info);
		$pet["point"] = intval($pet["stage"])*3;
	}else{
		$pet["name"] = "Unrated Pet";
		$pet["stage"] = 0;
		$pet["point"] = 0;
	}

	if(strpos($info, "Pentagonal Obsidian") !== false){
		$gem["name"] = "Pentagonal Obsidian";
		$gem["stage"] = 0;
		$gem["point"] = 1*5;
	}else if(strpos($info, "Hexagonal Obsidian") !== false){
		$gem["name"] = "Hexagonal Obsidian";
		$gem["stage"] = 0;
		$gem["point"] = 2*5;
	}else if(strpos($info, "Hexagonal Obsidian") !== false){
		$gem["name"] = "Hexagonal Obsidian";
		$gem["stage"] = 0;
		$gem["point"] = 2*5;
	}else if(strpos($info, "Heptagonal Obsidian") !== false){
		$gem["name"] = "Heptagonal Obsidian";
		$gem["stage"] = 0;
		$gem["point"] = 3*5;
	}else{
		$gem["name"] = "Unrated Gem";
		$gem["stage"] = 0;
		$gem["point"] = 0;
	}

	$total = $weapon["point"] + $necklace["point"] + $ring["point"] + $earring["point"] + $bracelet["point"] + $belt["point"] + $soul["point"] + $pet["point"] + $gem["point"] + $levelpoint;
?>

<html>
	<head>
	<title>bnspoint</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
</head>
	<body>
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
   
  </div><!-- /.container-fluid -->
</nav>
	<div class="container">
		<div class="page-header"> <h1><?php echo $total ?>P <small> <?php echo $username ?> (HM<?php echo $level ?>=><?php echo $levelpoint; ?>P)</small></h1> </div>
		<div class="row">
			<div class="col-md-12">
			    <table class="table">
			    <tr>
			    	<th>Item</th>
			    	<th>Puan</th>
			    </tr>
			    <tr>
			    	<td><?php echo $weapon["name"] ?> Weapon - Stage <?php echo $weapon["stage"] ?></td>
			    	<th><?php echo $weapon["point"] ?></th>
			    </tr>
			    <tr>
			    	<td><?php echo $necklace["name"] ?> Necklace - Stage <?php echo $necklace["stage"] ?></td>
			    	<th><?php echo $necklace["point"] ?></th>
			    </tr>
			    <tr>
			    	<td><?php echo $ring["name"] ?> Ring - Stage <?php echo $ring["stage"] ?></td>
			    	<th><?php echo $ring["point"] ?></th>
			    </tr>
			    <tr>
			    	<td><?php echo $earring["name"] ?> Earring - Stage <?php echo $earring["stage"] ?></td>
			    	<th><?php echo $earring["point"] ?></th>
			    </tr>
			    <tr>
			    	<td><?php echo $bracelet["name"] ?> Bracelet - Stage <?php echo $bracelet["stage"] ?></td>
			    	<th><?php echo $bracelet["point"] ?></th>
			    </tr>
			    <tr>
			    	<td><?php echo $belt["name"] ?> Belt - Stage <?php echo $belt["stage"] ?></td>
			    	<th><?php echo $belt["point"] ?></th>
			    </tr>
			    <tr>
			    	<td><?php echo $soul["name"] ?> - Stage <?php echo $soul["stage"] ?></td>
			    	<th><?php echo $soul["point"] ?></th>
			    </tr>
			    <tr>
			    	<td><?php echo $pet["name"] ?> - Stage <?php echo $pet["stage"] ?></td>
			    	<th><?php echo $pet["point"] ?></th>
			    </tr>
			    <tr>
			    	<td><?php echo $gem["name"] ?></td>
			    	<th><?php echo $gem["point"] ?></th>
			    </tr>
			    </table>
			</div>
		</div>
	</div>	
	<script type="text/javascript" src="/assets/plugins/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/assets/js/main.js"></script>
</body>
</html>