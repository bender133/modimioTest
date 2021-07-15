<?php

use phpnt\chartJS\ChartJs;

// определение данных
$dataWeatherOne = [
    'labels' => ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
    'datasets' => [
        [
            'data' => [-14, -10, -4, 6, 17, 23, 22, 22, 13, 2, -5, -12],
            'label' =>  "Линейный график (tºC Урал).",
            'fill' => false,
            'lineTension' => 0.1,
            'backgroundColor' => "rgba(75,192,192,0.4)",
            'borderColor' => "rgba(75,192,192,1)",
            'borderCapStyle' => 'butt',
            'borderDash' => [],
            'borderDashOffset' => 0.0,
            'borderJoinStyle' => 'miter',
            'pointBorderColor' => "rgba(75,192,192,1)",
            'pointBackgroundColor' => "#fff",
            'pointBorderWidth' => 1,
            'pointHoverRadius' => 5,
            'pointHoverBackgroundColor' => "rgba(75,192,192,1)",
            'pointHoverBorderColor' => "rgba(220,220,220,1)",
            'pointHoverBorderWidth' => 2,
            'pointRadius' => 1,
            'pointHitRadius' => 10,
            'spanGaps' => false,
        ]
    ]
];
$dataWeatherTwo = [
    'labels' => ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",  "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
    'datasets' => [
        [
            'data' => [-14, -10, -4, 6, 17, 23, 22, 22, 13, 2, -5, -12],
            'label' =>  "График (tºC Урал).",
            'fill' => true,
            'lineTension' => 0.1,
            'backgroundColor' => "rgba(75,192,192,0.4)",
            'borderColor' => "rgba(75,192,192,1)",
            'borderCapStyle' => 'butt',
            'borderDash' => [],
            'borderDashOffset' => 0.0,
            'borderJoinStyle' => 'miter',
            'pointBorderColor' => "rgba(75,192,192,1)",
            'pointBackgroundColor' => "#fff",
            'pointBorderWidth' => 1,
            'pointHoverRadius' => 5,
            'pointHoverBackgroundColor' => "rgba(75,192,192,1)",
            'pointHoverBorderColor' => "rgba(220,220,220,1)",
            'pointHoverBorderWidth' => 2,
            'pointRadius' => 1,
            'pointHitRadius' => 10,
            'spanGaps' => false,
        ],
        [
            'data' => [8, 10, 11, 15, 21, 26, 28, 30, 26, 21, 16, 9],
            'label' =>  "График (tºC Сочи).",
            'fill' => true,
            'lineTension' => 0.1,
            'backgroundColor' => "rgba(255, 234, 0,0.4)",
            'borderColor' => "rgba(255, 234, 0,1)",
            'borderCapStyle' => 'butt',
            'borderDash' => [],
            'borderDashOffset' => 0.0,
            'borderJoinStyle' => 'miter',
            'pointBorderColor' => "rgba(255, 234, 0,1)",
            'pointBackgroundColor' => "#fff",
            'pointBorderWidth' => 1,
            'pointHoverRadius' => 5,
            'pointHoverBackgroundColor' => "rgba(255, 234, 0,1)",
            'pointHoverBorderColor' => "rgba(220,220,220,1)",
            'pointHoverBorderWidth' => 2,
            'pointRadius' => 1,
            'pointHitRadius' => 10,
            'spanGaps' => false,
        ]
    ]
];
$dataScatter = [
    'datasets' => [
        [
            'data' => [
                [
                    'x' => -10,
                    'y' => 0
                ], [
                    'x' => 0,
                    'y' => 10
                ], [
                    'x' => 10,
                    'y' => 5
                ],
            ],
            'label' => 'График рассеивания',
            'fill' => true,
            'lineTension' => 0.1,
            'backgroundColor' => "rgba(75,192,192,0.4)",
            'borderColor' => "rgba(75,192,192,1)",
            'borderCapStyle' => 'butt',
            'borderDash' => [],
            'borderDashOffset' => 0.0,
            'borderJoinStyle' => 'miter',
            'pointBorderColor' => "rgba(75,192,192,1)",
            'pointBackgroundColor' => "#fff",
            'pointBorderWidth' => 1,
            'pointHoverRadius' => 5,
            'pointHoverBackgroundColor' => "rgba(75,192,192,1)",
            'pointHoverBorderColor' => "rgba(220,220,220,1)",
            'pointHoverBorderWidth' => 2,
            'pointRadius' => 1,
            'pointHitRadius' => 10,
            'spanGaps' => false,
        ]
    ]
];
$dataPie = [
    'labels' => [
        "Красный",
        "Синий",
        "Желтый"
    ],
    'datasets' => [
        [
            'data' => [300, 50, 100],
            'backgroundColor' => [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ],
            'hoverBackgroundColor' => [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ]
        ]
    ]
];
$dataBubble = [
    'datasets' => [
        [
            'label' => 'Пузырьковый график',
            'data' => [
                [
                    'x' => 20,
                    'y' => 30,
                    'r' => 15
                ],
                [
                    'x' => 40,
                    'y' => 10,
                    'r' => 10
                ],
            ],
            'backgroundColor' =>"#FF6384",
            'hoverBackgroundColor' => "#FF6384",
        ]
    ]
];
// вывод графиков
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_LINE,
    'data'  => $dataWeatherOne,
    'options'   => []
]);
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_LINE,
    'data'  => $dataWeatherTwo,
    'options'   => []
]);
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_LINE,
    'data'  => $dataScatter,
    'options'   => [
        'scales' => [
            'xAxes' => [[
                'type' => 'linear',
                'position' => 'bottom'
            ]]
        ]
    ]
]);
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_BAR,
    'data'  => $dataWeatherOne,
    'options'   => []
]);
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_BAR,
    'data'  => $dataWeatherTwo,
    'options'   => []
]);
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_RADAR,
    'data'  => $dataWeatherOne,
    'options'   => []
]);
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_RADAR,
    'data'  => $dataWeatherTwo,
    'options'   => []
]);
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_POLAR_AREA,
    'data'  => $dataWeatherOne,
    'options'   => []
]);
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_POLAR_AREA,
    'data'  => $dataWeatherTwo,
    'options'   => []
]);
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_PIE,
    'data'  => $dataPie,
    'options'   => []
]);
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_DOUGHNUT,
    'data'  => $dataPie,
    'options'   => []
]);
echo ChartJs::widget([
    'type'  => ChartJs::TYPE_BUBBLE,
    'data'  => $dataBubble,
    'options'   => []
]);
