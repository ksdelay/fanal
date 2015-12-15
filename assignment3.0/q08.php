<?php

include "top.php";

// Begin output
print '<article>';
print '<h2>Query 8 SELECT DISTINCT fldBuilding, COUNT(*) AS num_sections FROM tblSections GROUP BY fldBuilding</h2>';
print '<table>';

 $query = 'SELECT DISTINCT fldBuilding, COUNT(*) AS num_sections FROM tblSections GROUP BY fldBuilding';
$info = $thisDatabaseReader->select($query, "", 0, 0, 0, 0, false, false);
/// $info2 = $thisDatabaseReader->testQuery($query, "", 0, 0, 0, 0, false, false);
// print $info2;
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