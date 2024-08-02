<?php

namespace App\Exports;

use App\Models\Students;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentsExport implements FromView
{
    public function view(): View
    {
        return view('excel.export', [
            'students' => Students::all()
        ]);
    }

}
