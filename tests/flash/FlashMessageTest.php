<?php

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
        $this->flashMessage->info('This is an info message', 'example title');
        $this->assertSessionHas('flash_message', ['message' => 'This is an info message', 'title' => 'example title', 'level' => 'info']);
    }

    public function testSuccessMessageIsCreated()
    {
        $this->flashMessage->success('You\'ve got lucky', 'example title');
        $this->assertSessionHas('flash_message', ['message' => 'You\'ve got lucky', 'title' => 'example title', 'level' => 'success']);
    }

    public function testErrorMessageIsCreated()
    {
        $this->flashMessage->error('Something went wrong', 'example title');
        $this->assertSessionHas('flash_message', ['message' => 'Something went wrong', 'title' => 'example title', 'level' => 'error']);
    }

    public function testWarningMessageIsCreated()
    {
        $this->flashMessage->warning('Are you sure, for really?', 'example title');
        $this->assertSessionHas('flash_message', ['message' => 'Are you sure, for really?', 'title' => 'example title', 'level' => 'warning']);
    }
}
