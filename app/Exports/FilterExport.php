<?php

namespace App\Exports;

use App\Models\Students;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FilterExport implements FromView
{
    protected $course;
    protected $status;
    protected $start_date;
    protected $end_date;

    function __construct($course, $status, $start_date, $end_date) {
        $this->course = $course;
        $this->status = $status;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function view(): View
    {
        return view('excel.export', [
            'students' => Students::where('id_course','=',$this->course)->where('status','=',(bool)$this->status)->whereBetween('created_at',[$this->start_date, $this->end_date])->get()
        ]);
    }

}
