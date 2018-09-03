<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="base_url" style="display: none;"><?=base_url()?></div>
<table class="table table-hover">
    <tr>
        <th>Invoice No.</th>
        <th>Invoice Date</th>
        <th>Sold By</th>
        <th>Sold To</th>
        <th>Site</th>
        <th>Customer Email</th>
        <th>Customer Phone</th>
        <th>Status</th>
        <th></th>
    </tr>
    <?php foreach($invoices as $invoice) { 
        if($invoice->getInvoice_status() == 'Partial') {
            $status = '<span class="text-warning">Partial</span>';
        } elseif($invoice->getInvoice_status() == 'Open') {
            $status = '<span class="text-error">Open</span>';
        } elseif($invoice->getInvoice_status() == 'Closed') {
            $status = '<span class="text-success">Closed</span>';
        } else {
            $status = '<span>Unknown</span>';
        }
    ?>
    <tr id="<?=$invoice->getInvoice_number()?>">
        <td class="invoice_number"><?=$invoice->getInvoice_number()?></td>
        <td class="created_on"><?=date('m/d/Y',strtotime($invoice->getCreated_on()))?></td>
        <td class="sold_by"><?=$invoice->getUser_first_name().' '.$invoice->getUser_last_name()?></td>
        <td class="sold_to"><?=$invoice->getCustomer_first_name().' '.$invoice->getCustomer_last_name()?></td>
        <td class="site"><?=$invoice->getUser_site()?></td>
        <td class="customer_email"><?=$invoice->getCustomer_email()?></td>
        <td class="customer_phone"><?=$invoice->getCustomer_phone()?></td>
        <td class="status"><?=$status?></td>
        <td>
            <div class="btn-group pull-right">
                <a class="btn btn-mini dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-position">
                    <li>
                        <a class="send_full_invoice" href="#">Send Full Invoice</a>
                    </li>
                    <li>
                        <a class="send_partial_invoice" href="#">Send Partial Invoice</a>
                    </li>
                    <li>
                        <a class="view_invoice_details" href="#">View Invoice Details</a>
                    </li>
                </ul>
            </div>
        </td>
        
    </tr>
    <?php } ?>
</table>

<script type="text/javascript">

    $(document).ready(function() {
        
        $('.view_invoice_details').click(function(){
            var invoice_number = $(this).closest('tr').attr('id');
            var url = $('.base_url').text() + 'index.php/invoice/invoice_details/' + invoice_number;
            window.location.replace(url);
        });
    });
    
</script>