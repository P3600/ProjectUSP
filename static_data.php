<?php
    static $gb_text =  ' GB';
    static $mpx_text =  ' MPx';
    static $proc_text =  '-ядрен';
    static $inch_text =  '"';
    static $mah_text =  'mAh';


    static $ram_list = array( 
        12, 
        8, 
        6, 
        4, 
        3, 
        2, 
        1, 
        0.3, 
    );

    static $rom_list = array( 
        512, 
        256, 
        128, 
        64, 
        32, 
        16,
        8,
        1,
    );

    static $camera_list = array( 
        40, 
        25, 
        12, 
        8, 
        2, 
        0.03, 
        'Без', 
    );

    static $battery_list = array( 
        'До 2500 mAh', 
        'От 2501 mAh До 3000 mAh', 
        'От 3001 mAh До 3999 mAh', 
        'Над 4000 mAh',  
    );

    static $color_list = array( 
        'Бял', 
        'Черен', 
        'Червен', 
        'Син', 
        'Златист', 
        'Розов', 
        'Сребрист', 
    );

    static $processor_list = array( 
        8, 
        6, 
        4, 
        2, 
    );

    static $opsys_list = array( 
        'Android', 
        'iOS', 
        'Без операционна система'
    );

    static $man_list = array( 
        'HUAWEI', 
        'Xiaomi', 
        'Samsung', 
        'Nokia', 
        'Apple', 
        'LG'
    );

    static $display_list = array( 
        'До 4 "', 
        'От 4.6 " До 5 "', 
        'От 5.1 " До 5.5 "', 
        'От 5.6 " До 6 "', 
        'Над 6.1 "',  
    );

    $all_list = array(
        array(
            'name' => 'Операционна система',
            'input_name' => 'opsys',
            'list' => $opsys_list,
        ),
        array(
            'name' => 'Производител',
            'input_name' => 'manufacturer',
            'list' => $man_list,
        ),
        array(
            'name' => 'Дисплей',
            'input_name' => 'display',
            'list' => $display_list,
        ),
        array(
            'name' => 'Оперативна памет',
            'input_name' => 'ram',
            'list' => $ram_list,
        ),
        array(
            'name' => 'Вградена памет',
            'input_name' => 'rom',
            'list' => $rom_list,
        ),
        array(
            'name' => 'Камера',
            'input_name' => 'camera',
            'list' => $camera_list,
        ),
        array(
            'name' => 'Батерия',
            'input_name' => 'battery',
            'list' => $battery_list,
        ),
        array(
            'name' => 'Процесор',
            'input_name' => 'processor',
            'list' => $processor_list,
        ),
        array(
            'name' => 'Цвят',
            'input_name' => 'color',
            'list' => $color_list,
        )

    );

?>