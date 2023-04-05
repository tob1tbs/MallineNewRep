<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showList() {
        $show_list = [
            '30' => '30',
            '60' => '60',
            '90' => '90',
        ];

        return $show_list;
    }

    public function sortList() {
        $sort_list = [
            'DATE_NEW' => [
                'ge' => 'ახალ დამატებული',
                'en' => 'New date',
            ],
            'DATE_OLD' => [
                'ge' => 'ძველ დამატებული',
                'en' => 'Old date',
            ],
        ];

        return $sort_list;
    }


}
