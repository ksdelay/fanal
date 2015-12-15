<?php

include "top.php";

// Begin output
print '<article>';
print '<h2>Query 4 SELECT DISTINCT fldCRN, fldFirstName, fldLastName, fldDepartment, fldCourseNumber FROM tblEnrolls, tblCourses, tblStudents, tblSections WHERE tblEnrolls.fnkCourseId = tblSections.fnkCourseId AND tblEnrolls.fnkCourseId = tblCourses.pmkCourseId AND tblEnrolls.fnkStudentId = tblStudents.pmkStudentId AND tblCourses.fldDepartment = "CS" AND tblCourses.fldCourseNumber = "148"AND fldCRN = "95470"</h2>';
print '<table>';
$tableName = tblCourses;
 $query = 'SELECT DISTINCT fldCRN, fldFirstName, fldLastName, fldDepartment, fldCourseNumber FROM tblEnrolls, tblCourses, tblStudents, tblSections WHERE tblEnrolls.fnkCourseId = tblSections.fnkCourseId AND tblEnrolls.fnkCourseId = tblCourses.pmkCourseId AND tblEnrolls.fnkStudentId = tblStudents.pmkStudentId AND tblCourses.fldDepartment = "CS" AND tblCourses.fldCourseNumber = "148"AND fldCRN = "95470"';
 $info = $thisDatabaseReader->select($query, "", 1, 4, 6, 0, false, false);
 //$info2 = $thisDatabaseReader->testQuery($query, "", 1, 4, 6, 0, false, false);
 //print $info2;
 $columns =5;
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