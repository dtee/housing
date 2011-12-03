<?php
namespace Dtc\DtcHousingBundle\Controller;

use Dtc\DtcHousingBundle\App\LoanAmortizationCalculator;

use Dtc\DtcHousingBundle\Model\LoanInfo;

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
    	$amount = 150000;
    	$lengthInYear = 30;
    	$interestRate = 2;		// in Percentage 1-100
    	$downpayment = $amount * .2;
    	
    	$loanInfo = new LoanInfo($amount, $lengthInYear, $interestRate, $downpayment);

    	$cal = new LoanAmortizationCalculator();
    	$cal->getPayments($loanInfo);
    	
    	v($loanInfo);
    	ve('you are in housing...');
    }
}
