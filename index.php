<?php
require('object.php');
require('honda.php');
require('nissan.php');
require('ferrari.php');

if(isset($_POST['number']) && $_POST['number'] > 0) {
    $max = htmlspecialchars($_POST['number'], ENT_QUOTES);

    $honda_quant = rand(0, $max);
    $nissan_quant = rand(0, $max - $honda_quant);
    $ferrari_quant = $max - $honda_quant - $nissan_quant;
    
    print('<hr>');

    $total_honda = array();
    $total_nissan = array();
    $total_ferrari = array();

    for ($i=0; $i<$honda_quant; $i++) {
        $honda[$i] = new Honda();
        $honda_price = $honda[$i]->price;
        print($i+1 . '台目' . $honda[$i]->maker . '<br/>');
        print($honda_price . '<br/><br/>');
        $total_honda = $total_honda + array($i => $honda_price);
    }

    for ($i=0; $i<$nissan_quant; $i++) {
        $nissan[$i] = new Nissan();
        $nissan_price = $nissan[$i]->price;
        print($i+1 . '台目' . $nissan[$i]->maker . '<br/>');
        print($nissan_price . '<br/><br/>');
        $total_nissan = $total_nissan + array($i => $nissan_price);
    }

    for ($i=0; $i<$ferrari_quant; $i++) {
        $ferrari[$i] = new Ferrari();
        $ferrari_price = $ferrari[$i]->price;
        print($i+1 . '台目' . $ferrari[$i]->maker . '<br/>');
        print($ferrari_price . '<br/><br/>');
        $total_ferrari = $total_ferrari + array($i => $ferrari_price);
    }

    print('<hr>');

    $honda_total = array_sum($total_honda);
    $honda_average = $honda_total / $honda_quant;

    $nissan_total = array_sum($total_nissan);
    $nissan_average = $nissan_total / $nissan_quant;

    $ferrari_total = array_sum($total_ferrari);
    $ferrari_average = $ferrari_total / $ferrari_quant;

    print('Honda:合計：' . $honda_total . '円<br/>' . '平均：' . $honda_average . '円<br/><br/>');
    print('Nissan:合計：' . $nissan_total . '円<br/>' . '平均：' . $nissan_average . '円<br/><br/>');
    print('Ferrari:合計：' . $ferrari_total . '円<br/>' . '平均：' . $ferrari_average . '円<br/><br/>');

} else {
    print('件数を登録ください');
}
?>

<form action="" method="post">
<p>※登録数分の車がランダムで出力されます。<br/>また、各メーカー毎に車体価格の合計を計算します。</p>
<input type="number" name="number">
<input type="submit" value="登録">
</form>
