

<link href="css/styles.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>


<?php foreach ($detail as $details) { ?>
          <p><?php if($details[1] !== null && $details[2] !== null)
           ?></p>
           
        
          <?php } ?> <!--end of each statement -->
       <table border="1">
        <tr>
          <th>ID Number</th>
          <th>Name</th>
          <th>Surname</th>
		  <th>Address</th>
          <th>Code</th>
		  <th>Cell No</th>
          <th>Home Telephone No</th>
          <th>Work Telephone No</th>
          <th>Email</th>
          <th>Ref</th>
          <th>Action</th>
		    </tr> 
			
	      <?php foreach ($detail as $details) { ?>
		    <tr>
          <td><?php echo $details[0]; ?></td>
		      <td><?php echo $details[1]; ?></td>
			    <td><?php echo $details[2]; ?></td>
          <td><?php echo $details[3]; ?></td>
          <td><?php echo $details[4]; ?></td>
          <td><?php echo $details[5]; ?></td>
          <td><?php echo $details[6]; ?></td>
          <td><?php echo $details[7]; ?></td>
          <td><?php echo $details[8]; ?></td>
          <td><?php echo $details[10]; ?></td>
          <td class = "Delete" > <!-- Edit button -->
				  <form action = "client-edit.php" method = "post"> 
            <input type="hidden" name="clientID"  value="<?php echo $details[0] ; ?>"/>
            <input type="hidden" name="fname"  value="<?php echo  $details[1]; ?>"/>
		    <input type="hidden" name="lname" value="<?php echo $details[2]; ?>"/>
            <input type="hidden" name="hAddress"  value="<?php echo  $details[3]; ?>"/>
            <input type="hidden" name="addCode"  value="<?php echo $details[4]; ?>"/>
            <input type="hidden" name="cell"  value="<?php echo $details[5]; ?>"/>
            <input type="hidden" name="hTel"  value="<?php echo $details[6]; ?>"/>
            <input type="hidden" name="wTel"  value="<?php echo $details[7]; ?>"/>
             <input type="hidden" name="email"  value="<?php echo $details[8]; ?>"/>
            <input type="hidden" name="ref"  value="<?php echo $details[9]; ?>"/> 
					  <input type="submit" class="edit" style="color: blue; width: 98%; " value="Edit" name="submit">
				  </form>
          </td>
		    </tr>
		    <?php } // end of table?>
	    </table>