<?php

	include("head.php");
	include("db.php");

?>
	
	<div class="text-center font-weight-bold text-uppercase" id="slovo" style="margin-top:25px; font-size:30px">
		<?php

			//Generování slova
			$sql = "SELECT count(id_s) FROM slova";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$max = $row["count(id_s)"];
			//echo $max;

			$rand = rand(1, $max);
			$sql = "SELECT slovo FROM slova WHERE id_s = '".$rand."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$slovo = $row["slovo"];
			//echo $slovo;

			$conn->close();

		?>
		
	</div>
	<br>
	<input type="text" class="form-control col-2" style="left:42%" onkeypress="NajdiPismeno()" id="input">
	<br>
	<!--<img id="chyba" style="height:500px; width:500px; margin-left:37%; border:1px solid black">-->
	<canvas id="canvas" width="500" height="500" style="border:1px solid black; margin-left:37%"></canvas>

	<script type="text/javascript">

		var slovo = "<?= $slovo ?>";
			//console.log(slovo);
			var split = slovo.split("");
			console.log(split);
			var mezera = [];


		RozdelSlovo();

		function RozdelSlovo(){
		
			var i;
			for(i = 0 ; i < split.length; i++){
				mezera[i] = "_ ";
			}
			document.getElementById("slovo").innerHTML = mezera;

		}


		var chyba = 0;
		var shoda = 0;


		function NajdiPismeno(){

			console.log(event.key);
			for(var i = 0; i < split.length; i++){
				if(event.key == split[i]){
					shoda +=1;
					console.log("shoda: "+shoda);
					mezera[i] = event.key;
					document.getElementById("slovo").innerHTML = mezera;
				}
			}
			if(shoda == 0){
				chyba +=1;
				VykresliObesence(chyba);
				console.log("chyba: "+chyba);
				//document.getElementById("chyba").src = "obesenec/"+chyba+".png";

				if(chyba == 11){
					window.alert("Konec hry");
					location.reload();
				}
			}
			shoda = 0;
		}

		function VykresliObesence(i){
			console.log("jsme v canvasu: "+i);
			var line = document.getElementById("canvas");
			var x = line.getContext("2d");

			switch(i){
				case 1:
					x.moveTo(100, 400);
					x.lineTo(400, 400);
					x.stroke();
					break;
				case 2:
					x.moveTo(100, 400);
					x.lineTo(100, 50);
					x.stroke();
					break;
				case 3:
					x.moveTo(100, 50);
					x.lineTo(250, 50);
					x.stroke();
					break;
				case 4:
					x.moveTo(250, 50);
					x.lineTo(250, 100);
					x.stroke();
					break;
				case 5:
					x.beginPath();
					x.arc(250,130,30,0,2*Math.PI);
					x.stroke();
					break;
				case 6:
					x.moveTo(250, 160);
					x.lineTo(250, 270);
					x.stroke();
					break;
				case 7:
					x.moveTo(250, 160);
					x.lineTo(220, 190);
					x.stroke();
					break;
				case 8:
					x.moveTo(250, 160);
					x.lineTo(280, 190);
					x.stroke();
					break;
				case 9:
					x.moveTo(250, 270);
					x.lineTo(270, 300);
					x.stroke();
					break;
				case 10:
					x.moveTo(250, 270);
					x.lineTo(230, 300);
					x.stroke();	
			}
			
		}



	</script>

<?php

	include("footer.php");

?>