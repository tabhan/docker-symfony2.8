<?php
/**
 * Created by IntelliJ IDEA.
 * User: tabhan
 * Date: 2018/5/26
 * Time: 3:13
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{max}", name="lucky_number")
     * @param $max int
     */
    public function numberAction($max = 100)
    {
        $number = mt_rand(0, $max);

        return $this->render('default/number.html.twig', ['number' => $number]);
    }
}