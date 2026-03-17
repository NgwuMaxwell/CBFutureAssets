<?php
require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\Mail;

// Test email sending
try {
    Mail::raw('Test email', function($message) {
        $message->to('test@example.com')->subject('Test');
    });
    echo 'Email test completed successfully';
} catch (Exception $e) {
    echo 'Email test failed: ' . $e->getMessage();
}