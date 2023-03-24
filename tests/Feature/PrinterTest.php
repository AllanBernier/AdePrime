<?php

namespace Tests\Feature;

use function Pest\Laravel\post;
use App\Models\Documents;
use App\Models\Printer;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase; //this
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;



test("Je peut poster des imprimantes", function () {
        
        $response = $this->post('/printer', [
            'name' => 'Imprimante de Toto'
        ]);

        $response->assertStatus(201);

        $printer = Printer::where('name','Imprimante de Toto')->first();
        expect($printer->name)->toBe("Imprimante de Toto"); 
});



test("Je peut récupérer toutes les imprimantes", function () {

    $printers = Printer::factory(3)->create();

    $response = $this->get('/printer');
    $response->assertStatus(200);
});