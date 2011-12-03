<?php
namespace Dtc\HousingBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HousingController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        ve('you are in housing...');
    }
}
