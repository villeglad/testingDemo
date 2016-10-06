<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FlashMessagesControllerTest extends TestCase
{
    public function testFlashMessageIsShownByVisit()
    {
        $this->visit('/show_flash')
             ->see('Flashy Title');
    }

    public function testFlashMessageIsShownByCall()
    {
        $response = $this->call('GET', '/show_flash');
        $this->assertSame(200, $response->status());
        $this->assertSessionHas('flash_message', ['message' => 'Hello LaraHel', 'title' => 'Flashy Title', 'level' => 'success']);
    }

    public function testFlashMessageLastsOnlyOneVisit()
    {
        $this->visit('/show_flash')
             ->see('Flashy Title')
             ->visit('/')
             ->dontSee('Flashy Title');
    }

    public function testFlashMessageLastsOnlyOneCall()
    {
        $response = $this->call('GET', '/show_flash');
        $this->assertSame(200, $response->status());
        $this->assertSessionHas('flash_message', ['message' => 'Hello LaraHel', 'title' => 'Flashy Title', 'level' => 'success']);
        $this->call('GET', '/');
        $this->assertSessionMissing('flash_message');
        $this->call('GET', '/show_flash');
        $this->assertSessionHas('flash_message');
    }
}
