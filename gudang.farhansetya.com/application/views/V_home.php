<?php
defined('BASEPATH') or exit('No direct script access allowed');
// <?php echo base_url('semantic/semantic.min.js')
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("semantic/semantic.min.css")?>">
 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("css/home.css")?>"> 
  
</head>

<body>
  <div class="container">
    <div class="ui column centered grid">
      <p style="font-weight: bold; font-size: 20pt;margin-bottom: 40px">Gudang</p>
    </div>
    <div class="ui two column grid container">
      <div class="column">
      <a href="<?php echo base_url("index.php/C_home/after_index")?>">
        <div class="ui centered card hover-card">
          <div class="image">
            <img style="width: 100%; height: 100%" src="<?php echo base_url("images/hacking.png")?>"> 
          </div> 
          <div class="center aligned content">
            <a class="header">Transaction</a>
          </div>
        </div>
      </a>
      </div>
      <div class="column">
        <a href="#">
          <div class="ui centered card hover-card">
            <div class="image">
              <img style="width: 100%; height: 100%" src="<?php echo base_url("images/report.png")?>"> 
            </div> 
            <div class="center aligned content">
              <a class="header">Report</a>
            </div>
          </div>
        </a>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
    </script>
    
    <script src="<?php echo base_url("semantic/semantic.min.js")?>"></script>
  </div>
</body>

</html>