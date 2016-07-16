<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('/'));
});

// Register
Breadcrumbs::register('register', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Register', action('Auth\AuthController@register'));
});

// QuickStart
Breadcrumbs::register('quickstart', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Quick Start', route('quickstart'));
});

// FAQ
Breadcrumbs::register('faq', function ($breadcrumbs) {
   $breadcrumbs->parent('home');
    $breadcrumbs->push('Frequently Asked Questions', route('faq'));
});

//Agents
Breadcrumbs::register('agents', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Agents', route('agents.index'));
});

Breadcrumbs::register('profile', function ($breadcrumbs, $agent) {
    $breadcrumbs->parent('agents');
    $breadcrumbs->push($agent->agent, route('agents.show', $agent->agent));
});

Breadcrumbs::register('edit_profile', function ($breadcrumbs, $agent) {
    $breadcrumbs->parent('profile', $agent);
    $breadcrumbs->push('Update', route('user.edit', $agent->id));
});