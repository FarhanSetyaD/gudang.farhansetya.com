DELIMITER $$
CREATE DEFINER=`cpses_farcdkxtwl`@`localhost` PROCEDURE `sp_invoice_pre_calculation`(IN `iv_hbl_id` INT, OUT `ov_status` VARCHAR(6), OUT `ov_message` VARCHAR(400))
    NO SQL
begin
                            
declare c_tarif_list_in_inv_type_id double;
declare v_TOTAL_PHASE_1 double;declare v_TOTAL_PHASE_2  double;
declare v_TOTAL_PHASE_3  double;
declare v_SEWA_PHASE_1  double;
declare v_SEWA_PHASE_2  double;
declare v_SEWA_PHASE_3  double;
declare V_TARIFF_amount  double;
declare v_HEADER_DETAIL varchar(1);
declare v_service_amount DOUBLE;
declare v_total_amount double;
declare v_TARIFF_ID  double;
declare v_tariff_rate double;
declare v_storage_days double;

declare V_TARIFF_amount_sum int;
declare V_TARIFF_amount_strg int;
declare V_TARIFF_amount_scr int;
declare V_TARIFF_amount_svyr int;
declare V_TARIFF_amount_bhdl int;
declare V_TARIFF_amount_admn int;
declare V_TARIFF_amount_secu int;
declare V_TARIFF_amount_rdm int;
declare V_TARIFF_amount_lolo int;
declare V_TARIFF_amount_ob int;
declare V_TARIFF_amount_tax int;

DECLARE V_GL_ACCOUNT VARCHAR(6);

declare r_host_bl_mbl_no varchar(40);
DECLARE r_host_bl_release_datetime datetime;
DECLARE r_host_bl_CBM int;
DECLARE r_host_bl_DG varchar(1);
DECLARE r_host_bl_OD varchar(1);
DECLARE r_host_bl_behandle varchar(1); 
DECLARE r_host_bl_cust_id int; 

declare r_master_tariff_item_type varchar(25);
declare r_master_tariff_tariff_rate_a int;
DECLARE r_master_tariff_tariff_rate_b int;
DECLARE r_master_tariff_tariff_rate_c int;
DECLARE r_master_tariff_tariff_rate_d int;
DECLARE r_master_tariff_tariff_rate_e int;
DECLARE r_master_tariff_tariff_rate_f int;
DECLARE r_master_tariff_tariff_id int;
DECLARE r_master_tariff_ITEM_DESC varchar(60);  

DECLARE R_CUSTOMERS_TRF_STRG_GROUP VARCHAR(1);
DECLARE R_CUSTOMERS_TRF_SCR_GROUP VARCHAR(1);
DECLARE R_CUSTOMERS_TRF_SVYR_GROUP VARCHAR(1);
DECLARE R_CUSTOMERS_TRF_BHDL_GROUP VARCHAR(1);
DECLARE R_CUSTOMERS_TRF_ADMN_GROUP VARCHAR(1);
DECLARE R_CUSTOMERS_TRF_SECU_GROUP VARCHAR(1);
DECLARE R_CUSTOMERS_TRF_RDM_GROUP VARCHAR(1);
DECLARE R_CUSTOMERS_TRF_LOLO_GROUP VARCHAR(1);
DECLARE R_CUSTOMERS_TRF_OB_GROUP VARCHAR(1);
DECLARE R_CUSTOMERS_TRF_TAX_GROUP VARCHAR(1);

declare r_master_bl_eta datetime;      
declare r_master_bl_category varchar(1);            
declare v_status varchar(4);
declare v_message varchar(200);

declare n double DEFAULT 0;
declare not_found int default 0;

declare   c_tarif_list_tariff_code varchar(6);
declare   c_tarif_list_DESCRIPTIONS varchar(60);
declare   c_tarif_list_urutanS int;

delete from INVOICE_PRE_TEMP where hbl_id=iv_hbl_id;

SELECT mbl_no ,DATE(release_datetime),CBM,DG ,OD,behandle, cust_id INTO r_host_bl_mbl_no ,r_host_bl_release_datetime,r_host_bl_CBM ,r_host_bl_DG ,r_host_bl_OD,r_host_bl_behandle,r_host_bl_cust_id
FROM `HOST_BL` WHERE hbl_id=iv_hbl_id;

