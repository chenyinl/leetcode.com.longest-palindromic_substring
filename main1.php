class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $this->len = strlen($s);
        // only one char
        if($this->len==1){
            return $s;
        }
        $this->s = $s;
        $this->max_len=1;
        $this->ans = $this->s[0];
        for ($i=0; $i<$this->len-1; $i++){
            $this->get_pal( $i+1, $i+1); //odd
            $this->get_pal($i+1, $i); //even
        }
        return $this->ans;
    }
    
    function get_pal( $x, $y){

        if($x==0 || $y==$this->len){ // finished
            return;
        }
        if($x-1 == $y+1){ // skip single char
            $this->get_pal( $x-1, $y+1);
            return;
        }
        if( $this->s[$x-1] === $this->s[$y+1]){
            $len_temp = $y-$x+3;
            if($len_temp>$this->max_len){
                $this->ans = substr($this->s, $x-1, $len_temp);
                $this->max_len = $len_temp;
            }
            $this->get_pal( $x-1, $y+1);
        }
    }

}
