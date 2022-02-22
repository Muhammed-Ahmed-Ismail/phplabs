<?php
        if(file_exists("logs.txt"))
        {
          $logs_arr=file("logs.txt");
          foreach ($logs_arr as $log)
          {
              $offset=0;
              $string=$log;
              $visiting_date=substr($string,$offset,strpos($string,"::",0));
              $offset=strpos($string,"::",0);
              $string=substr($log,$offset);
              $client_data_arr=explode(",",$string);
              //print_r($client_data_arr);
              echo "<b>Visit date:</b> $visiting_date </br>";
              echo "<b>IP Address</b> ".$client_data_arr[0]."</br>";
              echo "<b>Name: </b> ".$client_data_arr[1]."</br>";
              echo "<b>Email: </b> ".$client_data_arr[2]."</br>";
              echo "<b>Number of visits: </b> ".$client_data_arr[3]."</br>";
              echo "<hr>";
          }
        }else{
            echo "<h1> no logs yet</h1>";
        }