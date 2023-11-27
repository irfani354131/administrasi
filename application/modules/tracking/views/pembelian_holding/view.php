<style>

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: #000;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.containerz {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.containerz::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -13px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left:50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -13px;
}

/* The actual content */
.content {
  padding: 20px 30px;
  background-color: #0069d9;
  position: relative;
  border-radius: 6px;
  color: #fff;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .containerz {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .containerz::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}
</style>

<div id="page-content" class="clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>Tracking Pembelian ke Holding</h1>
            <div class="title-button-group">
                <div class="btn-group" role="group">
                  <?php
                    echo anchor(get_uri("tracking/t_pembelian_holding"), "<i class='fa fa-arrow-left'></i> " . "Kembali", array("class" => "btn btn-primary", "title" => "Kembali"));
                
                ?>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            
<div class="timeline">
  <div class="containerz left">
    <div class="content">
      <h2><?php 
        $originalDate = $request->created_at;
        $newDate = date("d M Y", strtotime($originalDate));

        echo $newDate;

         ?></h2>
      <p><?php
           if ($request->status == 'disetujui')
             {
                $status = 'Request pembelian dengan code <strong>#'.$request->code.'</strong> Telah di approve oleh manajer keuangan holding ';
            }
        if ($request->status == 'request holding')
            {
                $status = 'Request pembelian material ke holding';
            }
         if ($request->status == 'ditolak')
            {
                $status = 'Request pembelian ditolak oleh holding';
            }

       echo $status; ?></p>
    </div>
  </div>

<?php 
   
        if ($pembelian->status == 'terverifikasi')
            {
                 $originalDate = $pembelian->created_at;
                 $newDate = date("d M Y", strtotime($originalDate));
                 $status = 'Telah dilakukan Pemesanan pembelian oleh manajer keuangan holding dengan code PO <strong>#'.$pembelian->code.'</strong>';
                 echo '<div class="containerz right">
                        <div class="content">
                          <h2>'.$newDate.'</h2>
                          <p>'.$status.'</p>
                        </div>
                      </div>';

            }
            if ($pembelian->status == 'posting')
            {
                $originalDate = $pembelian->created_at;
                 $newDate = date("d M Y", strtotime($originalDate));
                $status = 'Pemesanan pembelian telah di posting ke journal dengan code PO <strong>#'.$pembelian->code.'</strong> ';
                 
                echo '<div class="containerz right">
                        <div class="content">
                          <h2>'.$newDate.'</h2>
                          <p>'.$status.'</p>
                        </div>
                      </div>';

            }
        if ($pembelian->status == 'draft')
            {
                $originalDate = $pembelian->created_at;
                $newDate = '-';
                $status = '-';
                 
                echo '<div class="containerz right">
                        <div class="content">
                          <h2>'.$newDate.'</h2>
                          <p>'.$status.'</p>
                        </div>
                      </div>';

            }
         ?>


      <?php 
   
        if ($bayar->paid == 'PAID')
            {
                 $originalDate = $bayar->pay_date;
                 $newDate = date("d M Y", strtotime($originalDate));
                 $status = 'Telah dibayar PO <strong>#'.$bayar->code.'</strong> oleh manajer keuangan holding.';
                 echo '<div class="containerz left">
                        <div class="content">
                          <h2>'.$newDate.'</h2>
                          <p>'.$status.'</p>
                        </div>
                      </div>';

            }
         ?>

         <?php 
   
       /* if ($bayar->paid == 'PAID')
            {
                 $originalDate = $bayar->pay_date;
                 $newDate = date("d M Y", strtotime($originalDate));
                 $status = 'Barang dengan kode PO <strong>#'.$bayar->code.'</strong> dari vendor <strong>'.$pembelian->name.'</strong> akan dikirim ke alamat <strong>'.$bayar->delivery_address.'</strong>';
                 echo '<div class="containerz right">
                        <div class="content">
                          <h2>'.$newDate.'</h2>
                          <p>'.$status.'</p>
                        </div>
                      </div>';

            }*/
         ?>
  

</div>
        </div>
    </div>
</div>


