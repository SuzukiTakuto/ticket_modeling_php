<?php 
    class Movie {
        private $id;
        private $date;
        private $time;
        private $title;

        function __construct($id, $dateTime, $title) {
            $this->id = $id;
            $this->date = explode(" ", $dateTime)[0];
            $this->time = explode(" ", $dateTime)[1];
            $this->title = $title;
        }

        function display() {
            echo "$this->id '$this->title' $this->date $this->time\n";
        }

        // レイトショー判定
        function isLateShow() {
            if (strtotime($this->time) >= strtotime('20:00')) return true;
            return false;
        }

        // 平日判定
        function isWeekDay() {
            $dayOfWeek = date('w', strtotime($this->date));
            if ($dayOfWeek > 0 & $dayOfWeek < 6) return true;
            return false;
        }
    }
?>