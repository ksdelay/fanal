<?php

include "top.php";

// Begin output
print '<article>';
print '<h2>Query 2 SELECT fldDepartment FROM tblCourses WHERE fldCourseName LIKE "Introduction%"</h2>';
print '<table>';
$tableName = tblCourses;
 $query = 'SELECT DISTINCT fldDays, fldStart, fldStop FROM tblSections, tblTeachers WHERE fnkTeacherNetid = tblTeachers.pmkNetId and fldLastName like "Snapp" ORDER BY fldStart';
 $info = $thisDatabaseReader->select($query, "", 1, 2, 2, 0, false, false);
  $info2 = $thisDatabaseReader->testQuery($query, "", 1, 2, 2, 0, false, false);
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