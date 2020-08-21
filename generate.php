<?php
$array = array(
    11 => 0,
    12 => 0,
    13 => 0,
    14 => 0,
    15 => 0,
    16 => 0,
    17 => 0,
    18 => 0,
    19 => 0,
    21 => 0,
    22 => 0,
    23 => 0,
    24 => 0,
    25 => 0,
    26 => 0,
    27 => 0,
    28 => 0,
    29 => 0,
    31 => 0,
    32 => 0,
    33 => 0,
    34 => 0,
    35 => 0,
    36 => 0,
    37 => 0,
    38 => 0,
    39 => 0,
    41 => 0,
    42 => 0,
    43 => 0,
    44 => 0,
    45 => 0,
    46 => 0,
    47 => 0,
    48 => 0,
    49 => 0,
    51 => 0,
    52 => 0,
    53 => 0,
    54 => 0,
    55 => 0,
    56 => 0,
    57 => 0,
    58 => 0,
    59 => 0,
    61 => 0,
    62 => 0,
    63 => 0,
    64 => 0,
    65 => 0,
    66 => 0,
    67 => 0,
    68 => 0,
    69 => 0,
    71 => 0,
    72 => 0,
    73 => 0,
    74 => 0,
    75 => 0,
    76 => 0,
    77 => 0,
    78 => 0,
    79 => 0,
    81 => 0,
    82 => 0,
    83 => 0,
    84 => 0,
    85 => 0,
    86 => 0,
    87 => 0,
    88 => 0,
    89 => 0,
    91 => 0,
    92 => 0,
    93 => 0,
    94 => 0,
    95 => 0,
    96 => 0,
    97 => 0,
    98 => 0,
    99 => 0
);

$i=1;
while($i<10){
    $bannedlist = array(
        1 => NULL,
        2 => NULL,
        3 => NULL,
        4 => NULL,
        5 => NULL,
        6 => NULL,
        7 => NULL,
        8 => NULL,
        9 => NULL
    );
    $j=1;
    while($j<10&&$j>0){
        if($bannedlist[$j]===NULL){
            $banned=array();
        }
        else{
            $banned=$bannedlist[$j];
        }
        $loop=True;
        while($loop==True){
            do{
                $n=rand(1,9);
            }while(in_array($n,$banned));
            $pre=sizeof($banned);
            for($m=1;$m<10;$m++){
                if($array[$i*10+$m]==$n || $array[$m*10+$j]==$n){
                    array_push($banned, $n);
                    break;
                }
                if($m==9){
                    $up=$i;
                    
                    for($m1=1;$m1<3;$m1++){
                        $left=$j;
                        $right=$j;
                        if($up>1 && $up<10 && ($up-1)%3!=0){
                            $up--;
                        }
                        else{
                            break;
                        }
                        for($m2=1;$m2<3;$m2++){
                            if($left>1 && $left<10 && ($left-1)%3!=0){
                                $left--;
                                if($array[$up*10+$left]==$n){
                                    array_push($banned, $n);
                                    break 2;
                                }
                            }
                            if($right>0 && $right<9 && $right%3!=0){
                                $right++;
                                if($array[$up*10+$right]==$n){
                                    array_push($banned, $n);
                                    break 2;
                                }
                            }
                        }
                    }
                }
            }
            
            if(sizeof($banned)==9){
                //echo $i.','.$j.'banned:'.implode(",",$banned).'<br>';
                if($j==1){
                    for($o=1;$o<10;$o++){
                        $array[($i-1)*10+$o]=0;
                        $array[($i)*10+$o]=0;
                    }
                    $i-=2;
                    $j=11;
                    $loop=False;
                    break;
                }
                $bannedlist[$j]=NULL;
                $j=$j-2;
                break;
            }
            if($pre==sizeof($banned)){
                $loop=False;
                $bannedlist[$j]=$banned;
                $array[$i*10+$j]=$n;
            }
        }
        $j++;
    }
    $i++;
}

for($i=1;$i<10;$i++){
    for($j=1;$j<10;$j++){
        echo $array[$i*10+$j].' ';
    }
    echo '<br>';
}
?>