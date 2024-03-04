<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car List</title>
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

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        img {
            display: block;
            margin-top: 10px;
            border-radius: 4px;
        }

        .no-image {
            color: #999;
            font-style: italic;
        }

        .main-button {
            background-color: #ffa500; 
            color: white;
            padding: 12px 20px;
            font-size: 16px; 
            border: none;
            border-radius: 4px;
            display: block; 
            margin: 20px auto 40px; 
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
        <h1>차량 리스트</h1>
        <ul>
            <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('cars.show', $car->id)); ?>">
                        <?php echo e($car->make); ?> <?php echo e($car->model); ?> (<?php echo e($car->registration_number); ?>)
                    </a>
                    <?php if($car->image): ?>
                        <img src="<?php echo e(asset('images/' . $car->image)); ?>" alt="<?php echo e($car->make); ?> <?php echo e($car->model); ?>" style="width:100px; height:auto;">
                    <?php else: ?>
                        <span class="no-image">No image available</span>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</body>
</html>
<?php /**PATH D:\laravelAmuz\amuz\resources\views/car_list.blade.php ENDPATH**/ ?>