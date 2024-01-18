<?php

class Company {
    public $name;
    public $location;
    public $totEmployees = 0;
    public static $totalAvgAnnualWage = 0;
    public static $avgWage = 1500;

    public function __construct($_name, $_location, $_tot_employees)
    {
        $this->name = $_name;
        $this->location = $_location;
        $this->totEmployees = $_tot_employees;
    }
    
    public function PrintDescription() {
        if ($this->totEmployees > 1) {
            echo "The company $this->name is located in $this->location and has $this->totEmployees employees.\n";
        } else {
            echo "The company $this->name is located in $this->location and does not have employees.\n";
        }
    }

    public function AvgAnnualWage(){
        $avg_annual_wage = self::$avgWage * $this->totEmployees * 12 ;
        echo "$this->name's average annual spend is $avg_annual_wage\n";

        self::$totalAvgAnnualWage += $avg_annual_wage;
        
    }

    public function avgMonth($month){
        return self::$avgWage * $this->totEmployees * $month;
    }
    
    public static function PrintTotal () {
        echo "The total of all Avg Annual Wage is " .  self::$totalAvgAnnualWage . "\n";
    }
}

$companies = [
	new Company('Apple', 'Cupertino', 10000),
	new Company('Google', 'California', 20000), 
	new Company('Facebook', 'USA', 30000), 
	new Company('Amazon', 'Seattle', 40000), 
	new Company('Microsoft', 'Redmond', 50000)
	];
	
foreach ($companies as $company) {
    $company->PrintDescription();
    $company->AvgAnnualWage();
}

echo $companies[1] -> avgMonth(readline ("Su quanti mesi vuoi calcolare le spese? : ")) . "\n";


Company::PrintTotal();

