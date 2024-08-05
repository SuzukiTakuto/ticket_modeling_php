<?php 
    class Customer {
        private $ticketType;

        function __construct($type)
        {
            $this->ticketType = $type;
        }

        function getTicketType() {
            return $this->ticketType;
        }

        function calculatePrice($isLateShow, $isWeekDay) {
            if ($this->ticketType == 1) {
                if ($isLateShow) return 1500;
                return 2000;
            } elseif ($this->ticketType == 2) {
                return 1300;
            } elseif ($this->ticketType == 3) {
                return 1500;
            } elseif ($this->ticketType == 4) {
                return 1000;
            } elseif ($this->ticketType == 5) {
                return 1000;
            } elseif ($this->ticketType == 6) {
                return 1000;
            } elseif ($this->ticketType == 7) {
                return 900;
            }
        }
    }
?>