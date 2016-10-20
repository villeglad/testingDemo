<?php

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

    public function testNoFlashMessageWasShowed()
    {
        $response = $this->call('GET', '/show_flash', ['noflash' => '1']);
        $this->assertSame(200, $response->status());
        $this->assertSessionMissing('flash_message');
    }
}
