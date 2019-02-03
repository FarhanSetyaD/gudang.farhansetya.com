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
<?php foreach($preinvoice as $p) { ?>
<?php foreach($mbl as $m) { ?>
  <div style="margin-top: 20px" class="ui grid container">
    <div class="row">
      <p style="font-size: 30px; font-weight: bold">PRE-INVOICE</p>
    </div>
    <!--form-->
    <!--<form method="POST" action="">-->
    <!--2-6-->   
    <div class="row ui form">
      <div style="padding: 20px;
        border-width: 1px;
        border-style: solid;
        border-color: black;">
        <div class="inline fields">
          <label style="width: 130px;">NOMOR HOST BL (POS_NO)</label>
          <div class="seven wide field">
            <input type="text" name="nomor_host" disabled value="<?php echo $p->POS_NO;?>">
          </div>
        </div>
        <!--<div class="inline fields">-->
        <!--  <label style="width: 140px;">NAMA KAPAL/VOYAGE</label>-->
        <!--  <div class="eight wide field">-->
        <!--    <input type="text" name="nama_master">-->
        <!--    <span>/</span>-->
        <!--  </div>-->
        <!--  <div class="five wide field">-->
        <!--    <input type="text" name="kapal">-->
        <!--  </div>-->
        <!--</div>-->
        <div class="inline fields">
          <label style="width: 130px;">PAID THRU</label>
          <div class="seven wide field">
            <input type="date" name="paid">
          </div>
        </div>
        <div class="inline fields">
            <label style="width: 130px;">NOMOR MASTER BL</label>
            <div class="seven wide field">
              <input type="text" name="nomor_master" disabled value="<?php echo $m->MBL_NO;?>">
            </div>
        </div>
        <div class="inline fields">
            <label style="width: 130px;">NOMOR CONTAINER</label>
            <div class="seven wide field">
              <input type="text" name="nomor_container" disabled value="<?php echo $m->CNTR_ID;?>">
            </div>
        </div>
        <div class="inline fields">
            <label style="width: 130px;">NAMA KAPAL</label>
            <div class="seven wide field">
              <input type="text" name="nama_kapal" disabled value="<?php echo $m->VESSEL_NAME;?>">
            </div>
        </div>
        <div class="inline fields">
            <label style="width: 130px;">NAMA CONSIGNEE</label>
            <div class="seven wide field">
              <input type="text" name="nama_consignee" disabled value="<?php echo $p->CONSIGNEE;?>">
            </div>
        </div>
        <div class="inline fields">
            <label style="width: 130px;">NPWP</label>
            <div class="seven wide field">
              <input type="text" name="npwp" disabled value="<?php echo $p->NPWP;?>">
            </div>
        </div>
        <div class="inline fields">
            <label style="width: 130px;">PARTY QTY</label>
            <div class="seven wide field">
              <input type="text" name="party" disabled value="<?php echo $p->PARTY_QTY;?>">
            </div>
        </div>
        <div class="inline fields">
            <label style="width: 130px;">GROSS</label>
            <div class="seven wide field">
              <input type="text" name="gross" disabled value="<?php echo $p->GROSS_WEIGHT;?>">
            </div>
        </div>
        <div class="inline fields">
            <label style="width: 130px;">PRE-INVOICE STATUS</label>
            <div class="seven wide field">
              <input type="text" name="preinvoice_status" disabled value="<?php echo $p->PRE_INVOICE_STATUS;?>">
            </div>
        </div>
        <div class="inline fields">
            <label style="width: 130px;">PAYMENT STATUS</label>
            <div class="seven wide field">
              <input type="text" name="payment_status" disabled value="<?php echo $p->PAYMENT_STATUS;?>">
            </div>
        </div>
        <div class="inline fields">
            <label>TIPE TARIF</label>
            <div class="field">
              <div class="ui radio checkbox">
                <input type="radio" name="tarif" checked="checked">
                <label>A</label>
              </div>
            </div>
            <div class="field">
              <div class="ui radio checkbox">
                <input type="radio" name="tarif">
                <label>B</label>
              </div>
            </div>
            <div class="field">
              <div class="ui radio checkbox">
                <input type="radio" name="tarif">
                <label>C</label>
              </div>
            </div>
            <div class="field">
              <div class="ui radio checkbox">
                <input type="radio" name="tarif">
                <label>D</label>
              </div>
            </div>
            <div class="field">
                <div class="ui button">Detail Tarif</div>
                  <div class="ui flowing popup bottom left transition hidden">
                      <div class="ui four column divided center aligned grid">
                        <div class="column">
                          <h4 class="ui header">A</h4>
                          <p><b>2</b> projects, $10 a month</p>
                          <div class="ui button">Choose</div>
                        </div>
                        <div class="column">
                          <h4 class="ui header">B</h4>
                          <p><b>5</b> projects, $20 a month</p>
                          <div class="ui button">Choose</div>
                        </div>
                        <div class="column">
                          <h4 class="ui header">C</h4>
                          <p><b>8</b> projects, $25 a month</p>
                          <div class="ui button">Choose</div>
                        </div>
                        <div class="column">
                          <h4 class="ui header">D</h4>
                          <p><b>8</b> projects, $25 a month</p>
                          <div class="ui button">Choose</div>
                        </div>
                      </div>
                    </div>
            </div>
    </div>
        </div>
        <div style="padding-bottom: 20px" class="row">
          <a href="<?php echo base_url();?>index.php/Pre_invoice">
            <button class="ui red button" type="submit" name="back">Back</button>
          </a>
          <a href="<?php echo base_url();?>index.php/Pre_invoice/biaya">
          <button class="ui primary button" type="submit" name="calculate">Calculate</button>
          </a>        
        </div>
      </div>
      <!--</form>-->
    </div>
</div>
<?php } ?>
<?php } ?>
<!--Javascript-->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
  </script>
  <script src="<?php echo base_url("semantic/semantic.min.js") ?>"></script>

  <script>
   $(document).ready(function(){
    $('select.dropdown').dropdown()
   })
  </script>
</body>
</html>