<br><br><center>
 <?php 


 	echo "<img src=http://sia.dillahgroup.com/assets/uploads/bukti/".$invoice_info->upload." width='20%'>";
 	echo "<br><br>";

 	echo "<a class='btn btn-primary' href=JavaScript:newPopup('http://sia.dillahgroup.com/assets/uploads/bukti/".$invoice_info->upload."');>Print</a>";

	echo "<br><br><a class='btn btn-success' href=../../../purchase/request/view/".$invoice_info->id."><- Kembali</a>";


   ?>
 <br><br>

</center>


 <script type="text/javascript">
    // Popup window code
    function newPopup(url) {
      popupWindow = window.open(
        url,'popUpWindow','height=400,width=400,left=500,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
    }
    </script>
