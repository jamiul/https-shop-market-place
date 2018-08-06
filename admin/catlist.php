<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/caregory.php';?>
 <?php
    $cat = new Category();

    if (isset($_GET['delcat'])) {
    $catId = $_GET['delcat'];

    $DelCat = $cat->catDelete($catId);
}
 ?>      <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                <?php
                if (isset($DelCat)) {
                	echo ($DelCat);
                }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$showCat = $cat->getAllcat();
					if ($showCat) {
						$i = 0;
						while ($result = $showCat->fetch_assoc()){
							$i++;
				
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['catName'];?></td>
							<td><a href="catedit.php?catid=<?php echo $result['carId'];?>">Edit</a> || <a onclick="return confirm('Are You Sure To Delete !')" href="?delcat=<?php echo $result['carId'];?>">Delete</a></td>
						</tr>
						<?php  } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