SELECT DATE(ETA) INTO  r_master_bl_eta FROM `MASTER_BL`WHERE MBL_NO= r_host_bl_mbl_no;

SELECT `TRF_STRG_GROUP`, `TRF_SCR_GROUP`, `TRF_SVYR_GROUP`, `TRF_BHDL_GROUP`, `TRF_ADMN_GROUP`, `TRF_SECU_GROUP`, `TRF_RDM_GROUP`, `TRF_LOLO_GROUP`, `TRF_OB_GROUP`, `TRF_TAX_GROUP`  INTO R_CUSTOMERS_TRF_STRG_GROUP, R_CUSTOMERS_TRF_SCR_GROUP, R_CUSTOMERS_TRF_SVYR_GROUP, R_CUSTOMERS_TRF_BHDL_GROUP, R_CUSTOMERS_TRF_ADMN_GROUP, R_CUSTOMERS_TRF_SECU_GROUP, R_CUSTOMERS_TRF_RDM_GROUP, R_CUSTOMERS_TRF_LOLO_GROUP, R_CUSTOMERS_TRF_OB_GROUP, R_CUSTOMERS_TRF_TAX_GROUP
FROM `CUSTOMERS` WHERE CUST_ID=r_host_bl_cust_id;

SET V_TARIFF_amount_sum=0;

/*STORAGE*/
 SELECT item_type,ITEM_DESC,tariff_rate_a,tariff_rate_b,tariff_rate_c,tariff_rate_d,tariff_rate_e,tariff_rate_f INTO 
         r_master_tariff_ITEM_type, r_master_tariff_ITEM_DESC,r_master_tariff_tariff_rate_a,r_master_tariff_tariff_rate_b,r_master_tariff_tariff_rate_c
         ,r_master_tariff_tariff_rate_d,r_master_tariff_tariff_rate_e,r_master_tariff_tariff_rate_f
              from `MASTER_TARIFF` where tariff_id=1;

  IF R_CUSTOMERS_TRF_STRG_GROUP='A' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_a;
         ELSEIF R_CUSTOMERS_TRF_STRG_GROUP='B' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_b;
         ELSEIF R_CUSTOMERS_TRF_STRG_GROUP='C' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_c;
	 ELSEIF R_CUSTOMERS_TRF_STRG_GROUP='D' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_d;
	 ELSEIF R_CUSTOMERS_TRF_STRG_GROUP='E' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_e;
	ELSEIF R_CUSTOMERS_TRF_STRG_GROUP='F' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_f;
      ELSE
   set v_tariff_rate=0;
END IF;

      SET v_GL_ACCOUNT='STRG';
      SET v_total_phase_1=0;
	  SET V_SEWA_PHASE_1=v_total_phase_1*v_tariff_rate*r_host_bl_cbm;
	  SET v_total_phase_2=0;
 
SET V_SEWA_PHASE_2=v_total_phase_2*v_tariff_rate*r_host_bl_cbm;
	  
	  SET v_total_phase_3=DATEDIFF(r_host_bl_release_datetime,r_master_bl_eta)+1;

SET V_SEWA_PHASE_3=v_total_phase_3*v_tariff_rate*r_host_bl_cbm;
	  SET V_TARIFF_amount_strg=V_SEWA_PHASE_1+V_SEWA_PHASE_2+V_SEWA_PHASE_3;
	  SET v_HEADER_DETAIL='D';

          If V_TARIFF_amount_strg > 0 then
          	Set n=n+1;
          	Set V_TARIFF_amount_sum=V_TARIFF_amount_sum+V_TARIFF_amount_strg;
            
	 	insert into INVOICE_PRE_TEMP (inv_detail_id,INV_ITEM,DESCA    ,QTY,TARIF_RATE,TOTAL_PHASE_1,TOTAL_PHASE_2,TOTAL_PHASE_3
                         ,SEWA_PHASE_1,SEWA_PHASE_2,SEWA_PHASE_3,TOTAL_AMOUNT,HEADER_DETAIL    ,TARIFF_ID,GL_ACCOUNT , HBL_ID)
           	values (n,r_master_tariff_ITEM_type , r_master_tariff_ITEM_DESC,r_host_bl_cbm,v_TARIFF_RATE
                         ,v_TOTAL_PHASE_1,v_TOTAL_PHASE_2,v_TOTAL_PHASE_3
                         ,v_SEWA_PHASE_1,v_SEWA_PHASE_2,v_SEWA_PHASE_3,V_TARIFF_amount_strg
                    ,v_HEADER_DETAIL,v_TARIFF_ID,V_GL_ACCOUNT,iv_hbl_id);


    end if;
	  
 /*end storage */
 
 
