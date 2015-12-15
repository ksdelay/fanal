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
print '<li><a href=q01.php> Query 1, SELECT pmkNetId FROM tblTeachers</a></li>';
print '<li><a href=q02.php> Query 2 SELECT fldDepartment FROM tblCourses WHERE fldCourseName LIKE "Introduction%"</a></li>';
print '<li><a href=q03.php> Query 3 SELECT * FROM "tblSections" WHERE fldStart LIKE "13:10:00" AND fldBuilding LIKE "Kalkin" ORDER BY "fldStart" ASC</a></li>';
print '<li><a href=q04.php> Query 4 SELECT * FROM tblSections WHERE  fldCRN = "95470"</a></li>';
print '<li><a href=q05.php> Query 5 SELECT fldFirstName, fldLastName, pmkNetId FROM tblTeachers WHERE pmkNetId like "r%" and pmkNetId like "%o"</a></li>';
print '<li><a href=q06.php> Query 6 SELECT fldCourseName FROM tblCourses WHERE fldCourseName like "%data%" and fldDepartment not like "CS"</a></li>';
print '<li><a href=q07.php> Query 7 SELECT DISTINCT fldDepartment FROM tblCourses </a></li>';
print '<li><a href=q08.php> Query 8 SELECT DISTINCT fldBuilding, COUNT(*) AS num_sections FROM tblSections GROUP BY fldBuilding </a></li>';
print "<li><a href=q09.php> Query 9 SELECT  DISTINCT fldBuilding, count(fldNumStudents), fldDays FROM tblSections WHERE  fldDays like '%W%' GROUP BY fldBuilding order by count(fldNumStudents) desc </a></li>";
print "<li><a href=q10.php> Query 10 SELECT  DISTINCT fldBuilding, count(fldNumStudents), fldDays FROM tblSections WHERE  fldDays like '%F%' GROUP BY fldBuilding order by count(fldNumStudents) desc </a></li>";
print '</article>';
include "footer.php";
?>