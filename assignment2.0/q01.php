<?php

include "top.php";

// Begin output
print '<article>';
print '<h2>Query 1 SELECT pmkNetId from tblTeachers</h2>';
print '<table>';
$tableName = tblTeachers;
 $query = 'SELECT pmkNetId FROM ' . $tableName;
 $info = $thisDatabaseReader->select($query, "", 0, 0, 0, 0, false, false);
 //$info2 = $thisDatabaseReader->testQuery($query, "", 0, 0, 0, 0, false, false);
 //print $info2;
 $columns =1;
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