<?php

namespace App\Services;

class NetPayCalculationsService
{

    public $gross_salary;

    /**
     * Create a new class instance.
     */
    public function __construct($gross_salary)
    {
        $this->gross_salary = $gross_salary;
    }

    /**
     * Calculate EFKA contributions.
     *
     * @return float
     */
    public function calculateEfka()
    {
        $efkaRate = 0.1533; // Example EFKA rate (15.33%)
        return $this->gross_salary * $efkaRate;
    }

    public function calculateIncomeTax()
    {
        $income = $this->gross_salary * 14; // Assuming gross salary is monthly and we calculate for 14 months
        $tax = 0;

        if ($income <= 10000) {
            $tax = $income * 0.09; // 9% for income up to 10,000
        } elseif ($income <= 20000) {
            $tax = (10000 * 0.09) + (($income - 10000) * 0.22); // 22% for income between 10,001 and 20,000
        } elseif ($income <= 30000) {
            $tax = (10000 * 0.09) + (10000 * 0.22) + (($income - 20000) * 0.28); // 28% for income between 20,001 and 30,000
        } else {
            $tax = (10000 * 0.09) + (10000 * 0.22) + (10000 * 0.28) + (($income - 30000) * 0.28); // Extend for income above 30,000
        }

        return $tax;
    }

    public function calculateNetAnnualIncome()
    {
        // Calculate EFKA contributions (monthly * 14 months)
        $monthlyEfka = $this->calculateEfka();
        $annualEfka = $monthlyEfka * 14;

        // Calculate income tax
        $incomeTax = $this->calculateIncomeTax();

        // Calculate net income
        $netIncome = $this->gross_salary * 14 - $annualEfka - $incomeTax;

        return $netIncome;
    }

    public function calculateNetMonthlyIncome()
    {
        $netMonthlyIncome = $this->calculateNetAnnualIncome() / 14;
        return $netMonthlyIncome;
    }



}
