<?php
namespace App;

class FlashMessage {

    private function create($message, $title = null, $level, $key = 'flash_message')
    {
        return session()->flash($key, [
            'title' => $title,
            'message' => $message,
            'level' => $level
        ]);
    }

    public function info($message, $title = null)
    {
        return $this->create($message, $title, 'info');
    }

    public function success($message, $title = null)
    {
        return $this->create($message, $title, 'success');
    }

    public function error($message, $title = null)
    {
        return $this->create($message, $title, 'error');
    }

    public function warning($message, $title = null)
    {
        return $this->create($message, $title, 'warning');
    }
}
