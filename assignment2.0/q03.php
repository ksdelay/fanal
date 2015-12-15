<?php

include "top.php";

// Begin output
print '<article>';
print '<h2>Query 3 SELECT * FROM "tblSections" WHERE fldStart LIKE "13:10:00" AND fldBuilding LIKE "Kalkin" ORDER BY "fldStart" ASC</h2>';
print '<table>';
$tableName = tblCourses;
 $query = 'SELECT * FROM tblSections WHERE fldStart LIKE "13:10:00" AND fldBuilding LIKE "Kalkin" ORDER BY fldStart ASC';
 $info = $thisDatabaseReader->select($query, "", 1, 2, 4, 0, false, false);
  //$info2 = $thisDatabaseReader->testQuery($query, "", 1, 2, 4, 0, false, false);
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