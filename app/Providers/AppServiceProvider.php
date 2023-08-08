<?php

namespace App\Providers;

use App\Http\Resources\ProdutoResource;
use App\Models\Produtos;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Repositories\Core\Eloquent\EloquentProdutoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}