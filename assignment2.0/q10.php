<?php

include "top.php";

// Begin output
print '<article>';
print '<h2>Query 10 SELECT  DISTINCT fldBuilding, count(fldNumStudents), fldDays FROM tblSections WHERE  fldDays like "%F%" GROUP BY fldBuilding order by count(fldNumStudents) desc</h2>';
print '<table>';

 $query = 'SELECT  DISTINCT fldBuilding, count(fldNumStudents), fldDays FROM tblSections WHERE  fldDays like "%F%" GROUP BY fldBuilding order by count(fldNumStudents) desc';
$info = $thisDatabaseReader->select($query, "",1, 1, 2, 0, false, false);
 //$info2 = $thisDatabaseReader->testQuery($query, "", 1, 1, 2, 0, false, false);
//print $info2;
 $columns =3;
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