<?php
//registration error checking
if (!isset($_GET['registration'])) {
			echo "";
		}else{
			if ($_GET['registration'] == "empty") {
				echo '<div class="error">You did not fill all data in inputs!</div>';
			}elseif($_GET['registration'] == "char"){
					echo '<div class="error">Input valid name!</div>';
			}elseif ($_GET['registration'] == "email") {
				echo '<div class="error">You fill incorect email!</div>';
			}elseif ($_GET['registration'] == "pass") {
				echo '<div class="error">Your password must containt 8 character!</div>';
			}
		}

//error checking when we input new licence
if (!isset($_GET['editlicence'])) {
			echo "";
		}else{
			if ($_GET['editlicence'] == "empty") {
				echo '<div class="error">You did not fill all data in inputs!</div>';
			}elseif($_GET['editlicence'] == "char"){
					echo '<div class="error">Input valid name!</div>';
			}elseif ($_GET['editlicence'] == "number") {
				echo '<div class="error">Period must be a number</div>';
			}
		}

//edit licence error checking
if (!isset($_GET['licence'])) {
			echo "";
		}else{
			if ($_GET['licence'] == "empty") {
				echo '<div class="error">You did not fill all data in inputs!</div>';
			}elseif($_GET['licence'] == "char"){
					echo '<div class="error">Input valid name!</div>';
			}elseif ($_GET['licence'] == "number") {
				echo '<div class="error">Period must be a number</div>';
			}
		}

//delete licence error checking
		if (isset($_GET['delete'])) {
			if ($_GET['delete'] == "success") {
				echo '<div style="text-align: center;color: olivedrab;">You successfully deleted licence</div>';
			}elseif ($_GET['delete'] == "error") {
				echo '<div class="error">Something went wrong while deleting licence!</div>';
			}
		}
