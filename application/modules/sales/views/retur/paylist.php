
                    <?php if($query){ foreach($query as $row){ ?>
                    <tr>
                        <td><strong><?php echo $row->code ?></strong></td>
                        <td class="text-center"><?php echo $row->paid; ?></td>
                        <!-- <td class="text-center "><?php echo $row->memo; ?></td> -->
                        <td class="w50"><?php echo format_to_date($row->pay_date) ?></td>
                       
                        <td class="text-center " ><?php echo $row->quantity; ?></td> 
                        
                        <td align="right" class="w150"><?php if($row->residual > 0){ echo to_currency($row->residual); }else{  echo to_currency($row->amount); } ?></td>
                        <td class="text-center w50">
                            <a href="#" class="btn btn-primary btn-sm" title="Retur" data-post-id="<?php echo $row->id ?>" data-act="ajax-modal" data-title="INVOICES <?php echo $row->code ?>" data-action-url="<?php echo get_uri("sales/s_retur/modal_form_pay") ?>"><i class="fa fa-exchange"></i> RETUR</a>
                        </td>
                    </tr>
                <?php }
                    }else{ ?>
                        <tr>
                            <td colspan="5"><center>No Records Found</center></td>
                        </tr>
                <?php   } ?>
               
