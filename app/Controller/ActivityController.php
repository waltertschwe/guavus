<?php


class ActivityController extends AppController {
	
	public $components = array('Session');
	public $uses = array('Activity', 'Customerkey','Solution');
	
	public function beforeFilter() {
		
    }
	
	public function index() {
		
		$this->layout = 'viewlayout';
		$data = $this->Activity->find('all');	
		$this->set('data', $data);
	
	}

	public function logdata($id = null) {
		$this->layout = 'viewlayout';
		
		$activity = array(); 	
		$sessionid = $this->Session->id(session_id());
		
		if(empty($sessionid)) {
			$this->Session->start();
			$sessionid = $this->Session->id(session_id());
		} else {
			$activity = $this->Activity->find('first', array('conditions'=> array('sessionid'=> $sessionid)));
		}
		
		$activity['Activity']['sessionid'] = $sessionid;
		
		
		$solution = $this->Solution->find('first',array('conditions'=>array('id'=>'31')));
		$solutionName = $solution['Solution']['name'];		
		$customerkey_id = 47;
		
		$customerData = $this->Customerkey->find('first',array('conditions'=>array('id'=>$customerkey_id)));
		$customerKey = $customerData['Customerkey']['accesskey'];
		
		$today = date("Y-m-d"); 	
		
		$activity['Activity']['solution'] = $solutionName;
		$activity['Activity']['accesskey'] = $customerKey;
		$activity['Activity']['date'] = $today;
		
		if(isset($id)) {			
			switch($id) {
				case 1:
	        	    $activity['Activity']['isDownload'] = 1;
	      			break;
	  		    case 2:
	  			    $activity['Activity']['isSlide'] = 1;
	   			    break;
			    case 3:
			        $activity['Activity']['isDemo'] = 1;
	    			break;
				case 4:
					$activity['Activity']['isEmail'] = 1;
			}
		}
			
		
		$this->Activity->save($activity);
		
	}

	public function afterFilter() {
		//$this->Session->delete('Key');
	}
}
