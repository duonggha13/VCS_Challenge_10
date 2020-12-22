<!DOCTYPE html>
<html>
<body>
	<form action="upload.php" method="post" enctype="multipart/form-data">
  		Select file xml:
  		<input type="file" id="fileToUpload" name="fileToUpload">
  		<input type="submit" value="Upload File" name="submit">
	</form>
	<table style='padding: 50px 450px'>
        <tr>
            <th style="padding: 10px">Ten</th>
            <th style="padding: 10px">Nam Sinh</th>
            <th style="padding: 10px">Truong</th>
        </tr>
        <?php
        libxml_disable_entity_loader(true);
        $xmlDoc = new DOMDocument();
        $log_directory = 'uploads';
        foreach(glob($log_directory.'/*.xml*') as $file) {
    		$xmlDoc->load($file, LIBXML_NOENT | LIBXML_DTDLOAD);
        	$xmlList = simplexml_import_dom($xmlDoc);
        	foreach ($xmlList->student as $student) {
            	echo "<tr><td style='padding: 10px'>{$student->name}</td><td style='padding: 10px'>{$student->age}</td><td style='padding: 10px'>{$student->school}</td></tr>";
        	}
		}
		?>
        
    </table>
</body>
</html>