<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MAQEBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MAQEBot {string}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $string = $this->argument('string');
        $x = 0;
        $y = 0;
        $direction = "North";
        $total = 0;
        
        
        $regex = "~(?=[A-Z])~";
        $var = preg_split($regex, $string,-1,PREG_SPLIT_DELIM_CAPTURE);
        //$this->line(print_r($var));
        for ($i=1; $i < sizeof($var); $i++) {
            
            switch ($var[$i][0]) {
                    case "R":
                        $direction = self::changeRight($direction);
                        //echo $direction;
                        break;
                    case "L":
                        $direction = self::changeLeft($direction);
                        //echo $direction;
                        break;
                    case "W":
                        $walk = substr($var[$i], 1);
                        if($direction == 'North') {
                            $y = $y + $walk;
                        }
                        elseif ($direction == 'East') {
                            $x = $x + $walk;
                        }
                        elseif ($direction == 'South') {
                             $y = $y - $walk;
                        }
                        else {
                            $x = $x - $walk;
                        }
                        break;
                    
                }
        }
        
        $this->line("X: ". $x." Y: ".$y ." Direction: ".$direction);
       
    }

    private function changeRight($direction) {
        switch ($direction) {
                case "North":
                    $direction = "East";
                    break;
                case "East":
                    $direction = "South";
                     break;
                case "South":
                    $direction = "West";
                    break;
                case "West":
                    $direction = "North";
                    break;   
                }
        return $direction;
    }


    private function changeLeft($direction) {
        switch ($direction) {
                case "North":
                    $direction = "West";
                    break;
                case "West":
                    $direction = "South";
                     break;
                case "South":
                    $direction = "East";
                    break;
                case "East":
                    $direction = "North";
                    break;   
                }
        return $direction;
    }
}
