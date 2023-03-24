<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use Illuminate\Http\Request;
use App\Http\Requests\PrinterStoreRequest;


class PrinterController extends Controller
{

    public function store(PrinterStoreRequest $request)
    {
        return Printer::create($request->validated());
    }


    public function index()
    {
        return Printer::all();
    }
}
