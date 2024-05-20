<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\DocumentRequest;
use App\Http\Responses\ApiResponse;

use App\Logic\Interfaces\DocumentServiceInterface;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Exception;

class DocumentController extends Controller
{
    // Variable para ser intermedario y llamar los metodos de la interfaz del servicio
    protected $documentService;

    // Inyeccion de dependencias
    public function __construct(DocumentServiceInterface $documentServiceI)
    {
        $this->documentService = $documentServiceI;
    }

    /**
     * Lista todos los documentos
     */
    public function index()
    {
        // Manejo de errores
        try {
            // Crea una variable y almacena todos los datos del documento
            $documents = $this->documentService->getAllDocuments();

            // Devuelve el JSON
            return ApiResponse::success('Lista de Documentos', 200, $documents);
        } 
        catch (Exception $e) {
            // Devuelve el JSON
            return ApiResponse::error("Ocurrio un error ", 500);
        }
    }

    /**
     * Crear un documento
     */
    public function store(DocumentRequest $request)
    {
        // Manejo de errores
        try {
            // Recibe lo que viene el REQUEST y lo envia al metodo de la interfaz del servicio
            $document = $this->documentService->createDocument($request->all());

            // Devuelve el JSON 200
            return ApiResponse::success('Documento creado', 200, $document);
        } 
        catch (ValidationException $e) { 
            // Devuelve el JSON 422
            return ApiResponse::error("Errores de validacion:" . $e->errors(), 422);
        }
    }

    /**
     * Mostrar un documento segun el id
     */
    public function show(string $id)
    {
        // Manejo de errores
        try {
            // Almacena un solo regitro de un documento en especifico
            $document = $this->documentService->getDocumentById($id);
   
            // Devuelve el JSON 200
            return ApiResponse::success('Documento', 200, $document);
        } 
        catch (ModelNotFoundException $e) {
            // Devuelve el JSON 404
            return ApiResponse::error("Documento no encontrado ", 404);
        }
    }

    /**
     * Actualiza un registro de un documento en especifico
     */
    public function update(DocumentRequest $request, string $id)
    {
        // Manejo de errores
        try {
            // Almacena lo que viene en el REQUEST y lo envia al metodo de la interfaz del servicio
            $document = $this->documentService->updateDocument($request->all(), $id);

            // Devuelve el JSON 200
            return ApiResponse::success('Documento actualizado', 200, $document);
        } 
        catch (ModelNotFoundException) {
            // Devuelve el JSON 404
            return ApiResponse::error("Documento no encontrado ", 404);
        }
        catch (ValidationException $e) {
            // Devuelve el JSON 422
            return ApiResponse::error("Errores de validacion:" . $e->errors(), 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Manejo de errores
        try {
            // Recibe el id para ser eliminado con el metodo de la interfaz del servicio
            $document = $this->documentService->deleteDocumentById($id);

            // Devuelve el JSON 200
            return ApiResponse::success('Documento eliminado', 200, $document);
        } catch (ModelNotFoundException $e) {
            // Devuelve el JSON 404
            return ApiResponse::error("Documento no encontrado", 404);
        }
    }
}
