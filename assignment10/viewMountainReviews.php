<?php
include 'top.php';
$yourURL = $domain . $phpSelf;
$mountainy = "Ward Hill";
if (isset($_POST["btnSubmit"]))
{
    if (!(securityCheck($path_parts, $yourURL, true))) {
        $msg = "<p>Sorry you cannot access this page. ";
        $msg.= "Security breach detected and reported</p>";
        die($msg);
    }
     $mountainy = filter_var($_POST[lstMountains]);
     $selQuery = "SELECT * FROM tblUserMountainReview WHERE fldMountainName ='".$mountainy."'";
     print"<p>".$selQuery."</p>";
     $results = $thisDatabaseReader->select($selQuery, "", 1, 0, 2, 0, false, false);
     $columns =6;
 $highlight = 0;
 print '<p>total reviews: '. count($results).'</p>';
 print '<table>';
 print'<tr>';
 print '<td> Mountain Name</td>'; 
  print '<td> User Email</td>'; 
   print '<td>Lift Wait in Minutes</td>'; 
    print '<td>Difficulty</td>'; 
     print '<td> Condition</td>'; 
      print '<td> Rating</td>'; 
      print '</tr>';
 foreach ($results as $rec) {

        
        print '<tr>';
        for ($i = 0; $i < $columns; $i++) {
            print '<td>' . $rec[$i] . '</td>';
        }
        print '</tr>';
    }
    print '</table>';

}
?>
     <h2>Select which monutains reviews you'd like to see</h2>
<form action= "<?php print $phpSelf; ?>"
      method ="post"
      id="frmMountainReview">
             
    <fieldset class ='Select Mountain'>
<?php
$query = "SELECT DISTINCT fldName ";
$query .= "FROM tblMountains ";
$query .= "ORDER BY  fldName";
$mountains = $thisDatabaseReader->select($query, "", 0, 1, 0, 0, false, false);

print '<label for="lstMountains">Select a mountain to review ';
print '<select id="lstMountains" ';
print '        name="lstMountains"';
print '        tabindex="10" >';


foreach ($mountains as $row) {

    print '<option ';
    if ($mountain == $row["fldMountain"])
        print " selected='selected' ";

    print 'value="' . $row["fldName"] . '">' . $row["fldName"];

    print '</option>';
}
?>
</fieldset>
        <fieldset class="buttons">
            <input type="submit" id="btnSubmit" name="btnSubmit" value="Review" tabindex="1000" class="button">

        </fieldset>

             </form>
}

