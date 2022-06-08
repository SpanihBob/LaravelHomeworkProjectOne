<?php

use Illuminate\Support\Facades\Route;       //подключаем работу с маршрутами (как import в REACT)
use Illuminate\Support\Facades\DB;          //прописываем включение работы с базой данных (как import в REACT)
use App\Http\Controllers\NewsController;    //опдключаем наш контроллер (ОБЯЗАТЕЛЬНО)

//для News
Route::get('/', [NewsController::class, 'table']);          //подключаем маршрут для таблицы
Route::get('/news/{id}', [NewsController::class, 'view']);  //маршрут выбора новости по id
Route::get('/updateform/{id}', [NewsController::class, 'updateform']);//маршрут выбора обновляемой новости по id

 
Route::get('/del/{id}', [NewsController::class, 'destroy']);    //удаление продукта из БД
Route::post('/update', [NewsController::class, 'update']);      //обновление новости в бд
Route::get('/createform', [NewsController::class, 'createform']);//форма создания новости
Route::post('/create', [NewsController::class, 'create']);       //создание новости в бд


