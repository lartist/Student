<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Contracts\Translation\TranslatorInterface;
use App\Entity\Student;
use App\Entity\Departement;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Rest\Get("/student-list/{departementId}", name="app.api.student.list_departement", requirements={"departementId"="\d+"})
     * @Rest\View
     * @SWG\Response(
     *     response=200,
     *     description="Returns students in terms of the given department id",
     *     @Model(type=Student::class)
     * )
     * @SWG\Response(
     *     response=404,
     *     description="Ressource not found",
     * )
     * @SWG\Tag(name="Student")
     *
     */
    public function studentListByDepartement($departementId, TranslatorInterface $translator)
    {
        $departement = $this->getDoctrine()->getRepository(Departement::class)->find($departementId);
        if(!$departement){
            throw new NotFoundHttpException($translator->trans('app.departement.no_result'));
        }
        $students = $this->getDoctrine()->getRepository(Student::class)->findBy(array('departement' => $departement));

        return $students;
    }
}
