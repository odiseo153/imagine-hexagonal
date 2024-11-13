<?php

return [
    App\Providers\AppServiceProvider::class,
    \App\User\UserServiceProvider::class,
    \App\Auth\AuthServiceProvider::class,
    \App\Size\SizeServiceProvider::class,
    \App\Category\CategoryServiceProvider::class,
    \App\Product\ProductServiceProvider::class,
    \App\Location\LocationServiceProvider::class,
    \App\Petition\PetitionServiceProvider::class,
];
