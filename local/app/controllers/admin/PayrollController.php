<?php

class PayrollController extends \AdminBaseController {

    public function __construct()
    {
        parent::__construct();
        $this->data['attendanceOpen']  = 'active open';
        $this->data['pageTitle']       =  'Payroll';
    }

	
	public function index()
	{
		$this->data['attendances']          =   Attendance::all();
        $this->data['viewAttendanceActive'] =   'active';

        $this->data['date']     = date('Y-m-d');
        $this->data['employees']            =   Employee::where('status','=','active')->get();
        $this->data['leaves'] = Attendance::absentEveryEmployee();
		//echo '<pre>'; print_r($this->data); echo '</pre>';
		return View::make('admin.payroll.index', $this->data);
	}

}
