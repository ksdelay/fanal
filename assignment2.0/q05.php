<?php

include "top.php";

// Begin output
print '<article>';
print '<h2>Query 5 SELECT fldFirstName, fldLastName FROM tblTeachers WHERE pmkNetId like "r%" and pmkNetId like "%o"</h2>';
print '<table>';

 $query = 'SELECT fldFirstName, fldLastName FROM tblTeachers WHERE pmkNetId like "r%" and pmkNetId like "%o"';
$info = $thisDatabaseReader->select($query, "", 1, 1, 4, 0, false, false);
//$info2 = $thisDatabaseReader->testQuery($query, "", 1, 2, 4, 0, false, false);
//print $info2;
 $columns =2;
 $highlight = 0;
 print '<p>total records: '. count($info).'</p>';
 
 foreach ($info as $rec) {

        
        print '<tr>';
        for ($i = 0; $i < $columns; $i++) {
            print '<td>' . $rec[$i] . '</td>';
        }
        print '</tr>';
    }

// print $thisDatabaseReader->testQuery($query, "", 0, 0, 0, 0, false, false);
print '</article>';
include "footer.php";
?>