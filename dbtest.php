<?php
//require_once ('test.php');
//Tobias
echo '<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
require_once ('konfiguration.php');
$db_link = mysqli_connect (
                     MYSQL_HOST, 
                     MYSQL_BENUTZER, 
                     MYSQL_KENNWORT, 
                     MYSQL_DATENBANK
                    );
 
$sql = "SELECT * FROM mdl_prak_einrichtungen";
 
$db_erg = mysqli_query( $db_link, $sql );
if ( ! $db_erg )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}
 
echo '<table border="1">';
echo '<tr bgcolor="#37e558"><th>Name</th><th>Anschrift</th><th>Bundesland</th><th>Kategorie</th><th>Detailansicht</th></tr>';
while ($zeile = mysqli_fetch_array( $db_erg, MYSQL_ASSOC))
{
  echo "<tr bgcolor=\"#c5f5d0\">";
  echo "<td>". $zeile['name'] ."</td>";
  echo "<td>". $zeile['adresse_plz'].",".$zeile['adresse_ort'].",".$zeile['adresse_strasse'] ."</td>";
  echo "<td>". $zeile['adresse_bundesland'] . "</td>";
  echo "<td>". $zeile['arbeitsfeldbeschreibung'] . "</td>";
  # echo "<td><a href='dateiansicht.php'>Detailansicht</a></td>";
   echo "<td><a href='dateiansicht.php?edit=true&id=".$zeile['id']."'>Detailansicht</a></td>";
  

   echo "</tr>";
}
echo "</table>";
 
mysqli_free_result( $db_erg );



/*$localhost ='localhost';
$benutzer ='root';
$passwort='';
$db='moodle23';
$kurse='Kurse anzeigen';
$db_link = mysqli_connect (
                     $localhost, 
                     $benutzer, 
                     $passwort, 
                    $db);
 echo $kurse;
$sql = 'SELECT * FROM mdl_newmodule';
 
$db_erg = mysqli_query( $db_link, $sql );
if ( ! $db_erg )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}
 
echo '<table border="1">';
echo '<tr><th>id</th><th>course</th><th>name</th><th>intro</th><th>introformat</th><th>timecreated</th><th>timemodified</th><th>&nbsp;</th></tr>';
while ($zeile = mysqli_fetch_array( $db_erg, MYSQL_ASSOC))
{
  echo '<tr>';
  echo "<td>". $zeile['id'] . "</td>";
  echo "<td>". $zeile['course'] . "</td>";
  echo "<td>". $zeile['name'] . "</td>";
   echo "<td>". $zeile['intro'] . "</td>";
  echo "<td>". $zeile['introformat'] . "</td>";
  echo "<td>". $zeile['timecreated'] . "</td>";
   echo "<td>". $zeile['timemodified'] . "</td>";
   echo "<td>Detailansicht1</td>";
  echo "</tr>";
}
echo "</table>";
 
mysqli_free_result( $db_erg );*/
?>
