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
        // alternative way
        // 
        // $this->get('/show_flash')
        //      ->assertResponseOk()
        //      ->assertSessionHas('flash_message', [
        //         'message' => 'Hello LaraHel',
        //         'title' => 'Flashy Title',
        //         'level' => 'success'
        //     ]
        // );

        $this->visit('/show_flash')
             ->assertSessionHas('flash_message', [
                'message' => 'Hello LaraHel',
                'title' => 'Flashy Title',
                'level' => 'success'
            ]);
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
