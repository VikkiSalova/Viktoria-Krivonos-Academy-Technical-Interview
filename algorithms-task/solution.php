function fileProcessor() {
    $cases = file('input.txt');
    $result = fopen("output.txt", "w");
    foreach($cases as $case){
        fwrite($result, solution($case));
    }
    fclose($result);
}

function solution(int $size){
    $steps = ($size-1)/2;
    $result = 0;
    
    for ($a; $a>0; $a--) {
        $result += 8*$a*$a;
    }
    return $result;
}