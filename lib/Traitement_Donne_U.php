<?php
        function v_donne($data){
            if (isset($data))
            {
                htmlspecialchars($data);
                strip_tags($data);
                return $data;
            }else
            {
                return $data=null;
            }

        }
?>
