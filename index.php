<?php

class Company {
    public $name;
    public $location;
    public $totEmployees = 0;

    public static $TotalCompanies = 0;
    public static $TotalEmployeesOfAllCompanies = 0;
    public static $totalAvgAnnualWage = 0;
    public static $avgWage = 1500;

    public function __construct($_name, $_location, $_tot_employees)
    {
        $this->name = $_name;
        $this->location = $_location;
        $this->totEmployees = $_tot_employees;

        self::$TotalEmployeesOfAllCompanies += $this->totEmployees;
        self::$TotalCompanies++;
        
    }
    
    public function PrintDescription() {
        if ($this->totEmployees > 1) {
            echo "The company $this->name is located in $this->location and has $this->totEmployees employees.\n";
        } else {
            echo "The company $this->name is located in $this->location and does not have employees.\n";
        }
    }

    public function AvgAnnualWage(){
        $avg_annual_wage = (self::$avgWage * $this->totEmployees) * 12 ;
        echo "$this->name's average annual spend is $avg_annual_wage\n";

        self::$totalAvgAnnualWage += $avg_annual_wage;
        
    }
    
    public static function PrintTotal () {
        echo "The total of all companies is " .  self::$TotalCompanies . "\n";
        echo "The total of all employees is " .  self::$TotalEmployeesOfAllCompanies . "\n";
        echo "The total of all Avg Annual Wage is " .  self::$totalAvgAnnualWage . "\n";
    }
}

$company1 = new Company('Apple', 'Cupertino', 10000);
$company2 = new Company('Google', 'California', 20000);
$company3 = new Company('Facebook', 'USA', 30000);
$company4 = new Company('Amazon', 'Seattle', 40000);
$company5 = new Company('Microsoft', 'Redmond', 50000);


$Companies = [$company1, $company2, $company3, $company4, $company5];
foreach ($Companies as $Company) {
    $Company->PrintDescription();
    $Company->AvgAnnualWage();
}

Company::PrintTotal();


