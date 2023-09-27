 <?php  include 'menu.inc'; ?>
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: black;
  color: white;
  text-align: center;
}
</style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left"> Supplier Details</h2>
                        <a href="supplier-add.php" class="btn btn-success pull-right">Add New Supplier</a>
                    </div>
                  
<?php include "configs.php";?>
<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
 <thead>
  <tr>
   <th>Supplier ID</th>
   <th>Marks</th>
   <th>Department</th>
   <th>Result</th>
   <th>Marks</th>
   <th>Department</th>
   <th>Result</th>
   <th>Type Account</th>
   <th>Update</th>
   <th>Delete</th>
  </tr>
 </thead>
 <tbody>
  <?php
$Show = mysqli_query($con, "SELECT * FROM tblsupplier");
while($r = mysqli_fetch_array($Show)): ?>
    <tr>
     <td><?php echo $r['Supplier_ID']; ?></td>
     <td><?php echo $r['Contact_Person']; ?></td>
     <td><?php echo $r['Supplier_Tel']; ?></td>
     <td><?php echo $r['Supplier_Email']; ?></td>
	 <td><?php echo $r['Bank']; ?></td>
     <td><?php echo $r['Bank_code']; ?></td>
     <td><?php echo $r['Supplier_BankNum']; ?></td>
	 <td><?php echo $r['Supplier_Type_Bank_Account']; ?></td>
     <td><a href="supplier_update.php?update_id=<?php echo $r['Supplier_ID']; ?>" class="btn btn-warning">
  Update
</a></td>
     <td><a href="supplier_delete.php?delete_id=<?php echo $r['Supplier_ID']; ?>" class="btn btn-danger">
  Delete
</a></td>
    </tr>
    <?php endwhile; ?>
 </tbody>
 </table>
  </div><!-- col -->
 </div><!-- row -->
</div><!-- container -->
<div class="footer">
  <p>Copyright 2020 </p>
</div>

            