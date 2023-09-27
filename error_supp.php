<?php
if (empty($supplier_id)){
	
    $id_error = 'please insert id';
}
// Validate name
   $input_name = trim($_POST["personName"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $person = $input_name;
    }
//}
if (empty($tel)){
	
	$person_error ='please insert tel number';
}
?>