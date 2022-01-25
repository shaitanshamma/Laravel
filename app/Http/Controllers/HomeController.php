<?php

namespace Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        return view('layouts/news/main');
    }
}
