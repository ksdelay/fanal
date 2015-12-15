<?php
include 'top.php';
$debug = true;

/* this example creates a list box from our database.
 * Four step process

  Create your database object using the appropriate database username
  Define your query. In this example we open the file that contains the query.
  Execute the query
  Prepare output and loop through array

 */
$yourURL = $domain . $phpSelf;
//initialize value
$mountain = "Ward Hill";
$userEmail = get_current_user() . "@uvm.edu";
$liftWait = "Time in minutes";
$userDifficulty = 0;
$condition = "";
$rating = 0;
if ($debug)
    print"<p>" . $userEmail . "</p>";
$mountainERROR = false;
$userEmailERROR = false;
$liftWaitERROR = false;
$conditionERROR = false;
$ratingERROR = false;
$errorMsg = array();

if (isset($_POST["btnSubmit"])) {
    //Secruity
    if (!(securityCheck($path_parts, $yourURL, true))) {
        $msg = "<p>Sorry you cannot access this page. ";
        $msg.= "Security breach detected and reported</p>";
        die($msg);
    }
    if (debug)
        print "<p>hello</p>";
    $mountain = filter_var($_POST[lstMountains]);
    $liftWait = filter_var($_POST["txtLiftWait"]);
    $Difficulty = ($_POST["radDifficulty"]);
    $condition = filter_var($_POST["txtCondition"]);
    $rating = filter_var($_POST["txtRating"]);
    if($debug)
        print"<p>".$Difficulty."dsa</p>";
    if (!$errorMsg) {
        if ($debug)
            print"<p> valid</p>";
        $dataEntered = false;
        try {
            if ($debug) {
                print"<p>Form passed error validation</p>";
            }
            $insertQuery = 'INSERT INTO tblUserMountainReview SET fldMountainName =?, fnkUserEmail=?,fldLiftWait=?,fldDifficulty=?, fldCondition=?,fldRating=?';
            //$findMountainIdQuery = "SELECT pmkMountainId FROM tblMountains WHERE fldName ='".$mountain."'";
            // if($debug){
            //  print"<p>".$insertQuery."</p>";
            //     print "<p> ok</p>";
            //    print"<p>".$findMountainIdQuery."</p>";
            // }
            //$temp = $thisDatabaseReader->select($findMountainIdQuery,"", 0, 0, 0, 0, false, false);

            if ($debug)
                print"<p>" . $mountain . "</p>";

            $data = array($mountain, $userEmail, $liftWait, $Difficulty, $condition, $rating);
            if ($debug) {
                print "<p>sql " . $insertQuery;
                print"<p><pre>";
                print_r($data);
                print"</pre></p>";
            }
            $results = $thisDatabaseWriter->insert($insertQuery, $data);
            $dataEntered = true;
            if ($debug)
                print"<p>finished</p>";
        }//ends try
        catch (PDOException $e) {
            $thisDatabase->db->rollback();
            if ($debug)
                print "Error!: " . $e->getMessage() . "</br>";
            $errorMsg[] = "There was a problem with accpeting your data please contact us directly.";
        }
    }//ends catch
}
//End if form is valid
//End button submit
?>
<p>Please make sure to register if you haven't already</p>
<p><a href="addUser.php">Click here to register</a></p>
<h2>Recenetly visited a mountain why not tell us what you think?</h2>
<form action= "<?php print $phpSelf; ?>"
      method ="post"
      id="frmMountainReview">
    <fieldset class="warpper">
        <Legend>Enter your review of a mountain</Legend>
<?php
$query = "SELECT DISTINCT fldName ";
$query .= "FROM tblMountains ";
$query .= "ORDER BY  fldName";
$mountains = $thisDatabaseReader->select($query, "", 0, 1, 0, 0, false, false);

print '<label for="lstMountains">Select a mountain to review ';
print '<select id="lstMountains" ';
print '        name="lstMountains"';
print '        tabindex="10" >';


foreach ($mountains as $row) {

    print '<option ';
    if ($mountain == $row["fldMountain"])
        print " selected='selected' ";

    print 'value="' . $row["fldName"] . '">' . $row["fldName"];

    print '</option>';
}

print '</select></label>';
?>
        <fieldset class="mountainReview">
            <legend>Thoughts about the mountain</legend>

            <label for="txtLiftWait" class="notrequired">Average lift wait time in minutes
                <input type="text" id="txtLiftWait" name="txtLiftWait"
                       value="<?php print $liftWait; ?>"
                       tabindex="20" maxlength="45" placeholder="Lift wait in minutes"
<?php if ($liftWaitERROR) print 'class="mistake"'; ?>
                       onfocus="this.select()"
                       >
            </label>
            
                <legend>Select what you thought the overall difficulty was:</legend>

                <label for="radGreen">
                    <input type="radio" 
                           id="radGreen" 
                           name="radDifficulty" 
                           value="1">Green Circle
                </label>

                <label for="radBlue">
                    <input type="radio" 
                           id="radBlue" 
                           name="radDifficulty" 
                           value="2">Blue Square
                </label>
                <label for="radBlack">
                    <input type="radio" 
                           id="radBlack" 
                           name="radDifficulty" 
                           value="3">Black Diamond
                </label>
                <label for="radDoubleBlack">
                    <input type="radio" 
                           id="radDoubleBlack" 
                           name="radDifficulty" 
                           value="4">Double Black Diamond
                </label>

           
            <label for="txtCondition" class="required">What did you think about the mountain
                <input type="text" id="txtCondition" name="txtCondition"
                       value="<?php print $condition; ?>"
                       tabindex="20" maxlength="45" placeholder="overall condition"
<?php if ($conditionERROR) print 'class="mistake"'; ?>
                       onfocus="this.select()"
                       >
            </label>
                  <label for="txtRating" class="required">Rating on a scale of 1-10
                <input type="text" id="txtRating" name="txtRating"
                       value="<?php print $rating; ?>"
                       tabindex="20" maxlength="45" placeholder="overall rating"
<?php if ($ratingERROR) print 'class="mistake"'; ?>
                       onfocus="this.select()"
                       >
            </label>
        </fieldset><!-- ends the mountain review section -->
        <fieldset class="buttons">
            <input type="submit" id="btnSubmit" name="btnSubmit" value="Review" tabindex="1000" class="button">

        </fieldset>
<?php
print "</fieldset>"; //Ends Wrapper fieldset

print '</form>';
include 'footer.php';
?>