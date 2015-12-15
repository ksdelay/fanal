<?php

include "top.php";

// Begin output
print '<article>';
print '<h2>Query 4 SELECT * FROM tblSections WHERE  fldCRN = "95470"</h2>';
print '<table>';
$tableName = tblCourses;
 $query = 'SELECT * FROM tblSections WHERE  fldCRN = "95470"';
 $info = $thisDatabaseReader->select($query, "", 1, 0, 2, 0, false, false);
//  $info2 = $thisDatabaseReader->testQuery($query, "", 1, 0, 2, 0, false, false);
 //print $info2;
 $columns =12;
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