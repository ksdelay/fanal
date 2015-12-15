<?php

include "top.php";

// Begin output
print '<article>';
print '<h2>Query 1 show distinct courses where the grade was 100</h2>';
print '<table>';
$tableName = tblTeachers;
 $query = 'SELECT DISTINCT fldCourseName FROM tblCourses, tblEnrolls WHERE fldGrade="100" AND tblCourses.pmkCourseId = tblEnrolls.fnkCourseId ORDER BY tblCourses.fldCourseName ASC';
 $info = $thisDatabaseReader->select($query, "", 1, 2, 2, 0, false, false);
 //$info2 = $thisDatabaseReader->testQuery($query, "", 1, 2, 2, 0, false, false);
// print $info2;
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