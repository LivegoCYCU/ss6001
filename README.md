# 誠冨寵物商行
<small>This repo is based on the laravel-inventory series by <a href="https://github.com/sanz">@sanz</a></small>


<center>
<img src="https://imgur.com/LfwucBc.jpg" width="100%" height="50%" />
</center>

<figure class="third">
<img src="https://img.shields.io/static/v1?label=build&message=Laravel&color=red"> <img src="https://img.shields.io/static/v1?label=php&message=8&color=blue"> <img src="https://img.shields.io/static/v1?label=download&message=150MB&color=inactive"> <img src="https://img.shields.io/static/v1?label=license&message=MIT&color=sccess"> </figure>





<center>
    <h2 style="margin-top:1.3rem">中文．English</h4>
</center>



## About

本系統為庫存管理系統，主要與**Shopee**、**Uber eats**、**Foodpanda** API 進行串接。

<i>This system is an inventory management system, mainly connected with **Shopee**, **Ubereats**, **foodpanda** API。
</i>

## Installation
1. clone this repo 
2. ```composer install``` or ```composer install --ignore-platform-reqs```
3. ```cp``` .env.example .env
<!-- 4. ```barryvdh/laravel-debugbar:^2.1 ``` -->
5. ```php artisan migrate```
6. ```php artisan key:generate```
7. ```php artisan storage:link```


## Used
* laravel-inventory by <a href="https://github.com/sanz">@sanz</a>
* Enum by  <a href="https://github.com/BenSampo/laravel-enum">@BenSampo</a>
* debug-bar by <a href="https://github.com/barryvdh/laravel-debugbar">@VictoRD11</a>
