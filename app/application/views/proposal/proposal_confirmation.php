<?php
$image = base_url() . APPPATH . "images/logo/" . $this->session->userdata('user_client_id') . ".png";
?>
<style>
    .wrapper {
        width: 1000px !important;
        margin: 0 auto;
        display: table;
    }
</style>
<div class="proposal_confirmation_container">
    <div class="seller pull-left">
        <img class="confirmation_logo_image" src="<?= $image ?>">
        <address>
            <span style="display: block;" class="pull-left"><h4 class="text-info">Seller</h4></span><br><br>
            <span style="display: block;" class="pull-left"><strong><?= $header_details->getClientName() ?></strong></span><br><br>
            <span style="display: block;" class="pull-left"><?= $header_details->getClientAdd1() ?></span>
            <?php
            $tempVar = $header_details->getClientAdd2();
            if (!empty($tempVar)) {
                ?>
                <span class="pull-left"><?= ', ' . $header_details->getClientAdd2() ?></span><br>
                <?php
            } else {
                ?>
                <br>
                <?php
            }
            $tempVar = $header_details->getClientCity();

            if (!empty($tempVar)) {
                ?>
                <span class="pull-left"><?= $header_details->getClientCity() ?></span>
                <?php
            }

            $tempVar = $header_details->getClientState();
            $tempVar = trim($tempVar);

            if (!empty($tempVar)) {
                ?>
                <span class="pull-left"><?= ', ' . $header_details->getClientState() ?></span>
                <?php
            }

            $tempVar = $header_details->getClientZip();

            if (!empty($tempVar)) {
                ?>
                <span class="pull-left">&nbsp;<?= $header_details->getClientZip() ?></span>
                <?php
            }
            ?>
            <br><br>
            <?php
            $tempVar = $header_details->getClientPhone();
            if (!empty($tempVar)) {
                ?>
                <span class="pull-left">P: 
                <?= "(" . substr($tempVar, 0, 3) . ") " . substr($tempVar, 3, 3) . "-" . substr($tempVar, 6) ?></span><br>
                <?php
            }

            $tempVar = $header_details->getClientFax();
            if (!empty($tempVar)) {
                ?>
                <span class="pull-left">F: 
                <?= "(" . substr($tempVar, 0, 3) . ") " . substr($tempVar, 3, 3) . "-" . substr($tempVar, 6) ?></span><br>
                <?php
            }

            $tempVar = $header_details->getClientEmail();
            if (!empty($tempVar)) {
                ?>
                <span class="pull-left">E: 
                    <a href="mailto:#"><?= $header_details->getClientEmail() ?></a></span><br>
    <?php
}
?>
        </address>
    </div>
    <div class="buyer pull-left">
        <address>
            <span  style="display: block;" class="pull-left"><h4 class="text-info">Buyer</h4></span><br><br>
            <span  style="display: block;" class="pull-left"><strong>
            <?= $header_details->getCustomersFirstName() . ' ' . $header_details->getCustomersLastName() ?>
                </strong></span><br><br>
            <span  style="display: block;" class="pull-left"><?= $header_details->getCustomersAddress1() ?></span>
            <?php
            $tempVar = $header_details->getCustomersAddress2();
            if (!empty($tempVar)) {
                ?>
                <span class="pull-left"><?= ', ' . $header_details->getCustomersAddress2() ?></span><br>
                <?php
            } else {
                ?>
                <br>
                <?php
            }

            $tempVar = $header_details->getCustomersCity();

            if (!empty($tempVar)) {
                ?>
                <span class="pull-left"><?= $header_details->getCustomersCity() ?></span>
            <?php
            }

            $tempVar = $header_details->getCustomersState();
            ?>

            <?php if (!empty($tempVar)) { ?>
                <span class="pull-left"><?= ', ' . $tempVar ?></span>
            <?php
            }

            $tempVar = $header_details->getCustomersZip();
            ?>

            <?php if (!empty($tempVar)) { ?>
                <span class="pull-left">&nbsp;<?= $header_details->getCustomersZip() ?></span>
                <?php
            }
            ?>
            <br><br>
                <?php
                $tempVar = $header_details->getCustomersPhone();
                if (!empty($tempVar)) {
                    ?>
                <span class="pull-left">P: 
                <?php
                $phone = $header_details->getCustomersPhone();
                echo "(" . substr($phone, 0, 3) . ") " . substr($phone, 3, 3) . "-" . substr($phone, 6);
                ?>
                </span><br>
                <?php
            }

            $tempVar = $header_details->getCustomersEmail();
            if (!empty($tempVar)) {
                ?>
                <span class="pull-left">E: 
                    <a href="mailto:#"><?= $header_details->getCustomersEmail() ?></a></span><br>
    <?php
}
?>
        </address>
    </div>
    <div class="pull-left sale_id">
        <table class='sale_data'>
            <tr>
                <th>Sale No.</th>
                <th>Sale Date</th>
                <th>Sold By</th>
                <th>Site</th>
            </tr>
            <tr>
                <td>
                    <?php
                    if (isset($sale_number)) {
                        print $sale_number;
                    } else {
                        print '';
                    }
                    ?>
                </td>
                <td><?= date('m/d/Y') ?></td>
                <td><?= $this->session->userdata('user_first_name') . ' ' . $this->session->userdata('user_last_name') ?></td>
                <td><?= $this->session->userdata('site_name') ?></td>
            </tr>
        </table>
    </div>
    <div class="pull-left line_items" style="width: 1030px !important;">
        <table class="table table-hover">
            <tr>
                <th class="proposal line"><strong class="text-info">Line#</strong></th>
                <th class="proposal part"><strong class="text-info">Part#</strong></th>
                <th class="proposal description"><strong class="text-info">Description</strong></th>
                <th class="proposal qty"><strong class="text-info">Qty</strong></th>
                <th class="proposal sell_price"><strong class="text-info">Sell Price</strong></th>
                <th class="proposal extended_price"><strong class="text-info">Extended Price</strong></th>
            </tr>

            <?php
            $total = 0;
            $fees = 0;
            $tax = $this->session->userdata('city_tax') + $this->session->userdata('state_tax');
            $i = 0;

            if (!empty($proposal_summary)) {
                foreach ($proposal_summary as $line) {
                    ?>        
                    <tr>
                        <td class="proposal line"><?= ++$i ?></td>
                        <td class="proposal part"><?= $line->getItemPartNumber() ?></td>
                        <td class="proposal description"><?= $line->getItemDescription() ?></td>
                        <td class="proposal qty"><?= $line->getItemQty() ?></td>
                        <td class="proposal sell_price">$<?= number_format($line->getItemPrice(), 2, '.', ',') ?></td>
                        <td class="proposal extended_price">$<?= number_format($line->getItemExtendedPrice(), 2, '.', ',') ?></td>
                    </tr>
                    <?php
                    $total = $total + $line->getItemExtendedPrice();
                }
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="proposal sub_total">Subtotal</td>
                <td class="proposal sub_total">$<?= number_format($total, 2, '.', ',') ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="proposal fees">Fees</td>
                <td class="proposal fees">$<?= number_format($fees, 2, '.', ',') ?></td>
            </tr>
<?php
$total_tax = number_format((($total + $fees) * $tax / 100), 2, '.', ',');
?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="proposal tax">Taxes</td>
                <td class="proposal tax">$<?= $total_tax ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="proposal total"><strong>Total</strong></td>
                <td class="pull-right"><strong>$<?= number_format(($total + $fees + $total_tax), 2, '.', ',') ?></strong></td>
            </tr>
        </table>
    </div>
    <!--
    <div class="pull-left line_items" style="width: 1030px !important">
        <ul style="text-align: left;">
            <li>Warranty (TBD)</li>
            <li>Return Policy (TBD)</li>
            <li>Exchanges (TBD)</li>
            <li>Return Shipping (TBD)</li>
        </ul>
    </div>
    -->
</div>

<script type="text/javascript">
    $(document).ready(function() {
        if ($('.seller').height() > $('.buyer').height()) {
            $('.buyer').height($('.seller').height());
        }
        else {
            $('.seller').height($('.buyer').height());
        }
    });
</script>