<?php
class ControllerExtensionModuleFilterpromahan extends Controller {
  
	public function index() {
		
		$this->load->language('extension/module/filterpromahan');
        $data['heading_title'] = $this->language->get('heading_title');
		
		$this->load->model('extension/module/filterpromahan');
		

		
		if (isset($this->request->get['filter'])) {
            $filter = $this->request->get['filter'];
        } else {
            $filter = '';
        }

        if (isset($this->request->get['sort'])) {
            $sort = $this->request->get['sort'];
        } else {
            $sort = 'p.sort_order';
        }

        if (isset($this->request->get['order'])) {
            $order = $this->request->get['order'];
        } else {
            $order = 'ASC';
        }

        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
        } else {
            $page = 1;
        }

        if (isset($this->request->get['limit'])) {
            $limit = (int) $this->request->get['limit'];
        } else {
            $limit = $this->config->get($this->config->get('config_theme') . '_product_limit');
        }
        if (isset($this->request->get['path'])) {
            if (stristr($this->request->get['path'], '_') === FALSE) {
                $parts = $this->request->get['path'];
                $category_id = $this->request->get['path'];
            } else {

                $path = '';
                $parts = explode('_', (string) $this->request->get['path']);
                $category_id = '';
                $category_id = (int) array_pop($parts);
            }
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$manufactureNames = $this->model_extension_module_filterpromahan->getManufactureName($category_id);
			
			foreach($manufactureNames as $manufactureName){
				$data['manufactures'][]= array(
					'manufacture_id' => $manufactureName['manufacturer_id'],
					'name' => $manufactureName['name'],
					'href' => $this->url->link('product/category', 'path=' . $category_id . $url.'&manufacturer_id='.$manufactureName['manufacturer_id'])
				);
			}
			
			if(count($data['manufactures'])>1)
				return $this->load->view('extension/module/filterpromahan',$data);
		}

	}
}
