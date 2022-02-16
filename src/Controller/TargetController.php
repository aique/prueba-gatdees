<?php

namespace App\Controller;

use App\Battlefield\BattlefieldMapper;
use App\Battlefield\Serialization\TargetSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TargetController extends AbstractController
{
    private BattlefieldMapper $mapper;
    private TargetSerializer $targetSerializer;

    public function __construct(
        BattlefieldMapper $mapper,
        TargetSerializer $targetSerializer
    ) {
        $this->mapper = $mapper;
        $this->targetSerializer = $targetSerializer;
    }

    /**
     * @Route("/radar", name="radar", methods={"POST"})
     */
    public function radar(Request $request): JsonResponse
    {
        $inputData = json_decode((string) $request->getContent(), true);

        if (empty($inputData)) {
            return $this->createBadRequestResponse(
                'Empty input data'
            );
        }

        try {
            $battlefield = $this->mapper->map($inputData);
        } catch (\Exception $ex) {
            return $this->createBadRequestResponse(
                $ex->getMessage()
            );
        }

        $nextTarget = $battlefield->nextTarget();

        if (empty($nextTarget)) {
            return $this->createBadRequestResponse(
                'Next target not found'
            );
        }

        $content = $this->targetSerializer->serialize(
            $nextTarget
        );

        return new JsonResponse($content);
    }

    private function createBadRequestResponse(string $message): JsonResponse
    {
        $responseData = [
            "error" => $message,
        ];

        return new JsonResponse($responseData, Response::HTTP_BAD_REQUEST);
    }
}
