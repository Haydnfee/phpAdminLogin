<?php
	function getAll($tbl) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);
		if ($runAll) {
			return $runAll;
		} else {
			$error = "An error occured while accessing this information. Please contact your admin.";
			return $error;
		}

		mysqli_close($link);
	}

	function getSingle($tbl, $col, $id) {
		include('connect.php');
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
		$runSingle = mysqli_query($link, $querySingle);

		if($runSingle){
			return $runSingle;

			} else {
			$error = "An error occured while accessing this information. Please contact your admin.";
			return $error;
		}

		mysqli_close($link);
	}

function filtertype($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter) {


        include('connect.php');
        $queryFilter = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3}
                    WHERE {$tbl}.{$col} = {$tbl3}.{$col} 
                    AND {$tbl2}.{$col2} = {$tbl3}.{$col2} 
                    AND {$tbl2}.{$col3} = '{$filter}'";
    $runFilter = mysqli_query($link, $queryFilter);

    if($runFilter){
        return $runFilter;
    }else{
        $error = "There was error accessing this information. Please contact your admin.";
        return $error;
    }

    mysqli_close($link);
    }

    ?>