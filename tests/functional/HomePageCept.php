<?php
$I = new FunctionalTester($scenario);
$I->amOnPage('/');
$I->see('login');
$I->see('Become The Enlightened');
$I->see('Frogs Rule');
$I->see('Ingress');
