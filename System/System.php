<?php
    class System {
        private $ticketCount;
        private $selectedMovie;
        private $customers;

        function __construct($ticketCount, $selectedMovie, $customers) {
            $this->ticketCount = $ticketCount;
            $this->selectedMovie = $selectedMovie;
            $this->customers = $customers;
        }

        function calculateTotalPrice() {
            $totalPrice = 0;
            $isLateShow = $this->selectedMovie->isLateShow();
            $isWeekDay = $this->selectedMovie->isWeekDay();
            foreach($this->customers as $customer) {
                $totalPrice += $customer->calculatePrice($isLateShow, $isWeekDay);
            }
            return $totalPrice;
        }
    }
?>