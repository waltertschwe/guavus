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

	public function test($id = null) {
		$this->layout = 'viewlayout';
		$activity = array();
		
		$solution = $this->Solution->find('first',array('conditions'=>array('id'=>'20')));
		$solutionName = $solution['Solution']['name'];		
		$customerkey_id = 43;
		
		$customerData = $this->Customerkey->find('first',array('conditions'=>array('id'=>$customerkey_id)));
		$customerKey = $customerData['Customerkey']['accesskey'];
		
		$today = date('m-d-Y');
		
		$activity['Activity']['solution'] = $solutionName;
		$activity['Activity']['accesskey'] = $customerKey;
		$activity['Activity']['date'] = $today;
		
		
		if($this->Session->read('ActivityId')) {
			echo "key = " . $this->Session->read('ActivityId');
			$activityId = $this->Session->read('ActivityId');
			$activity = $this->Activity->find('first', array('conditions'=> array('id'=> $activityId)));
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
			
		} else {
			$this->Activity->save($activity);
			$lastId = $this->Activity->getLastInsertID();
			$this->Session->write('ActivityId', $lastId);
		}	
		
	}
	
	public function afterFilter() {
		//$this->Session->delete('Key');
	}
}