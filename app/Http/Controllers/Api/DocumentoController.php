<?php

namespace App\Http\Controllers\Api;

use App\BusinessObject\Dtos\Requests\DocumentoRequest;
use App\BusinessObject\Dtos\Responses\ApiResponse;
use App\Http\Controllers\Controller;
use App\Logic\Interfaces\DocumentServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DocumentoController extends Controller
{
    protected $documentService;

    public function __construct(DocumentServiceInterface $documentService)
    {
        $this->documentService = $documentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $document = $this->documentService->getAllDocuments();

            if (count($document) == 0) {
                return ApiResponse::success('Lista de Documentos vacia', 200, []);
            }

            return ApiResponse::success('Lista de Documentos', 200, $document);
        } 
        catch (Exception $e) {
            return ApiResponse::error("Ocurrio un error ", 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentoRequest $request)
    {
        try {
            $document = $this->documentService->createDocument($request->all());
            return ApiResponse::success('Documento creado', 200, $document);
        } catch (ValidationException $e) {
            return ApiResponse::error("Errores de validacion:" . $e->errors(), 422);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $document = $this->documentService->getDocumentById($id);
            return ApiResponse::success('Documento', 200, $document);
        } 
        catch (ModelNotFoundException $e) {
            return ApiResponse::error("Documento no encontrado " , 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $document = $this->documentService->deleteDocumentById($id);
            return ApiResponse::success('Documento eliminado', 200, $document);
        } catch (ModelNotFoundException $e) {
            return ApiResponse::error("Documento no encontrado" , 404);
        }
    }
}