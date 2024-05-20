<?php

namespace App\Providers;


use App\Infrastructure\Interfaces\DocumentRepositoryInterface;
use App\Infrastructure\Interfaces\DocumentTypeRepositoryInterface;
use App\Infrastructure\Interfaces\ProcesoRepositoryInterface;
use App\Infrastructure\Interfaces\ProcessRepositoryInterface;
use App\Infrastructure\Interfaces\TipoDocumentoRepositoryInterface;
use App\Infrastructure\Interfaces\TipoProcesoRepositoryInterface;
use App\Infrastructure\Repositories\DocumentRepository;
use App\Infrastructure\Repositories\DocumentTypeRepository;
use App\Infrastructure\Repositories\ProcesoRepository;
use App\Infrastructure\Repositories\ProcessRepository;
use App\Infrastructure\Repositories\TipoDocumentoRepository;
use App\Infrastructure\Repositories\TipoProcesoRepository;
use App\Logic\Interfaces\DocumentServiceInterface;
use App\Logic\Interfaces\DocumentTypeServiceInterface;
use App\Logic\Interfaces\ProcesoServiceInterface;
use App\Logic\Interfaces\ProcessServiceInterface;
use App\Logic\Interfaces\TipoDocumentoServiceInterface;
use App\Logic\Services\DocumentService;
use App\Logic\Services\DocumentTypeService;
use App\Logic\Services\ProcesoService;
use App\Logic\Services\ProcessService;
use App\Logic\Services\TipoDocumentoService;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        /**
         * Aqui se agregan las interfaces, los servicios y repositorios
         * para poder inyectarlo en cualquier lugar del proyecto
         */

        $this->app->bind(DocumentRepositoryInterface::class, DocumentRepository::class);
        $this->app->bind(DocumentServiceInterface::class,    DocumentService::class);

        $this->app->bind(ProcessRepositoryInterface::class, ProcessRepository::class);
        $this->app->bind(ProcessServiceInterface::class, ProcessService::class);

        $this->app->bind(DocumentTypeRepositoryInterface::class, DocumentTypeRepository::class);
        $this->app->bind(DocumentTypeServiceInterface::class,    DocumentTypeService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
