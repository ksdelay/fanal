<?php

include "top.php";

// Begin output
print '<article>';
print '<h2>Query 6 SELECT fldFirstName, fldPhone, fldSalary FROM tblTeachers WHERE fldSalary < (SELECT AVG(fldSalary) FROM tblTeachers)</h2>';
print '<table>';

 $query = 'SELECT fldFirstName, fldPhone, fldSalary FROM tblTeachers WHERE fldSalary < (SELECT AVG(fldSalary) FROM tblTeachers)';
$info = $thisDatabaseReader->select($query, "", 1, 0, 0, 1, false, false);
 $info2 = $thisDatabaseReader->testQuery($query, "", 1, 0, 0, 1, false, false);
 print $info2;
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