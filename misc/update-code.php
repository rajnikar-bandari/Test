<?php
function update(){
	$tid = $this->input->post('tid');
	if($this->input->post('frvehicles')!='')
	  {
		$srcid = $this->input->post('frvehicles');
	  }
	  else
	  {
		 $srcid = $this->input->post('frsloc'); 
	  }

	  if($this->input->post('frsloc')!='')
	  {
		  $locid = $this->input->post('frsloc');
	  }
	  else
	  {
		  $locid = $this->input->post('sloc');
	  }

	  if($this->input->post('vehicles')!='')
	  {
		$recid = $this->input->post('vehicles');
	  }
	  else
	  {
		 $recid = $this->input->post('tosloc'); 
	  }

	  $getstock = $this->Common_model->get_table_row('site_locations', array('site_id' =>$srcid)); 
		//$prevstock = $getstock['init_barrel_stock'];
		$updprevstock = $getstock['upd_barrel_stock'];

	  $rcgetstock = $this->Common_model->get_table_row('site_locations', array('site_id' =>$recid));
	  	$rcprevstock = $rcgetstock['init_barrel_stock'];
		$rcupdprevstock = $rcgetstock['upd_barrel_stock'];

	  $upd_on = date('Y-m-d H:i:s');
	  //$trans_on = date('Y-m-d H:i:s');
	  $litprevqty = $this->input->post('litprevqty');
	  $litqty = $this->input->post('liters');
	  $finlitqty = $litprevqty - $litqty;
	  $metreading = $this->input->post('metreading');
	  if($this->input->post('tometreading')>0)
	  {
	  $tometreading = $this->input->post('tometreading');
	  }
	  else
	  {
	  $tometreading = $this->input->post('toprevodo');
	  }
	  $totmetreading = $metreading + $litqty;

	$data = array(  
					'trans_type' => 'DIST',  
					'source_id' => $srcid,  
					'source_type' => $this->input->post('source'),  
					'receiver_id' => $recid,   
					'receiver_type' => $this->input->post('fillto'), //vehicle type   
					'source_odometer' => $metreading,  
					'receiver_odometer' => $tometreading,    
					'litre_qty' => $litqty,    
					'driver_name' => $this->input->post('dname'),
					'fuel_fill_st' => $this->input->post('fuel_st'),
					'upd_date' => $upd_on, //-->need to create field;
					'trans_loc' => $locid
				);   
	//$this->db->insert('fuel_transactions',$data);
	$this->db->where('trans_id', $tid);
	$this->db->update('fuel_transactions', $data);

	/* Previous value update code */
	$updprev = $this->Common_model->get_transdata($tid);
	/* Previous value update code ends */


	  $src_id = explode('-',$srcid);
	  $src_id[0]; //vh_id
	  $src_id[1]; //table type HV or OV
	  $albet = array("HV", "OV");
	if(in_array($src_id[1], $albet)) {
	  $explode_id = explode('-',$srcid);
	  $explode_id[0]; //vh_id
	  $explode_id[1]; //table type HV or OV

	  if($explode_id[1] == 'OV')
	  {
		$data2 = array('st_upd_meter_reading' => $totmetreading,'st_current_fuel' => $finlitqty);
		$this->db->where('vh_id', $explode_id[0]);
		$this->db->update('own_vehicles', $data2);
	  }
	  elseif($explode_id[1] == 'HV')
	  {
		$data3 = array('st_upd_meter_reading' => $totmetreading,'st_current_fuel' => $finlitqty);
		$this->db->where('vh_id', $explode_id[0]);
		$this->db->update('hired_vehicles', $data3);
	  }
	}
	else
	  {
		$updstock = $updprevstock - $litqty;

		$data4 = array('upd_barrel_stock' => $updstock);
		$this->db->where('site_id', $srcid);
		$this->db->update('site_locations', $data4);
	  }
	  $vtype=''; // vehilce type declaration
	  $rec_id = explode('-',$recid);
	  $rec_id[0]; //vh_id
	  $rec_id[1]; //table type HV or OV
	  $albet = array("HV", "OV");
	if(in_array($rec_id[1], $albet)) {
	  $getlit = $this->Fueldistribution_model->getliterqty($recid,$vtype=''); // distribution to sect
	  $tofinlitqty = $getlit + $litqty;

	  $explode_id = explode('-',$recid);
	  $explode_id[0]; //vh_id
	  $explode_id[1]; //table type HV or OV

	  if($explode_id[1] == 'OV')
	  {
		$data2 = array('upd_meter_reading' => $tometreading,'current_fuel' => $tofinlitqty);
		$this->db->where('vh_id', $explode_id[0]);
		$this->db->update('own_vehicles', $data2);
	  }
	  elseif($explode_id[1] == 'HV')
	  {
		$data3 = array('upd_meter_reading' => $tometreading,'current_fuel' => $tofinlitqty);
		$this->db->where('vh_id', $explode_id[0]);
		$this->db->update('hired_vehicles', $data3);
	  }
	}
	else
	 {
		if($rcupdprevstock != 0)
		  { $updstock2 = $rcupdprevstock + $litqty; }
		  else
		  { $updstock2 = $rcprevstock + $litqty; }

		$data4 = array('upd_barrel_stock' => $updstock2);
		$this->db->where('site_id', $recid);
		$this->db->update('site_locations', $data4);
	  }

	  $this->session->set_flashdata('msg','Record updated.');
	  redirect('fueldistribution/list/1','refresh');
  }