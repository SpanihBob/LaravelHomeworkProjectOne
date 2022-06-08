<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // указываем имя таблицы с которой связывается модель
    protected $table = 'myview';
    public $timestamps = false;//избавляемся от временных меток, которые нам не нужны
}

// создаем файл контроллера NewsController.php в папке Controller