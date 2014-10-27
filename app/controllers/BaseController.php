<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	 * Checks user input values against
	 * required rules.
	 */
	public function isValid($input, $model) {
		$validation = Validator::make($input, $model->inputRules);
		if($validation->passes())
			return true;
		$model->inputErrors = $validation->messages();
		return false;
	}

	/**
	* @return Object list()
	*/
	public function returnModelList($model, $column1, $column2, $orderByColumn = null) {
		if($orderByColumn)
			return $model->orderBy($orderByColumn)->lists($column1, $column2);
		return $model->lists($column1, $column2);
	}
	
	public function incrementViews($table, $row, $rowValue, $columnToIncrement = 'views') {
		//only increment if not admin user
		if(Auth::guest() || ! Auth::user()->group_id > 1) {
			DB::table($table)->where($row, '=', $rowValue)->increment($columnToIncrement);
		}
	}

}