/*2. SURVEYOR*/
  SELECT item_type,ITEM_DESC,tariff_rate_a,tariff_rate_b,tariff_rate_c,tariff_rate_d,tariff_rate_e,tariff_rate_f INTO 
         r_master_tariff_ITEM_type, r_master_tariff_ITEM_DESC,r_master_tariff_tariff_rate_a,r_master_tariff_tariff_rate_b,r_master_tariff_tariff_rate_c
         ,r_master_tariff_tariff_rate_d,r_master_tariff_tariff_rate_e,r_master_tariff_tariff_rate_f
              from `MASTER_TARIFF` where tariff_id=3;

  IF R_CUSTOMERS_TRF_SVYR_GROUP='A' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_a;
         ELSEIF R_CUSTOMERS_TRF_SVYR_GROUP='B' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_b;
         ELSEIF R_CUSTOMERS_TRF_SVYR_GROUP='C' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_c;
	 ELSEIF R_CUSTOMERS_TRF_SVYR_GROUP='D' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_d;
	 ELSEIF R_CUSTOMERS_TRF_SVYR_GROUP='E' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_e;
	ELSEIF R_CUSTOMERS_TRF_SVYR_GROUP='F' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_f;
      ELSE
   set v_tariff_rate=0;
END IF;

    
    SET v_total_phase_1=0;
	SET V_SEWA_PHASE_1=0;
	SET v_total_phase_2=0;
	SET V_SEWA_PHASE_2=0;
	SET v_total_phase_3=0;
    SET V_SEWA_PHASE_3=0;
	SET V_TARIFF_amount_svyr=v_tariff_rate*r_host_bl_cbm;
	SET v_HEADER_DETAIL='D';
  
          If V_TARIFF_amount_svyr > 0 then
            SET v_GL_ACCOUNT='SVYR';
          	Set n=n+1;
          	Set V_TARIFF_amount_sum=V_TARIFF_amount_sum+V_TARIFF_amount_svyr;
           
	 	insert into INVOICE_PRE_TEMP (inv_detail_id,INV_ITEM,DESCA    ,QTY,TARIF_RATE,TOTAL_PHASE_1,TOTAL_PHASE_2,TOTAL_PHASE_3
                         ,SEWA_PHASE_1,SEWA_PHASE_2,SEWA_PHASE_3,TOTAL_AMOUNT,HEADER_DETAIL    ,TARIFF_ID,GL_ACCOUNT , HBL_ID)
           	values (n,r_master_tariff_ITEM_type , r_master_tariff_ITEM_DESC,r_host_bl_cbm,v_TARIFF_RATE
                         ,v_TOTAL_PHASE_1,v_TOTAL_PHASE_2,v_TOTAL_PHASE_3
                         ,v_SEWA_PHASE_1,v_SEWA_PHASE_2,v_SEWA_PHASE_3,V_TARIFF_amount_svyr
                    ,v_HEADER_DETAIL,v_TARIFF_ID,V_GL_ACCOUNT,iv_hbl_id);
 

          end if;
  

	  
 /*end SURVEYOR */

/*3. surcharge*/

