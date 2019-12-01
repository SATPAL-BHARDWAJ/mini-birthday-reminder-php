<?php

class Birthday {
    private $birthDays;
    public $today;
    public $notifications;


    public function __construct() {
        $this->today = new DateTime('today');
        // for demo purpose we set harry's birthday for every day
        $this->birthDays = [
            'Harry' => $this->today->format('d-m').'-1991',
            'Simon' => '17-11-1997',
            'Jenifier' => '17-11-1993',
            'Sinrela' => '15-08-1991'
        ];
        $this->notifications = [];
        
    }

    public function birthReminder() {
        foreach ($this->birthDays as $name => $birthDay) {
            $birthDate = new DateTime($birthDay);
            
            if($this->compareDay($birthDate) && $this->compareMonth($birthDate)) {
            
                array_push($this->notifications, [
                    "age" => $birthDate->diff($this->today)->y,
                    "name" => $name,
                    "dob" => $birthDay
                ]);
            } 
        }
    }

    protected function compareDay($birthDate) {
        return $birthDate->format('d') == $this->today->format('d');
    }

    protected function compareMonth($birthDate) {
        return $birthDate->format('m') == $this->today->format('m');
    }
}