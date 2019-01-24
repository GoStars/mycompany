<?php
    
    // Flash messages
    function flash($message) {
        session()->flash('message', $message);
    }