IF r_host_bl_DG='Y' THEN
         SELECT item_type,ITEM_DESC,tariff_rate_a,tariff_rate_b,tariff_rate_c,tariff_rate_d,tariff_rate_e,tariff_rate_f INTO 
         r_master_tariff_ITEM_type, r_master_tariff_ITEM_DESC,r_master_tariff_tariff_rate_a,r_master_tariff_tariff_rate_b,r_master_tariff_tariff_rate_c
         ,r_master_tariff_tariff_rate_d,r_master_tariff_tariff_rate_e,r_master_tariff_tariff_rate_f
              	from `MASTER_TARIFF` where tariff_id=7;
   ELSEIF  r_host_bl_OD='Y' THEN
   	  SELECT item_type,ITEM_DESC,tariff_rate_a,tariff_rate_b,tariff_rate_c,tariff_rate_d,tariff_rate_e,tariff_rate_f INTO 
         r_master_tariff_ITEM_type, r_master_tariff_ITEM_DESC,r_master_tariff_tariff_rate_a,r_master_tariff_tariff_rate_b,r_master_tariff_tariff_rate_c
         ,r_master_tariff_tariff_rate_d,r_master_tariff_tariff_rate_e,r_master_tariff_tariff_rate_f
              	from `MASTER_TARIFF` where tariff_id=8;
   ELSE
	 SELECT item_type,ITEM_DESC,tariff_rate_a,tariff_rate_b,tariff_rate_c,tariff_rate_d,tariff_rate_e,tariff_rate_f INTO 
         r_master_tariff_ITEM_type, r_master_tariff_ITEM_DESC,r_master_tariff_tariff_rate_a,r_master_tariff_tariff_rate_b,r_master_tariff_tariff_rate_c
         ,r_master_tariff_tariff_rate_d,r_master_tariff_tariff_rate_e,r_master_tariff_tariff_rate_f
              	from `MASTER_TARIFF` where tariff_id=6;
END IF;

  IF R_CUSTOMERS_TRF_SCR_GROUP='A' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_a;
         ELSEIF R_CUSTOMERS_TRF_SCR_GROUP='B' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_b;
         ELSEIF R_CUSTOMERS_TRF_SCR_GROUP='C' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_c;
	 ELSEIF R_CUSTOMERS_TRF_SCR_GROUP='D' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_d;
	 ELSEIF R_CUSTOMERS_TRF_SCR_GROUP='E' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_e;
	ELSEIF R_CUSTOMERS_TRF_SCR_GROUP='F' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_f;
      ELSE
   set v_tariff_rate=0;
END IF;

    
    SET v_total_phase_1=0;
	SET V_SEWA_PHASE_1=0;
	SET v_total_phase_2=0;
	SET V_SEWA_PHASE_2=0;
	SET v_total_phase_3=0;
    SET V_SEWA_PHASE_3=0;
	SET V_TARIFF_amount_scr=v_tariff_rate*r_host_bl_cbm;
	SET v_HEADER_DETAIL='D';
  
          If V_TARIFF_amount_scr > 0 then
            SET v_GL_ACCOUNT='SCR';
          	Set n=n+1;
          	Set V_TARIFF_amount_sum=V_TARIFF_amount_sum+V_TARIFF_amount_SCR;
           
	 	insert into INVOICE_PRE_TEMP (inv_detail_id,INV_ITEM,DESCA    ,QTY,TARIF_RATE,TOTAL_PHASE_1,TOTAL_PHASE_2,TOTAL_PHASE_3
                         ,SEWA_PHASE_1,SEWA_PHASE_2,SEWA_PHASE_3,TOTAL_AMOUNT,HEADER_DETAIL    ,TARIFF_ID,GL_ACCOUNT , HBL_ID)
           	values (n,r_master_tariff_ITEM_type , r_master_tariff_ITEM_DESC,r_host_bl_cbm,v_TARIFF_RATE
                         ,v_TOTAL_PHASE_1,v_TOTAL_PHASE_2,v_TOTAL_PHASE_3
                         ,v_SEWA_PHASE_1,v_SEWA_PHASE_2,v_SEWA_PHASE_3,V_TARIFF_amount_scr
                    ,v_HEADER_DETAIL,v_TARIFF_ID,V_GL_ACCOUNT,iv_hbl_id);
 

          end if;
  

	  
 /*3. end surcharge */

/*4. behandle*/

	 SELECT item_type,ITEM_DESC,tariff_rate_a,tariff_rate_b,tariff_rate_c,tariff_rate_d,tariff_rate_e,tariff_rate_f INTO 
         	r_master_tariff_ITEM_type, r_master_tariff_ITEM_DESC,r_master_tariff_tariff_rate_a,
		r_master_tariff_tariff_rate_b,r_master_tariff_tariff_rate_c ,r_master_tariff_tariff_rate_d
		,r_master_tariff_tariff_rate_e,r_master_tariff_tariff_rate_f
           from `MASTER_TARIFF` where tariff_id=4;

  IF R_CUSTOMERS_TRF_BHDL_GROUP='A' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_a;
         ELSEIF R_CUSTOMERS_TRF_BHDL_GROUP='B' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_b;
         ELSEIF R_CUSTOMERS_TRF_BHDL_GROUP='C' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_c;
	 ELSEIF R_CUSTOMERS_TRF_BHDL_GROUP='D' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_d;
	 ELSEIF R_CUSTOMERS_TRF_BHDL_GROUP='E' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_e;
	ELSEIF R_CUSTOMERS_TRF_BHDL_GROUP='F' THEN 
                set v_tariff_rate=r_master_tariff_tariff_rate_f;
      ELSE
   set v_tariff_rate=0;
