<span style="font-size:20px; font-weight: bold;background-color: <?php echo $color; ?>; color: #fff;"><?php echo get_quotation_id($invoice_info->code); ?>&nbsp;</span>

<div style="line-height: 10px;"></div>

<span><?php // echo lang("bill_date") . ": " . format_to_date($invoice_info->created_at, false); ?></span><br />

<span><?php echo "PO Date" . ": " . format_to_date($invoice_info->inv_date, false); ?></span>