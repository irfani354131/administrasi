
                    <?php if($query){ foreach($query as $row){ ?>
                    <tr>
                        <td><strong><?php echo $row->code ?></strong></td>
                        <td class="text-center"><?php echo $row->paid; ?></td>
                        <!-- <td class="text-center "><?php echo $row->memo; ?></td> -->
                        <td class="w50"><?php echo format_to_date($row->inv_date) ?></td>
                        <?php if(format_to_date($row->end_date) == date("d-m-Y")){ ?>
                         <td class="text-center " style="color: red;"><?php echo format_to_date($row->end_date); ?></td> 
                        <?php }else{ ?>
                        <td class="text-center " ><?php echo format_to_date($row->end_date); ?></td> 
                        
                        <?php } ?>
                        <td align="right" class="w150"><?php if($row->residual > 0){ echo to_currency($row->residual); }else{  echo to_currency($row->amount); } ?></td>
                        <td class="text-center w50">
                            <a href="#" class="btn btn-primary btn-sm" title="Mark As Pay" data-post-id="<?php echo $row->id ?>" data-act="ajax-modal" data-title="INVOICES <?php echo $row->code ?>" data-action-url="<?php echo get_uri("sales/s_payments/modal_form_pay") ?>"><i class="fa fa-money"></i> PAY</a>
                        </td>
                    </tr>
                <?php }
                    }else{ ?>
                        <tr>
                            <td colspan="5"><center>No Records Found</center></td>
                        </tr>
                <?php   } ?>
               
