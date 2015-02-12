<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Mississippi Enlightened</title>
        <style>
@import url(//fonts.googleapis.com/css?family=Lato:700);

body:before {
    position: absolute;
    content: '';
    left: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    background: -webkit-linear-gradient(right, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0) 1%, rgba(0, 0, 0, 0.1) 43%, rgba(0, 0, 0, 0.35) 71%, rgba(0, 0, 0, 0.5) 100%);
    background: linear-gradient(right, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0) 1%, rgba(0, 0, 0, 0.1) 43%, rgba(0, 0, 0, 0.35) 71%, rgba(0, 0, 0, 0.5) 100%);
}

body {
    margin: 0;
    font-family: 'Lato', sans-serif;
    text-align: center;
    background: #52B84A;
}

body:after {
    position: absolute;
    content: '';
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(6, 13, 32, 0.1);
}

.welcome {
    width: 300px;
    height: 200px;
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -150px;
    margin-top: -100px;
}

a, a:visited {
    text-decoration: none;
}

img {
    width: 300px;
}

h1 {
    font-size: 32px;
    margin: auto;
    color: #fff;
}
        </style>
    </head>
    <body>
        <div class="welcome">
            <a href="<?php URL::to('/') ?>" title="Mississippi Enlightened"><img src="images/ingress-cutout.png" alt="Mississippi Enlightened of Ingress"></a>
            <h1>Coming Soon</h1>
        </div>
    </body>
</html>
