<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'hostelManagement/config.php');
	require_once(ROOT_DIR.'user/owner/model/model.php');

	class OwnerDetailsController{
		private $model;

		public function __construct(){
			$this->model = new Model();
		}

		public function invoke($owner_id){ //fetch owner details of corresponding owner_id
			
			$owner_details = $this->model->getOwnerDetails($owner_id);
			if(is_null($owner_details[0]))
				return null;
			else
				return $owner_details;
		}
	}
?>