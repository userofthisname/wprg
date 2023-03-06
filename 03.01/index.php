<?php
    //z1.1
    echo "rzut kością:\n";
    echo rand(1, 12), "\n\n";

    //z1.2
    $radius=3;//$_POST["radius"]
    echo "średnica naszego koła:\n";

    echo Sr($radius) . "\n\n";

    function Sr($r) {
        $d=2*$r;
        return $d;
    }


    //z1.3

    $sentence="Zjadłbym lody, bo są smaczne.";//$_POST["sentence"]

    echo $sentence. "\n";
    echo Censore($sentence)."\n\n";

function Censore($sentence) {
    $banList=array(
        'smaczne' => '*******',
        'smaczniejsze' => '********'
    );

    $finalSentence= strtr($sentence, $banList);
    return $finalSentence;
}



//z1.4
//zakładamy osobę urodzoną w latach 1900-1999, nie chciało mi się robić warunków na pozostałe stulecia
    $pesel='02070803628';
    echo $pesel."\n";
    $year= substr($pesel, 0, 2);
    $month= substr($pesel, 2, 2);
    $day= substr($pesel, 4, 2);
    echo $day."-" . $month . "-19".$year."\n\n";

//z1.5
    $length=2;
    $height=4;
    $secondlength=3;//tylko dla trapezu
    $choice=0;
    echo 'pole wybranej fiugry:'."\n";
    switch ($choice) {
        case 0:
            echo triangle($length, $height);
            break;
        case 1:
            echo rectangle($length, $height);
            break;
        case 2:
            echo trapezium($length, $secondlength, $height);
            break;
        default:
            echo "?";
            break;
    }
function triangle($a, $h) {

    return ($a*$h)/2;
}
function rectangle($a, $h) {

    return ($a*$h);
}
function trapezium($a, $b, $h) {

    return ($a+$b*$h)/2;
}
echo "\n\n\n\n"
//




?>
