<?php

namespace App\Controller;

use App\AttackStrategy\AttackStrategySerializer;
use App\Battlefield\BattlefieldMapper;
use App\Error\InvalidBattlefieldInputDataException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TargetController extends AbstractController
{
    private BattlefieldMapper $mapper;
    private AttackStrategySerializer $attackStrategySerializer;

    public function __construct(
        BattlefieldMapper $mapper,
        AttackStrategySerializer $attackStrategySerializer
    ) {
        $this->mapper = $mapper;
        $this->attackStrategySerializer = $attackStrategySerializer;
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
            $attackStrategy = $this->attackStrategySerializer->deserialize($inputData);
            $battlefield->prioritizeTargets($attackStrategy);
        } catch (InvalidBattlefieldInputDataException $ex) {
            return $this->createBadRequestResponse(
                $ex->getMessage()
            );
        }

        if (!$battlefield->hasTargets()) {
            return $this->createBadRequestResponse(
                'No targets found, please, review your battlefield input data'
            );
        }

        return new JsonResponse($battlefield->nextTarget());
    }

    private function createBadRequestResponse(string $message): JsonResponse
    {
        $responseData = [
            "error" => $message,
        ];

        return new JsonResponse($responseData, Response::HTTP_BAD_REQUEST);
    }
}
