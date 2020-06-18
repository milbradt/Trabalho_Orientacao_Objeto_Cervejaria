<?php

    class ControllerErros
    {

        public function checkErros($check)
        {
            if ($check == null || !is_array($check) || (count($check) === 0)) {
			
                return true;
    
            } else {

                return false;
                
            }
        }

    }

?>