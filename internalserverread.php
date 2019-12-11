<?php

function exit_on_invalid_file_name($filename)
{
	if(!$filename)
	{
		print("Bad Param: name cannot be empty.\n");
		exit;		
	}
	if( strpos($filename,'..') !== false )
	{
		print("Bad Param: name cannot contain .. characters.\n");
		exit;
	}
	if( strpos($filename,'/') !== false || strpos($filename,'\\') !== false )
	{
		print("Bad Param: name cannot contain / or \\ characters.\n");
		exit;
	}	
	if( strlen($filename) > 256 )
	{
		print("Bad Param: name cannot contain more than 256 characters.\n");
		exit;   			
	}
}

switch($_POST['API'])
{
	case 1: getCompanies();
			break;
	case 2: getDepartments($_POST['company']);
			break;
	case 3: getCourses($_POST['company'],$_POST['department']);
			break;
	case 4: getXMLs($_POST['company'],$_POST['department'],$_POST['course']);
			break;
	case 5: downloadXML($_POST['company'],$_POST['department'],$_POST['course'],$_POST['xmlname']);
			break;
	default:break;
}
function getCompanies()
{
	$dir = @opendir("CaptivateResults");
	if($dir != "")
	{
		while(($file = readdir($dir)) !== false)
		{
			if(!is_file($file))
			echo $file.";";
		}
		closedir($dir);
	}
	else
	echo "No Captivate Results found;";
}
function getDepartments($comp)
{
	exit_on_invalid_file_name($comp);
	$dir = @opendir("CaptivateResults"."/".$comp);
	while (($file = readdir($dir)) !== false)
	{
		if(!is_file($file))
		echo $file.";";
	}
	closedir($dir);
}
function getCourses($comp,$dept)
{
	exit_on_invalid_file_name($comp);
	exit_on_invalid_file_name($dept);
	$dir = @opendir("CaptivateResults"."/".$comp."/".$dept);
	while (($file = readdir($dir)) !== false)
	{
		if(!is_file($file))
		echo $file.";";
	}
	closedir($dir);
}
function getXMLs($comp,$dept,$course)
{
	exit_on_invalid_file_name($comp);
	exit_on_invalid_file_name($dept);
	exit_on_invalid_file_name($course);	
	$dir = @opendir("CaptivateResults"."/".$comp."/".$dept."/".$course);
	$directory = "CaptivateResults"."/".$comp."/".$dept."/".$course;
	while (($file = readdir($dir)) !== false)
	{
		if(!(is_dir($file)) && findexts($file) == 'xml')
		{
			echo $file.",".number_format(filectime($directory."/".$file),0, '.', '').";";
		}
	}
	closedir($dir);
}
function downloadXML($comp,$dept,$course,$name)
{
	exit_on_invalid_file_name($comp);
	exit_on_invalid_file_name($dept);
	exit_on_invalid_file_name($course);	
	exit_on_invalid_file_name($name);		
	$dir = "CaptivateResults"."/".$comp."/".$dept."/".$course."/".$name;
	$handle = fopen($dir, "r");
	$contents = fread($handle, filesize($dir));
	fclose($handle);
	echo $contents;
}
function findexts ($filename)
{
	$filename = strtolower($filename) ;
	$exts = explode(".", $filename);
	$n = count($exts)-1;
	$exts = $exts[$n];
	return $exts;
} 
?>

