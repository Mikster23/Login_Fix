<?php
  session_start();

  if(isset($_POST['gennew'])){

		$afilename=$_POST['dtext_filename'];

  //$dumdum = "";
  //$file = "Record_".rand(0000,9999);
  // use double tics so that $file is inserted.
  // like this: "/messages/$file.txt"
  // alternatively, we could use: '/messages/' . $file . '.txt'
  // (for those who are married to single tics)
  $ret = file_put_contents("C:/xampp/htdocs/Login_RegFinal/records/$afilename.csv", "", FILE_APPEND | LOCK_EX);
  if($ret === false) {
      die('There was an error writing this file');
  }
  else {
    $headingArray=array();
    $charray = $_SESSION['tHeader'];
    $dataArray=array();
    $dataArray=$_SESSION["tableData"];
    $column=array();
    $column=$_SESSION["columnn"];
    $data=array();

    for ($row = 0; $row < sizeof($dataArray); $row++){
      $barbie = explode("`^", $dataArray[$row]);
      for ($col = 0; $col < sizeof($column); $col++) {
        $data[$row][$col]=$barbie[$col];
        echo $data[$row][$col];
      }
    }
  // open the file "demosaved.csv" for writing
  $file = fopen("C:/xampp/htdocs/Login_RegFinal/records/$afilename.csv", 'w');

  // save the column headers
  fputcsv($file, $charray);

  // Sample data. This can be fetched from mysql too
  /*$data = array(
    array('Data 11', 'Data 12', 'Data 13', 'Data 14', 'Data 15'),
    array('Data 21', 'Data 22', 'Data 23', 'Data 24', 'Data 25'),
    array('Data 31', 'Data 32', 'Data 33', 'Data 34', 'Data 35'),
    array('Data 41', 'Data 42', 'Data 43', 'Data 44', 'Data 45'),
    array('Data 51', 'Data 52', 'Data 53', 'Data 54', 'Data 55')
  );*/

  // save each row of the data
  foreach ($data as $row)
  {
    //echo $row;
    fputcsv($file, $row);
  }

  // Close the file
  fclose($file);
      //echo "$ret bytes written to file";
  }
}
?>
