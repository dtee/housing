<?php
namespace Dtc\DtcHousingBundle\App;

use Dtc\DtcHousingBundle\Model\LoanPaymentInfo;

use Dtc\DtcHousingBundle\Model\LoanInfo;

class LoanAmortizationCalculator
{
	public function getPayments(LoanInfo $loanInfo, $paymentsAYear = 12)
	{
		$p = $loanInfo->getPrinciple();
		$i = $loanInfo->getInterestRate();
		$l = $loanInfo->getLengthInYear();
		
		$j = $i / ($paymentsAYear * 100);	// interest in decimal form
		$n = $l * $paymentsAYear;			// number of months over which loan is amortized
		
		$perPayment = $p * ($j / (1 - pow((1 + $j), (-1 * $n))));
		$payments = array();
		for ($index = 0; $index <= $n; $index++)
		{
			$year = floor($index / $paymentsAYear) + 1;
			$interestPaid = $p * $j;
			$payment = new LoanPaymentInfo($index, $perPayment, $interestPaid, $p);
			
			$p = $payment->getPrincipleLeft();
			$payments[$year][] = $payment;
		}
		
		$yearlyPayments = array();
		foreach ($payments as $year => $yearPayments)
		{
			$perPayment = 0;
			$interestPaid = 0;
			$p = null;
			foreach ($yearPayments as $payment)
			{
				if ($p == null)
				{
					$p = $payment->getPrinciple();
				}
				
				$perPayment += $payment->getPayment();
				$interestPaid += $payment->getInterestPaid();
			}
			
			$yearlyPayments[$year] = new LoanPaymentInfo($year, $perPayment, $interestPaid, $p);
		}
		
		return $payments;
	}
}
