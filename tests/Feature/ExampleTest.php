<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response = $this->get('/biodata/list.html');
        $response->assertStatus(200);
        $response = $this->get('/biodata/pesan.html');
        $response->assertStatus(200);
    }



    // public function testForm()
    // {
    //     $this->visit('/biodata/store.html')
    //           ->type('Bagus', 'nama')
    //           ->type('SMK', 'sekolah')
    //           ->type('1999-02-10', 'tglLahir')
    //           ->type('LA Sucipto', 'alamat')
    //           ->type('Point Guard', 'posisi')
    //           ->press('Simpan')
    //           ->seePageIs('/biodata/list.html');
    // }

    // public function testExample()
    // {
    //     $this->assertTrue(true);
    // }
    //
    // public function testPageAvailability()
    // {
    //     $response = $this->call('get', '/');
    //
    //     $response->assertStatus(200);
    // }
}
