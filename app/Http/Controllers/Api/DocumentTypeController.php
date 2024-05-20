<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Logic\Interfaces\DocumentTypeServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class DocumentTypeController extends Controller
{
    // Variable para ser intermedario y llamar los metodos de la interfaz del servicio
    protected $documentTypeService;

    // Inyeccion de dependencias
    public function __construct(DocumentTypeServiceInterface $documentTypeServiceI)
    {
        $this->documentTypeService = $documentTypeServiceI;
    }

    /**
     * Lista todos los tipos de documentos
     */
    public function index()
    {
        // Manejo de errores
        try {
            // Crea una variable y almacena todos los datos del documento
            $documentTypes = $this->documentTypeService->getAllDocumentType();

            // Devuelve el JSON 200
            return ApiResponse::success('Tipos de Procesos', 200, $documentTypes);
        } 
        catch (Exception $e) {

            // Devuelve el JSON 500
            return ApiResponse::error("Ocurrio un error", 500);
        }
    }

    /**
     * Mostrar un tipo de documento
     */
    public function show($id)
    {
        // Manejo de errores
        try {
            // Almacena un solo regitro de un documento en especifico
            $documentType = $this->documentTypeService->getDocumentTypeById($id);

            // Devuelve el JSON 200
            return ApiResponse::success('Tipo de Proceso', 200, $documentType);
        } 
        catch (ModelNotFoundException $e) {
            // Devuelve el JSON 404
            return ApiResponse::error("Ocurrio un error", 404);
        }
    }
}
