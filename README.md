# 誠冨寵物商行
<small>This repo is based on the laravel-inventory series by [@sanz]("https://github.com/sanz")</small>


<center>
<img src="https://imgur.com/LfwucBc.jpg" width="100%" height="50%" />
</center>

<center>
<a>
    <img src="https://img.shields.io/static/v1?label=build&message=Laravel&color=red">
</a>
<a>
    <img src="https://img.shields.io/static/v1?label=php&message=8&color=blue">
</a>
<a>
    <img src="https://img.shields.io/static/v1?label=download&message=150MB&color=inactive">
</a>
<a>
    <img src="https://img.shields.io/static/v1?label=license&message=MIT&color=sccess">
</a>

<h2 style="margin-top:1.3rem">中文。English</h4>

</center>



## About

本系統為庫存管理系統，主要與**Shopee**、**Uber eats**、**Foodpanda** API 進行串接。

<i>This system is an inventory management system, mainly connected with **Shopee**, **Ubereats**, **foodpanda** API。
</i>

## Installation
1. clone this repo 
2. ```composer install```
3. ```cp``` .env.example .env
4. ```php artisan migrate```
5. ```php artisan key:generate```
6. ```php artisan storage:link```


## Used
* laravel-inventory by [@sanz]("https://github.com/sanz")
* Enum by [@BenSampo]('https://github.com/BenSampo/laravel-enum)
* debug-bar by [@VictoRD11 ]("https://github.com/barryvdh/laravel-debugbar")