END IF;

    
    SET v_total_phase_1=0;
	SET V_SEWA_PHASE_1=0;
	SET v_total_phase_2=0;
	SET V_SEWA_PHASE_2=0;
	SET v_total_phase_3=0;
    SET V_SEWA_PHASE_3=0;
	SET V_TARIFF_amount_bhdl=v_tariff_rate*r_host_bl_cbm;
	SET v_HEADER_DETAIL='D';
  
          If V_TARIFF_amount_bhdl > 0 then
            SET v_GL_ACCOUNT='BHDL';
          	Set n=n+1;
          	Set V_TARIFF_amount_sum=V_TARIFF_amount_sum+V_TARIFF_amount_bhdl;
           
	 	insert into INVOICE_PRE_TEMP (inv_detail_id,INV_ITEM,DESCA    ,QTY,TARIF_RATE,TOTAL_PHASE_1,TOTAL_PHASE_2,TOTAL_PHASE_3
                         ,SEWA_PHASE_1,SEWA_PHASE_2,SEWA_PHASE_3,TOTAL_AMOUNT,HEADER_DETAIL    ,TARIFF_ID,GL_ACCOUNT , HBL_ID)
           	values (n,r_master_tariff_ITEM_type , r_master_tariff_ITEM_DESC,r_host_bl_cbm,v_TARIFF_RATE
                         ,v_TOTAL_PHASE_1,v_TOTAL_PHASE_2,v_TOTAL_PHASE_3
                         ,v_SEWA_PHASE_1,v_SEWA_PHASE_2,v_SEWA_PHASE_3,V_TARIFF_amount_bhdl
                    ,v_HEADER_DETAIL,v_TARIFF_ID,V_GL_ACCOUNT,iv_hbl_id);
 

          end if;
  

	  
 /*4.end behandle */

 
 /*amount tax*/

 If V_TARIFF_amount_sum > 0 then
          	Set n=n+1;
          	Set V_TARIFF_amount_tax=round(V_TARIFF_amount_sum*0.1);
            SET v_HEADER_DETAIL='D';
		    SET v_GL_ACCOUNT='TAX';

            
	 	insert into INVOICE_PRE_TEMP (inv_detail_id,INV_ITEM,DESCA    ,TARIF_RATE,TOTAL_AMOUNT,HEADER_DETAIL    ,TARIFF_ID,GL_ACCOUNT , HBL_ID)
           	values (n,'TAX' , 'TAX',V_TARIFF_amount_sum, V_TARIFF_amount_tax
                    ,v_HEADER_DETAIL,v_TARIFF_ID,V_GL_ACCOUNT,iv_hbl_id);

            SET V_TARIFF_amount_sum=V_TARIFF_amount_sum+V_TARIFF_amount_tax;
 end if;


/*end amount tax*/

 /*amount total*/

 If V_TARIFF_amount_sum > 0 then
          	Set n=n+1;
          	
                SET v_HEADER_DETAIL='H';
		SET v_GL_ACCOUNT='PDPT';

            
	 	insert into INVOICE_PRE_TEMP (inv_detail_id,INV_ITEM,DESCA    ,TOTAL_AMOUNT,HEADER_DETAIL    ,TARIFF_ID,GL_ACCOUNT , HBL_ID)
           	values (n,'TOTAL' , 'TOTAL', V_TARIFF_amount_sum
                    ,v_HEADER_DETAIL,v_TARIFF_ID,V_GL_ACCOUNT,iv_hbl_id);


 end if;


/*end amount total*/


 

 
 SET ov_status=n;
 SET ov_message=V_TARIFF_amount_sum;

END$$
DELIMITER ;