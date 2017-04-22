# opencartFilter
This module add filter manufacture to your store
opencart version = 2.3.0.2

Catalog\controller\product\category.php need to change

	1. Add line 176: 'filter_manufacturer_id' => $manufacturer_id,
	2. Add line 42:
	if (isset($this->request->get['manufacturer_id'])) {
		$manufacturer_id = (int)$this->request->get['manufacturer_id'];
	} else {
		$manufacturer_id = 0;
	}
	3. Add line 158: 
	if (isset($this->request->get['manufacturer_id'])) {
		$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
	}
	4. Add line 358:
	      if (isset($this->request->get['manufacturer_id'])) {
	      $url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
	      }
	5. Add line 426:
	if (isset($this->request->get['manufacturer_id'])) {
		$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
		}
