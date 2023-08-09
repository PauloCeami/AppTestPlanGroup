# AppTestPlanGroup - pauloceami@gmail.com
Aplicação de test em laravel 8x


# Testando a aplicação da api AppTestPlanGroup
 
1 - instale o docker juntamente com o ultilitário do laradock 

2 - suba os containners usando os comandos :
docker-compose up -d nginx mysql phpmyadmin redis workspace

3 - entre dentro da pasta clonada do laradock via command line e execute 
docker-compose exec --user=laradock workspace bash

4 - clone o projeto :
https://github.com/PauloCeami/AppTestPlanGroup.git


5 - Para as requisições rest voce pode usar
thunderClient no vscode ou postman

6 - O consumo da api com os EndPoints para Produtos e Marcas voce pode ver a seguir :

+--------+-----------+---------------------------+------------------+------------------------------------------------------------+------------------------------------------+
| Domain | Method    | URI                       | Name             | Action                                                     | Middleware                               |
+--------+-----------+---------------------------+------------------+------------------------------------------------------------+------------------------------------------+
|        | GET|HEAD  | api/user                  |                  | Closure                                                    | api                                      |
|        |           |                           |                  |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | GET|HEAD  | api/v1/marcas             | marcas.index     | App\Http\Controllers\Api\MarcasController@index            | api                                      |
|        | POST      | api/v1/marcas             | marcas.store     | App\Http\Controllers\Api\MarcasController@store            | api                                      |
|        | GET|HEAD  | api/v1/marcas/{marca}     | marcas.show      | App\Http\Controllers\Api\MarcasController@show             | api                                      |
|        | PUT|PATCH | api/v1/marcas/{marca}     | marcas.update    | App\Http\Controllers\Api\MarcasController@update           | api                                      |
|        | DELETE    | api/v1/marcas/{marca}     | marcas.destroy   | App\Http\Controllers\Api\MarcasController@destroy          | api                                      |
|        | GET|HEAD  | api/v1/produtos           | produtos.index   | App\Http\Controllers\Api\ProdutosController@index          | api                                      |
|        | POST      | api/v1/produtos           | produtos.store   | App\Http\Controllers\Api\ProdutosController@store          | api                                      |
|        | GET|HEAD  | api/v1/produtos/{produto} | produtos.show    | App\Http\Controllers\Api\ProdutosController@show           | api                                      |
|        | PUT|PATCH | api/v1/produtos/{produto} | produtos.update  | App\Http\Controllers\Api\ProdutosController@update         | api                                      |
|        | DELETE    | api/v1/produtos/{produto} | produtos.destroy | App\Http\Controllers\Api\ProdutosController@destroy        | api                                      |
|        | GET|HEAD  | sanctum/csrf-cookie       |                  | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show | web                                      |
+--------+-----------+---------------------------+------------------+------------------------------------------------------------+------------------------------------------+
