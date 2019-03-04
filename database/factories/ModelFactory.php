<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'claudio',
        'username' => 'claudioSosa',//$faker->name,
        'email' => 'vicomser.claudio@gmail.com',//$faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'type' => 'admin'
    ];
});


$factory->define(App\Category::class,function(Faker\Generator $faker){
  return [
    'description' => $faker->username(),
    'user_id' => '1',
  ];
});

$factory->define(App\Brand::class,function(Faker\Generator $faker){
  return [
    'description' => $faker->username(),
    'marginReseller' => $faker->numberBetween($min=40,$max=60),
    'marginClient' => $faker->numberBetween($min=80,$max=120),
    'user_id' => '1',
  ];
});

$factory->define(App\Colour::class,function(Faker\Generator $faker){
  return [
    'description' => $faker->username(),
    'user_id' => '1',
  ];
});



$factory->define(App\Product::class,function(Faker\Generator $faker){
  return [
    'description' => $faker->username(),
    'priceCost' => $faker->numberBetween($min=250,$max=999),
    'priceReven' => $faker->numberBetween($min=1000,$max=1500),
    'priceClient' => $faker->numberBetween($min=1500,$max=2000),
    'marginReseller' => $faker->numberBetween($min=40,$max=60),
    'marginClient' => $faker->numberBetween($min=80,$max=120),
    //'special' => $faker->numberBetween($min=0,$max=1),
    'category_id' => $faker->numberBetween($min=1,$max=20),
    'brand_id' => $faker->numberBetween($min=1,$max=20),
    'colour_id' => $faker->numberBetween($min=1,$max=20),
  ];
});


$factory->define(App\Waist::class,function(Faker\Generator $faker){
  return [
    'description' => $faker->username(),
    'user_id' => '1',
  ];
});

$factory->define(App\Quantity::class,function (Faker\Generator $faker){
  return [
    'product_id'=>$faker->numberBetween($min=1,$max=20),
    'waist_id' => $faker->numberBetween($min=1,$max=5),
    'quantity' => $faker->numberBetween($min=1,$max=10),
    'user_id' => '1',
  ];
});

$factory->define(App\Sale::class,function (Faker\Generator $faker){
  return [
    'id' => '1',
    'date'=>$faker->dateTime($max = 'now', $timezone = null),
    'client_id' => $faker->numberBetween($min=1,$max=25),    
    'user_id' => '1',
  ];
});

$factory->define(App\Payment::class,function (Faker\Generator $faker){
  return [
    'id'=>$faker->numberBetween($min=1,$max=10),    
    'sale_id' => '1',    
    'type'=>'efectivo',
    'amount' => $faker->numberBetween($min = 500, $max = 4000)
  ];
});

$factory->define(App\SaleDetail::class,function (Faker\Generator $faker){
  return [
    'id'=>$faker->numberBetween($min=1,$max=20),
    'sale_id'=>'1',
    'product_id'=>$faker->numberBetween($min=1,$max=100),
    'waist_id' => $faker->numberBetween($min=1,$max=3),
    'quantity' => $faker->numberBetween($min=1,$max=3),
    'priceUnit' => $faker->numberBetween($min=1000,$max=1500),
    'total' => $faker->numberBetween($min=2000,$max=3000),    
  ];
});

$factory->define(App\Refund::class,function (Faker\Generator $faker){
  return [
    'id'=>$faker->numberBetween($min=1,$max=20),    
    'product_id'=>$faker->numberBetween($min=1,$max=20),
    'waist_id' => $faker->numberBetween($min=1,$max=5),
    'amount' => $faker->numberBetween($min=500,$max=1000),    
    'user_id' => '1'    
  ];
});


$factory->define(App\Image::class,function(Faker\Generator $faker){
  return [
    'product_id' => $faker->numberBetween($min=1,$max=20),
    'description' => '',    
    'user_id' => '1',
  ];
});
