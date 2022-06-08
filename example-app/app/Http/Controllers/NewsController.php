<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;          //подключаем Request
// подключаем модель в контроллер
use App\Models\News;


class NewsController extends Controller
{
    public function table()
    {
        // берем все из модели News.php
        $result = News::all();
        // возвращаем файл news.blade.php и выводим все столбцы из таблицы в результат
        return view('news', ['multinews'=>$result]);
    }

    public function view($id) //таблица выводится с запросом по id
    {
        // берем все из модели Product.php
        $result = News::where('id', $id) -> get();
        // возвращаем файл Product.blade.php и выводим все столбцы из таблицы в результат
        return view('selectnews', ['multinews'=>$result]);
    }

    public function updateform($id) //таблица выводится с запросом по id
    {
        // берем все из модели news.php
        $result = News::where('id', $id) -> get();
        // возвращаем файл changenews.blade.php и выводим все столбцы из таблицы в результат
        return view('changenews', ['multinews'=>$result]);
    }
    
    public function update(Request $req)//функция обновления update от входящего запроса(Request $req)
    {
        //return response()->json($req);//переводит форму в json (для понимания)
        //теперь надо данные БД изменить на наши данные
        //обращаемся к модели и получаем данные из таблици view
        if($req->hasFile('Image'))                  //проверка на существование файла, в качестве аргумента - идентификатор поля
            {
                $file = $req->file('Image')->store('uploads/img','public');     //сохраняем файл на сервер по пути storage/app/public/;           //запись обьекта файла в переменную
            }                                                                   //1 параметр - папка в кот сохраняем файл
                                                                                //2 параметр - используемый диск                                                                                                                                              
        
        $result = News::where('id', $req->id)
        ->update([
            'View'=>$req->View, 
            'FullView'=>$req->FullView,
            'Image'=>$file
        ]);
        //возвращаем таблицу, указывая имя маршрута с таблицей
        return redirect('http://127.0.0.1:8000/');  //функция redirect() создает переадресацию на ссылку или файл        
    }

    public function createform()
    {
        return view('createnews');
    }

    public function create(Request $req)    //функция создания новости
    {
        if($req->hasFile('Image'))                  //проверка на существование файла, в качестве аргумента - идентификатор поля
            {
                $file = $req->file('Image')->store('uploads/img','public');     //сохраняем файл на сервер по пути storage/app/public/;           //запись обьекта файла в переменную
            }                                                                   //1 параметр - папка в кот сохраняем файл
                                                                                //2 параметр - используемый диск                                                                                                                                              
        $result = News::insertGetId([
            'View'=>$req->View, 
            'FullView'=>$req->FullView,
            'Image'=>$file
        ]);
        return redirect('http://127.0.0.1:8000/');  //функция redirect() создает переадресацию на ссылку или файл  
    }
    

    public function destroy($id)
    {
        $article = News::where('id', '=', $id)->delete();
        //возвращаем таблицу, указывая имя маршрута с таблицей
        return redirect('http://127.0.0.1:8000/');  //функция redirect() создает переадресацию на ссылку или файл        
    }

    

}