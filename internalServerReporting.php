<?php # InternalServerReporting.php
# Copyright 2000-2008 Adobe Systems Incorporated. All rights reserved.
#

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

   print "<pre>\n";

#
   foreach ($_POST as $k => $v) 
   {
  	  if($k == "CompanyName")
	  {
	    $CompanyName = $v;
      }
      if($k == "DepartmentName")
	  {
	    $DepartmentName = $v;
      }
      if($k == "CourseName")
	  {
	    $CourseName = $v;
      }
      if($k == "Filename")
      {
      	$Filename = str_replace(array(','), '_' , $v);
      }
      if($k == "Filedata")
      {
      	if(get_magic_quotes_gpc())
		$Filedata = stripslashes($v);
		else
		$Filedata = $v;
      }
   }

   foreach (["CompanyName", "DepartmentName", "CourseName", "Filename"] as $key) 
   {
   		exit_on_invalid_file_name($$key);
   }

 	if(!isset($Filedata) || !$Filedata)
	{
		print("Bad Param: Filedata.\n");
		exit;
	}

	$fileDataXMLElement = simplexml_load_string($Filedata);
   if( !$fileDataXMLElement )
   {
		print("Invalid Filedata. Only valid xml is allowed.\n");
		exit;   	
   }
   $path_parts = pathinfo($Filename);
   if( $path_parts['extension'] != 'xml' )
   {
		print("Invalid file extension. Only .xml is allowed.\n");
		exit;   	
   }

   $FiledataLength = strlen($Filedata);
   if( $FiledataLength > 50*1024*1024 )
   {
		print("Filedata size limit exceeded. Allowed is < 50 Mega bytes\n");
		exit;   		
   }

	$ResultFolder = "./"."CaptivateResults";
	mkdir($ResultFolder);
	$CompanyFolder = $ResultFolder."//".$CompanyName;
	mkdir($CompanyFolder);
	$DepartmentFolder = $CompanyFolder."//".$DepartmentName;
	mkdir($DepartmentFolder);
	$CourseFolder = $DepartmentFolder."//".$CourseName;
	mkdir($CourseFolder);
	$FilePath = $CourseFolder."//".$Filename;
	$Handle = fopen($FilePath, 'w');
	fwrite($Handle, $Filedata);
	fclose($Handle);


   print "</pre>\n";
?>
