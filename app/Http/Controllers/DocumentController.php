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
    public function store(DocumentStoreRequest $request)
    {

        $printer = Printer::query()
        ->where("uuid","=",$request->printer)
        ->first();

        if ($printer){
            $file = $request->file('file');

            $document = Document::create([
                'name'=> $file->getClientOriginalName(),
                'mime_type' => $file->getClientMimeType(),
                'is_deleted' => false,
                'printer_id' => $printer
            ]);
            $request->file('file')->storeAs('/public/files',$document->uuid.'_'.$file->getClientOriginalName());

            event(new MyEvent($document->uuid, $printer->uuid));
            return $document;
        }
    }

    public function show(Request $request){
        $document = Document::query()
        ->where("uuid","=",$request->document_id)
        ->first();


        return Storage::download('/public/files/'.$document->uuid.'_'.$document->name);
    }
}
