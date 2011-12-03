<?php
namespace Dtc\DtcHousingBundle\Model;

class LoanInfo
{
    protected $amount;
    protected $downpayment;
    protected $principle;
    protected $interestRate;
    protected $lengthInYear;
    
    public function __construct($amount, $lengthInYear, $interestRate, $downpayment)
    {
    	$this->amount = $amount;
    	$this->lengthInYear= $lengthInYear;
    	$this->interestRate = $interestRate;
    	$this->downpayment = $downpayment;
    	$this->principle = $amount - $downpayment;
    }
    
	/**
	 * @return the $amount
	 */
	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * @return the $downpayment
	 */
	public function getDownpayment()
	{
		return $this->downpayment;
	}

	/**
	 * @return the $interestRate
	 */
	public function getInterestRate()
	{
		return $this->interestRate;
	}

	/**
	 * @return the $lengthInYear
	 */
	public function getLengthInYear()
	{
		return $this->lengthInYear;
	}

	/**
	 * @param field_type $amount
	 */
	public function setAmount($amount)
	{
		$this->amount = $amount;
	}

	/**
	 * @param field_type $downpayment
	 */
	public function setDownpayment($downpayment)
	{
		$this->downpayment = $downpayment;
	}

	/**
	 * @param field_type $interestRate
	 */
	public function setInterestRate($interestRate)
	{
		$this->interestRate = $interestRate;
	}

	/**
	 * @param field_type $lengthInYear
	 */
	public function setLengthInYear($lengthInYear)
	{
		$this->lengthInYear = $lengthInYear;
	}
	
	/**
	 * @return the $principle
	 */
	public function getPrinciple()
	{
		return $this->principle;
	}
}

