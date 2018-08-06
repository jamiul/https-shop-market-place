<?php 
  	include_once '../helpers/format.php';
  	include_once '../lib/Database.php';
?>

<?php
class Category
{
	
	private $db;
 	private $fm;
 	
   public function __construct()
 	{
 		$this->db = new Database();
 		$this->fm = new Format();
 	}
 	public function catInsert($catName)
 	{
 		$catName = $this->fm->validation($catName);

 		$catName = mysqli_real_escape_string($this->db->link,$catName);
 			if (empty($catName)) {
 			$msg = "<span class='error'> Category Field must not be empty !!</span>";
 			return $msg;
 		}else{
 			$query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
 			$catInsert = $this->db->insert($query);
 			if ($catInsert) {
 				$msg = "<span class='success'> Category Inserted successfully !!</span>";
 			return $msg;
 			}else{
 				$msg = "<span class='error'> Category not Inserted !!</span>";
 			return $msg;
 			}

 		}
 	}
 	public function getAllcat()
 	{
 		$query = "SELECT * FROM tbl_category ORDER BY carId DESC";
 		$result = $this->db->select($query);
 		return $result;
 	}
 	public function getCatById($id)
 	{
 		$query = "SELECT * FROM tbl_category where carId = '$id'";
 		$result = $this->db->select($query);
 		return $result;
 	}
 	public function catUpdate($catName,$id)
 	{
 		$catName = $this->fm->validation($catName);
 		$catName = mysqli_real_escape_string($this->db->link,$catName);
 		$id = mysqli_real_escape_string($this->db->link,$id);
 		if (empty($catName)) {
 			$msg = "<span class='error'> Category Field must not be empty !!</span>";
 			return $msg;
 		}else {
 			$query = "UPDATE tbl_category
 			          set catName = '$catName'
 			          where carId = '$id' ";
 			          $updated_row = $this->db->update($query);
 			          if ($updated_row) {
 			          	$msg = "<span class='success'> Category Updated successfully !!</span>";
 			          	return $msg;
 			          }else {
 			          	$msg = "<span class='error'> Category Not Updated !!</span>";
 			          	return $msg;
 			          }
 		}
 	}
 	public function catDelete($catId)
 	{
 		$catId = mysqli_real_escape_string($this->db->link,$catId);
 		$query = "DELETE FROM tbl_category where carId = '$catId'";
 		$delData = $this->db->delete($query);
 		if (!empty($delData)) {
 			$msg = "<span class='success'> Category Deleted successfully !!</span>";
 		return $msg;
 		}else{
 			$msg = "<span class='error'> Category Not Deleted !!</span>";
 		return $msg;
 		}
 	}
}
?>