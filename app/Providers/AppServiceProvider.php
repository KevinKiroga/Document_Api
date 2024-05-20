<?php

namespace App\Providers;


use App\Infrastructure\Interfaces\DocumentRepositoryInterface;
use App\Infrastructure\Interfaces\ProcesoRepositoryInterface;
use App\Infrastructure\Interfaces\TipoDocumentoRepositoryInterface;
use App\Infrastructure\Interfaces\TipoProcesoRepositoryInterface;
use App\Infrastructure\Repositories\DocumentRepository;
use App\Infrastructure\Repositories\ProcesoRepository;
use App\Infrastructure\Repositories\TipoDocumentoRepository;
use App\Infrastructure\Repositories\TipoProcesoRepository;
use App\Logic\Interfaces\DocumentServiceInterface;
use App\Logic\Interfaces\ProcesoServiceInterface;
use App\Logic\Interfaces\TipoDocumentoServiceInterface;
use App\Logic\Services\DocumentService;
use App\Logic\Services\ProcesoService;
use App\Logic\Services\TipoDocumentoService;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DocumentRepositoryInterface::class, DocumentRepository::class);
        $this->app->bind(DocumentServiceInterface::class, DocumentService::class);

        $this->app->bind(ProcesoRepositoryInterface::class, ProcesoRepository::class);
        $this->app->bind(ProcesoServiceInterface::class, ProcesoService::class);

        $this->app->bind(TipoDocumentoRepositoryInterface::class, TipoDocumentoRepository::class);
        $this->app->bind(TipoDocumentoServiceInterface::class, TipoDocumentoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
