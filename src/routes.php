<?php


use Meeting\Core\Route;

Route::get('/meeting', ['MeetingController', 'index']);
Route::post('/meeting', ['MeetingController', 'save']);
Route::delete('/meeting', ['MeetingController', 'delete']);
