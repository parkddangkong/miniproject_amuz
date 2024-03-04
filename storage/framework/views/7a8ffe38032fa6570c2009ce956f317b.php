<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($car->make); ?> <?php echo e($car->model); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        img {
            display: block;
            margin: 0 auto 20px;
            border-radius: 8px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            display: block;
            width: 200px;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0056b3;
        }

        .reservation-button {
            background-color: #ffa500;
        }

        .reservation-button:hover {
            background-color: #ff8000;
        }
        .main-button {
            background-color: #ffa500;
            color: white;
            padding: 15px 30px; /* 크기 조정 */
            font-size: 18px; /* 폰트 크기 조정 */
            border: none; /* 테두리 제거 */
            border-radius: 4px; /* 경계 둥글기 */
            margin: 20px auto; /* 상단에 자동 마진을 주어 중앙 정렬 */
            display: block; /* 블록 레벨 요소로 변경 */
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .main-button:hover {
            background-color: #ff8000;
        }
    </style>
</head>
<body>
    <div class="header">
        <button onclick="window.location='/'" class="main-button">메인 페이지로</button>
    </div>

    <div class="container">
        <h1><?php echo e($car->make); ?> <?php echo e($car->model); ?></h1>
        <p>차량번호: <?php echo e($car->registration_number); ?></p>
        <?php if($car->image): ?>
            <img src="<?php echo e(asset('images/' . $car->image)); ?>" alt="Car Image" style="width:200px;">
        <?php endif; ?>

        <h2>예약정보</h2>
        <?php if($car->reservations->isEmpty()): ?>
            <p>이 차에 대한 예약은 아직 없습니다.</p>
        <?php else: ?>
            <ul>
                <?php $__currentLoopData = $car->reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>예약 접수시간: <?php echo e($reservation->start_time); ?> 예약 마감시간: <?php echo e($reservation->end_time); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>

        <a class="reservation-button" href="<?php echo e(route('car_reservation.create', ['car_id' => $car->id])); ?>">이 차량 예약하기</a>
    </div>
</body>
</html>
<?php /**PATH D:\laravelAmuz\amuz\resources\views/car_show.blade.php ENDPATH**/ ?>