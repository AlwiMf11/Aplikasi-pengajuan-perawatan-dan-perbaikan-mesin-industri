<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class UserReport implements FromView
{
    use Exportable;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('excel.users', [
            'users' => $this->data
        ]);
    }
}
