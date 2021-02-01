<?php
    include_once "dbh.php";
    if (isset($_GET['insert'])) {
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
    	if (empty($email)) {
    		header("location:index.php?error=empty");
    		exit();
    	} else {
    		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    			header("location:index.php?error=email");
    			exit();
    		} else {
				$pattern = "/.co$/i";
				if (preg_match($pattern, $email) == 1) {
					header("location:index.php?error=columbia");
					exit();
				} else {
					$check = $_POST['checkbox'];
					if ($check != "on") {
						header("location:index.php?error=checkbox");
						exit();
					}
				}
    		}
    	}   	
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>db test</title>
    <style>
    table, th, td {
        border: 1px solid black;
    }
    span {
    	float: left;
    	padding: 1em;
    }
    h4 {
    	margin-bottom: 10px;
    }
    </style>
</head>
<body>
<?php
	if (isset($_GET['insert']) && isset($_POST['email'])) { 
	    //$email = mysqli_real_escape_string($conn, $_POST["email"]);	
    	
    	$sql = "INSERT INTO emails (email) VALUES ('$email');";
    	//$result = mysqli_query($conn, $sql);
    	if (!($conn->query($sql) === TRUE)) {
    		echo "Error: " . $sql . "<br>" . $conn->error;
    	}
    
    	$domain_exp = explode("@", $email);
    	$domain = $domain_exp[1];
    	$sql_look = "SELECT * FROM email_providers;";
    	$result_look = $conn->query($sql_look);
    	$present = false;
    	if ($result_look->num_rows > 0) {
    		while ($row = $result_look->fetch_assoc()) {
    			if ($domain == $row['domain']) {
    				$present = true;
    			}
    		}
    	}
    	if (!$present) {
    		$sql_ins = "INSERT INTO email_providers (domain) VALUES ('$domain');";
    		//$result = mysqli_query($conn, $sql_ins);
    		//echo "$domain";
    		if (!($conn->query($sql_ins) === TRUE)) {
    			echo "Error: " . $sql . "<br>" . $conn->error;
    		}
    	}
	}
	if (isset($_GET['keyword'])) {
		$keyword = $_GET['keyword'];
	} else {
		$keyword = '';
	}
	if (isset($_GET['provider'])) {
		$domain = $_GET['provider'];
	} else {
		$domain = 'all';
	}
	if (isset($_GET['sort'])) {
		$primary_order = $_GET['sort'];
	} else {
		$primary_order = 'date';
	}
?>
<span> 
	<form name="db_search" method="get" action="database.php">
		<?php
			if ($keyword != '') {
				echo "<input type='text' name='keyword' placeholder='Enter Keyword' 
				value='$keyword'>";
			} else {
				echo "<input type='text' name='keyword' placeholder='Enter Keyword'>";
			}
		?>
		<button type="submit" name="submit-search">Search</button><br>
		<h4>Filter By Provider</h4>
		<input type="radio" id="all_pr" name="provider" value="all" checked>
		<label for="all_pr">All Providers</label><br>
		<?php
			$sql_pr = "SELECT * FROM email_providers";
			$result_pr = $conn->query($sql_pr);
			if ($result_pr->num_rows > 0) {
				while ($row = $result_pr->fetch_assoc()) {
				  echo "<input type='radio' id='".$row['domain']."' name='provider' 
				  name='provider' value='".$row['domain']."'";
				  if ($domain == $row['domain']) {
				  	echo " checked";
					}
				  echo "><label for='".$row['domain']."'>".$row['domain']."</label><br>";
				}
			}
			//<input type="radio" id="gmail" name="provider" value="gmail.com">
			//<label for="gmail">gmail.com</label><br>
		?>
		<h4>Sort By</h4>
		<?php
			if ($primary_order == 'date') {
				echo "<input type='radio' id='date' name='sort' value='date' checked>
				<label for='date'>Date</label><br>
				<input type='radio' id='name' name='sort' value='email'>
				<label for='name'>Name</label><br>";
			} else {
				echo "<input type='radio' id='date' name='sort' value='date'>
				<label for='date'>Date</label><br>
				<input type='radio' id='name' name='sort' value='email' checked>
				<label for='name'>Name</label><br>";
			}
		?>
	</form>
</span>
<span>
<?php
	if ($primary_order == 'date') {
		$secondary_order = 'email';
	} else {
		$secondary_order = 'date';
	}
    $sql_em = "SELECT * FROM emails 
	WHERE (email LIKE '%$keyword%' OR date LIKE '%$keyword%')";
	if ($domain != 'all') {
		$sql_em = $sql_em . " AND email LIKE '%$domain'";
	}
	$sql_em = $sql_em . " ORDER BY $primary_order, $secondary_order;";
    $result_em = $conn->query($sql_em);
    
    if ($result_em->num_rows > 0) {
        echo "<table><tr><th>Email</th><th>Date Submited</th><th>Delete</th></tr>";
        while ($row = $result_em->fetch_assoc()) {
        	$temp_href = "delete.php?id=" . $row['user_id'];
            echo "<tr><td>" . $row["email"] . "</td><td>" . $row["date"] . 
            "</td><td><a href=".$temp_href.">Delete</a></td><tr>";
        }
        echo "</table>";
    }   else {
        echo "0 results";
    }
?>
</span>
</body>
</html>