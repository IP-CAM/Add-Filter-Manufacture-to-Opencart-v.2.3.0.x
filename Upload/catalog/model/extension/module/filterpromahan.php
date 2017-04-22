<?php
class ModelModuleFilterpromahan extends Model {
  
  public function getManufactureName($category_id){
		
		$sql = "SELECT DISTINCT" . DB_PREFIX . "manufacturer.name " . DB_PREFIX . "manufacturer.manufacturer_id FROM " . DB_PREFIX . "product LEFT JOIN " . DB_PREFIX . "product_to_category on " . DB_PREFIX . "product.product_id = " . DB_PREFIX . "product_to_category.product_id LEFT JOIN " . DB_PREFIX . "manufacturer on " . DB_PREFIX . "manufacturer.manufacturer_id = " . DB_PREFIX . "product.manufacturer_id WHERE " . DB_PREFIX . "product_to_category.category_id = ".$category_id;
		
		$query = $this->db->query($sql);
		
		$manufacturer_data = $query->rows;	

	}
  
}
