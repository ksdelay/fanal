<?php

//##############################################################################
//
// main home page for the site 
// 
//##############################################################################
include "top.php";

// Begin output
print '<article>';
print '<h2>Select which query</h2>';
print '<li><a href=q01.php> Query 1, SELECT DISTINCT fldCourseName FROM tblCourses, tblEnrolls WHERE fldGrade="100" AND tblCourses.pmkCourseId = tblEnrolls.fnkCourseId ORDER BY tblCourses.fldCourseName ASC</a></li>';
print '<li><a href=q02.php> Query 2 SELECT DISTINCT fldDays, fldStart, fldStop FROM tblSections, tblTeachers WHERE fnkTeacherNetid = tblTeachers.pmkNetId and fldLastName like "Snapp" ORDER BY fldStart"</a></li>';
print '<li><a href=q03.php> Query 3 SELECT DISTINCT fldCourseName, fldDays, fldStart, fldStop FROM tblSections, tblTeachers, tblCourses WHERE fnkTeacherNetid = tblTeachers.pmkNetId AND fnkCourseId = pmkCourseId and fldLastName like "Horton" ORDER BY fldStart</a></li>';
print '<li><a href=q04.php> Query 4 SELECT DISTINCT fldCRN, fldFirstName, fldLastName, fldDepartment, fldCourseNumber FROM tblEnrolls, tblCourses, tblStudents, tblSections WHERE tblEnrolls.fnkCourseId = tblSections.fnkCourseId AND tblEnrolls.fnkCourseId = tblCourses.pmkCourseId AND tblEnrolls.fnkStudentId = tblStudents.pmkStudentId AND tblCourses.fldDepartment = "CS" AND tblCourses.fldCourseNumber = "148"AND fldCRN = "95470"</a></li>';
print '<li><a href=q05.php> Query 5 SELECT fldFirstName, fldLastName, SUM(fldNumStudents) AS total FROM tblSections JOIN tblTeachers ON fnkTeacherNetId = pmkNetId JOIN tblCourses ON pmkCourseId = fnkCourseId WHERE FldType != "LAB" AND fldNumStudents > 0 AND fldDepartment = "CS" GROUP BY fnkTeacherNetId ORDER BY Total DESC</a></li>';
print '<li><a href=q06.php> Query 6 SELECT fldFirstName, fldPhone, fldSalary FROM tblTeachers WHERE fldSalary < (SELECT AVG(fldSalary) FROM tblTeachers)</a></li>';
print '</article>';
include "footer.php";
?>