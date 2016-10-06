<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\FlashMessage;

class FlashMessageTest extends TestCase
{
    private $flashMessage;

    public function setUp()
    {
        parent::setUp();
        $this->flashMessage = new FlashMessage;
    }
    public function testInfoMessageIsCreated()
    {
        $this->flashMessage->info('example message', 'example title');
        $this->assertSessionHas('flash_message', ['message' => 'example message', 'title' => 'example title', 'level' => 'info']);
    }

    public function testSuccessMessageIsCreated()
    {
        $this->flashMessage->success('example message', 'example title');
        $this->assertSessionHas('flash_message', ['message' => 'example message', 'title' => 'example title', 'level' => 'success']);
    }

    public function testErrorMessageIsCreated()
    {
        $this->flashMessage->error('example message', 'example title');
        $this->assertSessionHas('flash_message', ['message' => 'example message', 'title' => 'example title', 'level' => 'error']);
    }

    public function testWarningMessageIsCreated()
    {
        $this->flashMessage->warning('example message', 'example title');
        $this->assertSessionHas('flash_message', ['message' => 'example message', 'title' => 'example title', 'level' => 'warning']);
    }
}
