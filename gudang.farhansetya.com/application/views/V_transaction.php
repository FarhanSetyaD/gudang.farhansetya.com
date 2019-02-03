<?php
defined('BASEPATH') or exit('No direct script access allowed');
// <?php echo base_url('semantic/semantic.min.js')
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Transaction</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("semantic/semantic.min.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("css/transaction.css") ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("css/input-table.css") ?>">
</head>
<body>
  <div class="ui blue inverted borderless menu">
    <div style="font-size: 20px" class="header item">
      Gudang
    </div>
    <a style="font-size: 20px" class="item">
      About Us
    </a>
    <div style="font-size: 20px" class="right menu">
      <a class="item">Profile</a>
      <a class="item">Logout</a>
    </div>
  </div>

  <!--container-->
    <!--<div style="margin-top: 20px" class="ui grid container">-->
    <!--    <div class="row">-->
    <!--      <p style="font-size: 30px; font-weight: bold">INPUT B/L</p>-->
    <!--    </div>-->
        <!--form-->
    <!--    <form class="row" method="POST" action="Transaction/insert">-->
        <!--2-6-->   
    <!--        <div class="row ui form">-->
    <!--          <div style="padding: 20px;-->
    <!--            border-width: 1px;-->
    <!--            border-style: solid;-->
    <!--            border-color: black;-->
    <!--            margin-bottom: 20px;">-->
    <!--            <div class="inline fields">-->
    <!--              <label style="width: 130px;">NOMOR MASTER BL</label>-->
    <!--              <div class="seven wide field">-->
    <!--                <input type="text" name="nomor_master">-->
    <!--              </div>-->
    <!--            </div>-->
    <!--            <div class="inline fields">-->
    <!--              <label style="width: 140px;">NAMA KAPAL/VOYAGE</label>-->
    <!--              <div class="eight wide field">-->
    <!--                <input type="text" name="nama_master">-->
    <!--                <span>/</span>-->
    <!--              </div>-->
    <!--              <div class="five wide field">-->
    <!--                <input type="text" name="kapal">-->
    <!--              </div>-->
    <!--            </div>-->
    <div style="padding: 40px" style="margin-top: 20px" class="ui grid">
        <div class="row">
          <p style="font-size: 30px; font-weight: bold">INPUT B/L</p>
        </div>
        <!--form-->
        <form class="row" method="POST" action="<?php echo base_url("Transaction/insert/1")?>">
        <!--2-6-->   
            <div class="row ui form">
              <div style="padding: 20px;
                border-width: 1px;
                border-style: solid;
                border-color: black;
                margin-bottom: 20px;">
                <div class="inline fields">
                  <label style="width: 130px;">NOMOR MASTER BL</label>
                  <div class="seven wide field">
                    <input type="text" name="nomor_master">
                  </div>
                </div>
                <div class="inline fields">
                  <label style="width: 140px;">NAMA KAPAL/VOYAGE</label>
                  <div class="eight wide field">
                    <input type="text" name="nama_master">
                    <span>/</span>
                  </div>
                  <div class="five wide field">
                    <input type="text" name="kapal">
                  </div>
                </div>
                <div class="inline fields">
                  <label style="width: 130px;">TERMINAL ASAL</label>
                  <div class="seven wide field">
                    <input type="text" name="terminal">
                  </div>
                </div>
                <div class="inline fields">
                    <label style="width: 130px;">ETA</label>
                    <div class="seven wide field">
                      <input type="date" name="eta" placeholder="date">
                    </div>
                </div>
              </div>
            </div>
        <!--7-12-->
            <div class="row ui form">
                <div style="padding: 20px;
                  border-width: 1px;
                  border-style: solid;
                  border-color: black;
                  margin-bottom: 20px;">
                  <div class="inline fields">
                    <label style="width: 150px;">CNTR ID</label>
                    <div class="nine wide field">
                      <input type="TEXT" name="cntr_id">
                    </div>
                  <!--  <label style="width: 150px;">SIZE</label>-->
                  <!--  <div class="two wide field">-->
                  <!--  <input type="text" name="cntr_size">-->
                  <!--</div>-->
                  <!--<label style="width: 150px;">TYPE</label>-->
                  <!--<div class="two wide field">-->
                  <!--  <input type="text" name="cntr_type">-->
                  <!--</div>-->
                  <!--<label style="width: 150px;">TYPE GROUP</label>-->
                  <!--<div class="two wide field">-->
                  <!--  <input type="text" name="cntr_type_group">-->
                  <!--</div>-->
                  </div>
                  <div class="inline fields">
                      <label style="width: 150px;">SIZE</label>
                        <div class="two wide field">
                        <input type="text" name="cntr_size">
                      </div>
                      <label style="width: 30px;">TYPE</label>
                      <div class="two wide field">
                        <input type="text" name="cntr_type">
                      </div>
                      <label style="width: 80px;">TYPE GROUP</label>
                      <div class="two wide field">
                        <input type="text" name="cntr_type_group">
                      </div>
                </div>
                  <!--<div class="inline fields">-->
                  <!--  <label style="width: 150px;">CNTR SIZE</label>-->
                  <!--  <div class="eleven wide field">-->
                  <!--    <input type="text" name="cntr_size">-->
                  <!--  </div>-->
                  <!--</div>-->
                  <!--<div class="inline fields">-->
                  <!--    <label style="width: 150px;">CNTR TYPE</label>-->
                  <!--    <div class="eleven wide field">-->
                  <!--      <input type="text" name="cntr_type">-->
                  <!--    </div>-->
                  <!--</div>-->
                  <!--<div class="inline fields">-->
                  <!--  <label style="width: 150px;">CNTR TYPE GROUP</label>-->
                  <!--  <div class="nine wide field">-->
                  <!--    <input type="text" name="cntr_type_group">-->
                  <!--  </div>-->
                  <!--</div>-->
                  <div class="inline fields">
                    <label style="width: 150px;">POL</label>
                    <div class="nine wide field">
                      <input type="text" name="pol">
                    </div>
                  </div>
                  <div class="inline fields">
                    <label style="width: 150px;">DG CODE</label>
                    <div class="nine wide field">
                      <input type="text" name="dg_code">
                    </div>
                  </div>
                </div>
            </div>
        
        <!--13-15-->
            <div class="row ui form">
                <div style="padding: 20px;
                  border-width: 1px;
                  border-style: solid;
                  border-color: black;
                  margin-bottom: 20px;">
                  <div class="inline fields">
                    <label style="width: 100px;">NOMOR JOB</label>
                    <div class="ten wide field">
                      <input type="number" name="nomor_job">
                    </div>
                  </div>
                  <div class="inline fields">
                    <label style="width: 100px;">BC11 NBR</label>
                    <div class="eleven wide field">
                      <input type="text" name="bc11_nbr">
                    </div>
                  </div>
                  <div class="inline fields">
                    <label style="width: 100px;">BC11 DATE</label>
                    <div class="eleven wide field">
                      <input type="date" name="bc11_date">
                    </div>
                  </div>
                  
                </div>
            </div>
    
        <div class="row" style="width: 100%">
          <p style="font-size: 30px; font-weight: bold">HOST B/L</p>
        </div>
        <!--<table class="ui fixed table">-->
        <!--  <thead>-->
        <!--    <tr>-->
        <!--      <th class="center aligned">POS_NO</th>-->
        <!--      <th class="center aligned">CONSIGNEE</th>-->
              <!--<th class="center aligned">NPWP</th>-->
              <!--<th class="center aligned">CUST_ID</th>-->
        <!--      <th class="center aligned">HBL_NO</th>-->
        <!--      <th class="center aligned">PARTY_QTY</th>-->
        <!--      <th class="center aligned">PARTY_UNIT</th>-->
        <!--      <th class="center aligned">GROSS_WEIGHT</th>-->
        <!--      <th class="center aligned">GROSS_WEIGHT_UNIT</th>-->
        <!--      <th class="center aligned">CBM</th>-->
        <!--      <th class="center aligned">UP</th>-->
        <!--      <th class="center aligned">COMMODITY</th>-->
        <!--      <th class="center aligned">HS_CODE</th>-->
        <!--      <th class="center aligned">RELEASE_DATETIME</th>-->
        <!--      <th class="center aligned">DO_NO</th>-->
        <!--      <th class="center aligned">DO_EXPIRY_DATETIME</th>-->
        <!--    </tr>-->
        <!--  </thead>-->
        <table class="ui small fixed table">
          <thead>
          <tr>
              <th class="center aligned">POS_NO</th>
              <th style="width: 120px" class="center aligned">CONSIGNEE</th>
              <!--<th class="center aligned">NPWP</th>-->
              <!--<th class="center aligned">CUST_ID</th>-->
              <th class="center aligned">HBL_NO</th>
              <th style="width: 90px" class="center aligned">PARTY_QTY</th>
              <th style="width: 90px; font-size: 12px" class="center aligned">PARTY_UNIT</th>
              <th style="width: 90px;" class="center aligned">GROSS_WEIGHT</th>
              <th style="width: 90px" class="center aligned">GROSS_WEIGHT_UNIT</th>
              <th class="center aligned">CBM</th>
              <th class="center aligned">UP</th>
              <th style="width: 100px; font-size: 12px" class="center aligned">COMMODITY</th>
              <th style="font-size: 12px" class="center aligned">HS_CODE</th>
              <th style="width: 100px;" class="center aligned">RELEASE_DATETIME</th>
              <th class="center aligned">DO_NO</th>
              <th style="width: 100px;" class="center aligned">DO_EXPIRY_DATETIME</th>
            </tr>
          </thead>
          <tbody>
            <tr id="row-data-1">
              <td data-label="POS_NO">
                <div class="ui input">
                  <input class="partial-width input-table" type="text" placeholder="" name="nomor_host[]">
                </div>
              </td>
              <td data-label="CONSIGNEE">
                <div class="ui input">
                  <!--<input class="input-table" type="text" placeholder="" name="nama_host[]">-->
                  <!--<select class="ui search dropdown" name="nama_host[]">-->
                  <select style="width: 110px; padding: 8px; border-radius: 8px; border-color: rgba(220,220,220);" name="nama_host[]">
                    <?php 
                        if (!empty($consignee)){ ?>
                      <!--<datalist>-->
                        <?php foreach($consignee as $item){ ?>
                        <option value="<?php echo $item["CUST_NAME"];?>"><?php echo $item["CUST_NAME"];?></option>
                        <?php } ?>
                      <!--</datalist>-->
                    <?php } ?>
                   </select>
                </div>
              </td>
              <!--<td data-label="NPWP">-->
              <!--  <div class="ui input">-->
              <!--      <input class="input-table" type="text" placeholder="" name='npwp[]'>-->
              <!--  </div>-->
              <!--</td><td data-label="CUST_ID">-->
              <!--  <div class="ui input">-->
              <!--    <input class="input-table" type="text" placeholder="">-->
              <!--  </div>-->
              <!--</td>-->
        <!--      <td data-label="HBL_NO">-->
        <!--        <div class="ui input">-->
        <!--          <input class="input-table" type="text" placeholder="" name="hbl_no[]">-->
        <!--        </div>-->
        <!--      </td>-->
        <!--      <td data-label="PARTY_QTY">-->
        <!--        <div class="ui input">-->
        <!--            <input class="input-table" type="number" placeholder="" name="party_qty[]">-->
        <!--        </div>-->
        <!--      </td><td data-label="PARTY_UNIT">-->
        <!--        <div class="ui input">-->
        <!--          <input class="input-table" type="text" placeholder="" name="party_unit[]">-->
        <!--        </div>-->
        <!--      </td>-->
        <!--      <td data-label="GROSS_WEIGHT">-->
        <!--        <div class="ui input">-->
        <!--          <input class="input-table" type="text" placeholder="" name="gross_weight[]">-->
        <!--        </div>-->
        <!--      </td>-->
        <!--      <td data-label="GROSS_WEIGHT_UNIT">-->
        <!--        <div class="ui input">-->
        <!--            <input class="input-table" type="text" placeholder="" name="gross_weight_unit[]">-->
        <!--        </div>-->
        <!--      </td><td data-label="CBM">-->
        <!--        <div class="ui input">-->
        <!--          <input class="input-table" type="text" placeholder="" name="cbm[]">-->
        <!--        </div>-->
        <!--      </td>-->
        <!--      <td data-label="UP">-->
        <!--        <div class="ui input">-->
        <!--          <input class="input-table" type="text" placeholder="" name="up[]">-->
        <!--        </div>-->
        <!--      </td>-->
        <!--      <td data-label="COMMODITY">-->
        <!--        <div class="ui input">-->
        <!--            <input class="input-table" type="text" placeholder="" name="commodity[]">-->
        <!--        </div>-->
        <!--      </td><td data-label="HS_CODE">-->
        <!--        <div class="ui input">-->
        <!--          <input class="input-table" type="text" placeholder="" name="hs_code[]">-->
        <!--        </div>-->
        <!--      </td>-->
        <!--      <td data-label="RELEASE_DATETIME">-->
        <!--        <div class="ui input">-->
        <!--          <input class="input-table" type="date" placeholder="" name="release_datetime[]">-->
        <!--        </div>-->
        <!--      </td>-->
        <!--      <td data-label="DO_NO">-->
        <!--        <div class="ui input">-->
        <!--            <input class="input-table" type="text" placeholder="" name="do_no[]">-->
        <!--        </div>-->
        <!--      </td>-->
        <!--      <td data-label="DO_EXPIRY_DATETIME">-->
        <!--        <div class="ui input">-->
        <!--            <input class="input-table" type="date" placeholder="" name="do_expiry_datetime[]">-->
        <!--        </div>-->
        <!--      </td>-->
        <!--      <td class="center aligned">-->
        <!--        <button id="clone-1" type="button" class="ui teal button clone">Clone</button>-->
        <!--      </td>-->
        <!--    </tr>-->
        <!--  </tbody>-->
        <!--</table>-->
        <!--<div style="padding-bottom: 20px" class="row">-->
        <!--  <button name="submit" class="ui primary button" type="submit">Submit</button>-->
        <!--</div>-->
        <!--</div>-->
        <!--</form>-->
        <td data-label="HBL_NO">
                <div class="ui input">
                  <input class="morehalf-width input-table" type="text" placeholder="" name="hbl_no[]">
                </div>
              </td>
              <td data-label="PARTY_QTY">
                <div class="ui input">
                    <input class="partial-width input-table" type="number" placeholder="" name="party_qty[]">
                </div>
              </td><td data-label="PARTY_UNIT">
                <div class="ui input">
                  <input class="partial-width input-table" type="text" placeholder="" name="party_unit[]">
                </div>
              </td>
              <td data-label="GROSS_WEIGHT">
                <div class="ui input">
                  <input class="partial-width input-table" type="text" placeholder="" name="gross_weight[]">
                </div>
              </td>
              <td data-label="GROSS_WEIGHT_UNIT">
                <div class="ui input">
                    <input class="partial-width input-table" type="text" placeholder="" name="gross_weight_unit[]">
                </div>
              </td><td data-label="CBM">
                <div class="ui input">
                  <input class="partial-width input-table" type="text" placeholder="" name="cbm[]">
                </div>
              </td>
              <td data-label="UP">
                <div class="ui input">
                  <input class="partial-width input-table" type="text" placeholder="" name="up[]">
                </div>
              </td>
              <td data-label="COMMODITY">
                <div class="ui input">
                    <input class="ninetypx-width input-table" type="text" placeholder="" name="commodity[]">
                </div>
              </td><td data-label="HS_CODE">
                <div class="ui input">
                  <input class="morehalf-width input-table" type="text" placeholder="" name="hs_code[]">
                </div>
              </td>
              <td data-label="RELEASE_DATETIME">
                <div class="ui input">
                  <input class="   input-table" style="font-size: 10px;" type="date" placeholder="" name="release_datetime[]">
                </div>
              </td>
              <td data-label="DO_NO">
                <div class="ui input">
                    <input class="morehalf-width input-table" type="text" placeholder="" name="do_no[]">
                </div>
              </td>
              <td data-label="DO_EXPIRY_DATETIME">
                <div class="ui input">
                    <input class="ninetypx-width input-table" style="font-size: 10px;" type="date" placeholder="" name="do_expiry_datetime[]">
                </div>
              </td>
              <td class="center aligned">
                <button id="clone-1" type="button" class="ui teal button clone">Clone</button>
              </td>
            </tr>
          </tbody>
        </table>
        <div style="padding-bottom: 20px" class="row">
          <button name="submit" class="ui primary button" type="submit">Submit</button>
        </div>
        </div>
        </form>
    <!--form-->
    </div>
  </div>
  <!--Javascript-->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
  </script>
  <script src="<?php echo base_url("semantic/semantic.min.js") ?>"></script>
  <script src="<?php echo base_url("js/clone_table.js") ?> "></script>
  <script>
   $(document).ready(function(){
    $('select.dropdown').dropdown()
   })
  </script>
</body>
</html>