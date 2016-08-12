<?php
	include_once(ROOT_DIR.'user/owner/model/updateProfileModel.php');

	class UpdateProfileController{
		private $model;

		public function __construct(){
			$this->model = new UpdateProfileModel();
		}

		public function invoke($owner_details, $length){
			$result = $this->model->update($owner_details, $length);

			return $result;
		}
	}
?>