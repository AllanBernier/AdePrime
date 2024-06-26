<?php

namespace App\Http\Controllers;


use App\Models\Document;
use App\Models\Printer;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DocumentStoreRequest;
use App\Events\MyEvent;

class DocumentController extends Controller
{
    public function store(DocumentStoreRequest $request,Printer $printer)
    {
       
        if ($printer){
            $file = $request->file('file');

            $document = Document::create([
                'name'=> $file->getClientOriginalName(),
                'mime_type' => $file->getClientMimeType(),
                'is_deleted' => false,
                'printer_id' => $printer
            ]);
            $request->file('file')->storeAs('/public/files',$document->id.'_'.$file->getClientOriginalName());

            MyEvent::dispatch($document->id, $printer);

            return $document;
        }
    }

    public function show(Request $request, Document $document){
        return Storage::download('/public/files/'.$document->id.'_'.$document->name);
    }
}
