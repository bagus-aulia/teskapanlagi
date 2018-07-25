<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class BiodataTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testFile()
    {
        Storage::fake('bio');

        $response = $this->json('POST', '/biodata/store', [
            'bio' => UploadedFile::fake()->create('bio-12122012121212.txt', 1)
        ]);

        // Assert the file was stored...
        //Storage::disk('local')->assertExists('bio/bio-12122012121212.txt');

        // Assert a file does not exist...
        Storage::disk('local')->assertMissing('bio/bio.txt');
    }
}
