<form action='pdfkeszites.php' method='POST'>
	<?
	session_start();
	$ev = date("Y");
	$honap = date("m");
	$honapszam = date("t", 9) -1 ;
	$i = 1;
	$kezdonapokszamlalo = 0;
	//echo $honapszam;
	echo"Kérem válasszon egy kezdő napot!(a hét első napja)";
	while( $i <= $honapszam)
	{
		if(date('D',mktime(0, 0, 0, $honap, $i)) == "Mon")
		{
			$kezdonapok[$kezdonapokszamlalo] = $i;
			$kezdonapokszamlalo = $kezdonapokszamlalo +1;
		}
		$i = $i +1;
	}
	echo "<br>";
	//echo $kezdonapok[0];
	?>
	<select name='valaszto'>
		<?
		$asd = 0;
			while($asd <= $kezdonapokszamlalo)
			{
				echo" <option value='". $kezdonapok[$asd] . "'>". $kezdonapok[$asd] ."</option>";
				$asd++;
			}
		?>
	</select>
	<input type='submit' value='mutatás'>
</form> 