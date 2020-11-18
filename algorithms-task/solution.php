function solution(int $n){
    $a = ($n-1)/2;
    $result = 0;
    
    for ($a; $a>0; $a--) {
        $result += 8*$a*$a;
    }
    return $result;
}