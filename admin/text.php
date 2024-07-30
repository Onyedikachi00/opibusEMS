<?php
            if ($status == 'Pending') {
              $color ='orange';
            }
            elseif ($status == 'Approved') {
              $color ='forestgreen';
            }
            elseif ($status == 'Rejected') {
              $color ='crimson';
            }
            echo '<span class="" style="background-color:'.$color.'; padding:10px; margin-right:15px; color:white; border-radius:5px; font-weight:bolder;">' .$status.'</span>' 
            ?>