<?php

namespace App\Controller;

use App\Battlefield\BattlefieldMapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TargetController extends AbstractController
{
    private BattlefieldMapper $mapper;

    public function __construct(BattlefieldMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @Route("/radar", name="radar", methods={"POST"})
     */
    public function radar(Request $request): JsonResponse {
        $inputData = json_decode((string) $request->getContent(), true);

        if (empty($inputData)) {
            $responseData = [
                "error" => "Empty input data."
            ];

            return new JsonResponse($responseData, Response::HTTP_BAD_REQUEST);
        }

        $battlefield = $this->mapper->map($inputData);

        if (!$battlefield->hasTargets()) {
            $responseData = [
                "error" => "No targets found. Please review your battlefield input data."
            ];

            return new JsonResponse($responseData, Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse($battlefield->nextTarget());
    }
}