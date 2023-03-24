<?php

namespace Tests\Feature;

use function Pest\Laravel\post;
use App\Models\Documents;
use App\Models\Printer;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase; //this
use Illuminate\Http\UploadedFile;


test("Jimprimante", function () {

        Storage::fake();
    
        $printer = Printer::factory()->create();
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post('/document', [
            'file' => $file,
            'printer' => $printer->uuid
        ]);

        $document = Documents::first();

        expect($document->name)->toBe("avatar.jpg"); 

        Storage::disk('avatars')->assertExists($printer->uuid."_".$file->hashName());
});