# Rombit Fade Bundle

## What?

Do you have customers not willing to pay for their site? 
Do you have trouble creating leverage to force them to pay?

We're here to HELP!

This bundle will automatically lower the opacity of your site to 0 over a certain period of time, until nothing is visible anymore. 
There's an API to start and stop the process so you can reset the opacity when the customer in question has paid their bills.

Idea for this bundle came from: Rik Lomas - https://twitter.com/riklomas/status/783305500750471168


## Installation

### Step 1: Composer
`composer install rombit/fade-bundle`

### Step2: Enable the bundle

Add to `AppKernel.php`:
```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Rombit\FadeBundle(),
        // ...
    );
}
```

### Step 3: Run your migrations or update your schema

If you use migrations: `app/console doctrine:migrations:diff`    
Or update your schema: `app/console doctrine:schema:update`


## API

We provide a few routes to remotely manage the fade-system:

### 1. /fade/start
Set opacity to 1 and start the countdown.     
Everyday, we will subtract 0.1 from the opacity until it is 0 after 10 days.

### 2. /fade/stop
Reset the opacity and stop the timer. 

### 3. /fade/up
Manually increase the opacity with 0.1

### 4. /fade/down
Manually decrease the opacity with 0.1


## Configuration


