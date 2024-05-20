<?php

namespace App\Logic\Services;

use App\Infrastructure\Interfaces\DocumentRepositoryInterface;
use App\Infrastructure\Interfaces\DocumentTypeRepositoryInterface;
use App\Infrastructure\Interfaces\ProcessRepositoryInterface;
use App\Logic\Interfaces\DocumentServiceInterface;
use App\Utils\GeneratorNumber;


/***
 * Esta clase va hacer el intermedario del repositorio hacia el controlador controlador
 * y es donde esta la logica del sistema
 */
class DocumentService implements DocumentServiceInterface
{
    // Se define las variables para llamar los metodos de la interfaz del repositorio
    protected $documentRepository;
    protected $processRepository;
    protected $documentTypeRepository;

    // Constructor para inyectar
    public function __construct(
        DocumentRepositoryInterface $documentRepositoryI,
        ProcessRepositoryInterface $processRepositoryI,
        DocumentTypeRepositoryInterface $documentTypeRepositoryI
    ) {
        $this->documentRepository = $documentRepositoryI;
        $this->processRepository = $processRepositoryI;
        $this->documentTypeRepository = $documentTypeRepositoryI;
    }

    /**
     * Este metodo es para listar todos los documentos
     */
    public function getAllDocuments()
    {
        return $this->documentRepository->getAll();
    }

    /**
     * Este metodo es para mostrar un documento en especifico
     */
    public function getDocumentById($id)
    {
        return $this->documentRepository->getById($id);
    }

    public function deleteDocumentById($id)
    {
        return $this->documentRepository->deleteById($id);
    }

    /**
     * Este metodo es para crea un documento
     */
    public function createDocument(array $data)
    {
        $documentType = $this->documentTypeRepository->getById($data['doc_id_tipo']);
        $prefixDocumentTyoe = $documentType->tip_prefijo;

        $process = $this->processRepository->getById($data['doc_id_proceso']);
        $prefixProcess = $process->pro_prefijo;

        $codeCalculate = $this->calculateCodeDocument($prefixProcess, $prefixDocumentTyoe);
        $data['doc_codigo'] = $codeCalculate;

        return $this->documentRepository->save($data);
    }

    /**
     * Este metodo es para actualizar un documento
     */
    public function updateDocument(array $data, $id)
    {
        $documentType = $this->documentTypeRepository->getById($data['doc_id_tipo']);
        $prefixDocumentTyoe = $documentType->tip_prefijo;

        $process = $this->processRepository->getById($data['doc_id_proceso']);
        $prefixProcess = $process->pro_prefijo;


        $codeCalculate = $this->calculateCodeDocument($prefixProcess, $prefixDocumentTyoe);
        $data['doc_codigo'] = $codeCalculate;

        return $this->documentRepository->update($data, $id);
    }

    /**
     * Este metodo es para calcular el codigo del documento
     */
    private function calculateCodeDocument($prefixProcess, $prefixDocumentTyoe)
    {
        do {
            $numeroRandom = new GeneratorNumber();
            $codeDocumento = $prefixDocumentTyoe . '-' . $prefixProcess . '-' . $numeroRandom->generarNumberRandom();

            $documents = $this->documentRepository->getAll();
            $documentCodes = $documents->pluck('doc_codigo');

        } while ($documentCodes->contains($codeDocumento));
        return $codeDocumento;
    }
}
