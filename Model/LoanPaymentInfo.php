<?php
namespace Dtc\DtcHousingBundle\Model;

class LoanPaymentInfo
{
	protected $index;
	protected $principleLeft;
	protected $interestPaid;
	protected $principlePaid;
	protected $principle;
	protected $payment;
	
	public function __construct($index, $payment, $interestPaid, $principle)
	{
		$this->index = $index;
		$this->payment = $payment;
		$this->interestPaid = $interestPaid;
		$this->principle = $principle;
		$this->principlePaid = $payment - $interestPaid;
		$this->principleLeft = $principle - $this->principlePaid;
		
		if ($this->principleLeft < 0)
		{
			$this->principleLeft = 0;
		}
	}
	
	/**
	 * @return the $index
	 */
	public function getIndex()
	{
		return $this->index;
	}

	/**
	 * @return the $principleLeft
	 */
	public function getPrincipleLeft()
	{
		return $this->principleLeft;
	}

	/**
	 * @return the $interestPaid
	 */
	public function getInterestPaid()
	{
		return $this->interestPaid;
	}

	/**
	 * @return the $principlePaid
	 */
	public function getPrinciplePaid()
	{
		return $this->principlePaid;
	}

	/**
	 * @return the $payment
	 */
	public function getPayment()
	{
		return $this->payment;
	}
	/**
	 * @return the $principle
	 */
	public function getPrinciple()
	{
		return $this->principle;
	}

}