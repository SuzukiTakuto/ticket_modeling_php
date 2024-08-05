<?php
    require_once './Movie/Movie.php';
    require_once './System/System.php';
    require_once './Customer/Customer.php';

    $ticketTypes = array("一般", "シニア", "学生(大・専)", "中・高生","幼児・小学生","障がい者(学生以上)","障がい者(高校生以下)");

    $movies = array(new Movie(1, '2024/8/3 12:00', 'Avengers'), new Movie(2, '2024/8/3 12:20', 'Captain America'), new Movie(3, '2024/8/3 18:00', 'Iron Man'), new Movie(4, '2024/8/3 22:30', 'Spider Man'));

    foreach($movies as $movie) {
        $movie->display();
    }
    $movieId = getValidMovie();

    $numberOfCustomers = getValidCustomerCount();
    
    $customers = [];
    for ($i = 1; $i <= $numberOfCustomers; $i ++) {
        foreach($ticketTypes as $index => $ticketType) {
            echo ($index + 1) . ": $ticketType\n";
        }
        $type = getValidType($i);

        $customers[] = new Customer($type);
    }

    $system = new System($numberOfCustomers, $movies[$movieId - 1], $customers);

    $price = $system->calculateTotalPrice();
    echo "料金は{$price}円です\n";


    function getValidMovie() {
        while (true) {
            echo "映画を選択してください（1-4の間の整数）: ";
            $input = trim(fgets(STDIN));
    
            if (!is_numeric($input)) {
                echo "エラー: 入力が数値ではありません。\n";
                continue;
            }
    
            $movieId = (int)$input;
    
            if ($movieId <= 0 || $movieId > 4) {
                echo "エラー: 有効な数字を入力してください。\n";
                continue;
            }
    
            return $movieId;
        }
    }

    function getValidCustomerCount() {
        while (true) {
            echo "人数を入力してください（1-100の間の整数）: ";
            $input = trim(fgets(STDIN));
    
            if (!is_numeric($input)) {
                echo "エラー: 入力が数値ではありません。\n";
                continue;
            }
    
            $numberOfCustomers = (int)$input;
    
            if ($numberOfCustomers <= 0) {
                echo "エラー: 人数は1以上の整数を入力してください。\n";
                continue;
            }
    
            return $numberOfCustomers;
        }
    }

    function getValidType($i) {
        while (true) {
            echo "{$i}人目のチケットの種類を入力してください: ";
            $input = trim(fgets(STDIN));
    
            if (!is_numeric($input)) {
                echo "エラー: 入力が数値ではありません。\n";
                continue;
            }
    
            $type = (int)$input;
    
            if ($type <= 0 || $type > 7) {
                echo "エラー: 有効な数字を入力してください。\n";
                continue;
            }
    
            return $type;
        }
    }
?>