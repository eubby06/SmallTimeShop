<?php

Event::listen('user.login', function($user)
{
    dd($user);
    
});