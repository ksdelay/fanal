<?php

include "top.php";

// Begin output
print '<article>';
print '<h2>Query 5 SELECT fldFirstName, fldLastName, SUM(fldNumStudents) AS total FROM tblSections JOIN tblTeachers ON fnkTeacherNetId = pmkNetId JOIN tblCourses ON pmkCourseId = fnkCourseId WHERE FldType != "LAB" AND fldNumStudents > 0 AND fldDepartment = "CS" GROUP BY fnkTeacherNetId ORDER BY Total DESC</h2>';
print '<table>';

 $query = 'SELECT fldFirstName, fldLastName, SUM(fldNumStudents) AS total FROM tblSections JOIN tblTeachers ON fnkTeacherNetId = pmkNetId JOIN tblCourses ON pmkCourseId = fnkCourseId WHERE FldType != "LAB" AND fldNumStudents > 0 AND fldDepartment = "CS" GROUP BY fnkTeacherNetId ORDER BY Total DESC';
$info = $thisDatabaseReader->select($query, "", 1, 4, 4, 1, false, false);
//$info2 = $thisDatabaseReader->testQuery($query, "", 1, 4, 4, 1, false, false);
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