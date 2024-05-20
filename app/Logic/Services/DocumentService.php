<?php

namespace App\Logic\Services;

use App\Infrastructure\Interfaces\DocumentRepositoryInterface;
use App\Infrastructure\Interfaces\ProcesoRepositoryInterface;
use App\Infrastructure\Interfaces\TipoDocumentoRepositoryInterface;
use App\Logic\Interfaces\DocumentServiceInterface;
use App\Utils\GeneratorNumber;



class DocumentService implements DocumentServiceInterface
{
    protected $documentRepository;
    protected $procesoRepository;
    protected $tipoDocumentoRepository;

    public function __construct(
        DocumentRepositoryInterface $documentRepository,
        ProcesoRepositoryInterface $procesoRepository,
        TipoDocumentoRepositoryInterface $tipoDocumentoRepository
    ) {
        $this->documentRepository = $documentRepository;
        $this->procesoRepository = $procesoRepository;
        $this->tipoDocumentoRepository = $tipoDocumentoRepository;
    }

    public function getAllDocuments()
    {
        return $this->documentRepository->getAll();
    }

    public function getDocumentById($id)
    {
        return $this->documentRepository->getById($id);
    }

    public function deleteDocumentById($id)
    {
        return $this->documentRepository->deleteById($id);
    }

    public function createDocument(array $data)
    {
        $tipoDocumento = $this->tipoDocumentoRepository->getById($data['doc_id_tipo']);
        $prefijoTipoDocumento = $tipoDocumento->tip_prefijo;

        $procesoInfo = $this->procesoRepository->getById($data['doc_id_proceso']);
        $prefijoProceso = $procesoInfo->pro_prefijo;

        $codigoReCalculado = $this->calculateCodeDocument($prefijoProceso, $prefijoTipoDocumento);
        $data['doc_codigo'] = $codigoReCalculado;

        return $this->documentRepository->save($data);
    }

    public function updateDocument(array $data, $id)
    {
        $tipoDocumento = $this->tipoDocumentoRepository->getById($data['doc_id_tipo']);
        $prefijoTipoDocumento = $tipoDocumento->tip_prefijo;

        $procesoInfo = $this->procesoRepository->getById($data['doc_id_proceso']);
        $prefijoProceso = $procesoInfo->pro_prefijo;


        $codigoReCalculado = $this->calculateCodeDocument($prefijoProceso, $prefijoTipoDocumento);
        $data['doc_codigo'] = $codigoReCalculado;

        return $this->documentRepository->update($data, $id);
    }

    private function calculateCodeDocument($prefijoProceso, $prefijoTipoDocumento)
    {
        do {
            $numeroRandom = new GeneratorNumber();
            $codigoDocumento = $prefijoTipoDocumento . '-' . $prefijoProceso . '-' . $numeroRandom->generarNumberRandom();

            $document = $this->documentRepository->getAll();
            $documentCodes = $document->pluck('doc_codigo');

        } while ($documentCodes->contains($codigoDocumento));
        return $codigoDocumento;
    }
}
