<?php
$html_Array = array(
    'Кнопка 10',
    'Кнопка 9',
    'Кнопка 8',
    'Кнопка 7',
    'Кнопка 6',
    'Кнопка 5',
    'Кнопка 4',
    'Кнопка 3',
    'Кнопка 2',
    'Кнопка 1',

);

$sort_Array = array_reverse($html_Array);

echo "<ul>";
foreach ($sort_Array as $item) {
    echo '<li><a href="#">'.$item.'</a></li>';

}
echo "</ul>";