<?php 
	// required files
	require_once('../conf.php');
	require_once('dataaccess.php');
	require_once('functions.php');
	require_once('baseclass.php');
	require_once('classes.php');
?>

It's a 'Lil Data Mapper!<br>
<a href="https://github.com/BlackCloudConcepts/lildatamapper">'Lil Data Mapper on Github</a>
<br>
========================
<br><br>

<?php 
	date_default_timezone_set('UTC');
        $currDateTime = date("Y-m-d H:i:s");
	// Insert User
	$objUsersStep1 = new ldm_users;
        $objUsersStep1->first_name = 'Jack';
        $objUsersStep1->last_name = 'Sparrow';
        $objUsersStep1->gender = 'male';
        $objUsersStep1->email = 'jacksparrow@test.com';
        $objUsersStep1->date_joined = $currDateTime;
	$id = $objUsersStep1->Save();
?>
STEP 1 : Save and object to the database ... <br>
Jack Sparrow was saved with id = '<?php echo $id; ?>'
<br><br>

STEP 2 : Load an object from the database ... <br>
<?php 
	$objUsersStep2 = new ldm_users;
	$objUsersStep2 = $objUsersStep2->Load($id);
	echo 'First Name: '.$objUsersStep2->first_name.'<br>';
	echo 'Last Name: '.$objUsersStep2->last_name.'<br>';
	echo 'Gender: '.$objUsersStep2->gender.'<br>';
	echo 'Email: '.$objUsersStep2->email.'<br>';
	echo 'Date Joined: '.$objUsersStep2->date_joined;
?>
<br><br>

STEP 3 : Update an object in the database ... <br>
<?php 
	$objUsersStep3 = new ldm_users;
        $objUsersStep3 = $objUsersStep3->Load($id);
	$objUsersStep3->first_name = 'Captain';
	$objUsersStep3->last_name = 'Blackbeard';
	$objUsersStep3->Save();
?>
... and look it up again to prove it updated ... <br>
<?php
        $objUsersStep35 = new ldm_users;
        $objUsersStep35 = $objUsersStep35->Load($id);
        echo 'First Name: '.$objUsersStep35->first_name.'<br>';
        echo 'Last Name: '.$objUsersStep35->last_name.'<br>';
        echo 'Gender: '.$objUsersStep35->gender.'<br>';
        echo 'Email: '.$objUsersStep35->email.'<br>';
        echo 'Date Joined: '.$objUsersStep35->date_joined;
?>
<br><br>

Step 4 : Delete an object from the database ... <br>
<?php 
	$objUsersStep4 = new ldm_users;
        $objUsersStep4 = $objUsersStep4->Load($id);
	$idDeleted = $objUsersStep4->Delete();
?>
id '<?php echo $idDeleted; ?>' was deleted.
