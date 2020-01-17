<?php
    namespace App\Http\Controllers\Template\Common;

    use App\Http\Controllers\Controller;

    class Header extends Controller
    {
        public function show($page_title = false)
        {
            return view('common.header', ['page_title' => $page_title]);
        }
    }