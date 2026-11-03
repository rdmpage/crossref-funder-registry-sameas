<?php

$state = 0;

$filename = "registry.rdf";

$file_handle = fopen($filename, "r");
while (!feof($file_handle) && $state != 2) 
{
	$line = trim(fgets($file_handle));
	
	if ($state === 0)
	{
		if (preg_match('/skos:hasTopConcept\s+rdf:resource="http:\/\/dx.doi.org/', $line))
		{
			$state = 1;
		}
	}
	
	if ($state == 1)
	{
		if (preg_match('/http:\/\/dx.doi.org\/([^"]+)"/', $line, $m))
		{
			//echo $m[1] . "\n";
			
			echo '<http://dx.doi.org/' . $m[1] . '> <https://schema.org/sameAs> <https://doi.org/' . $m[1] . '> .' . "\n";
		}
		else
		{
			$state = 2;
		}
	
	}
	
}

?>	
