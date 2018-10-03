<?php
$company_address = nl2br(get_setting("company_address"));
$company_nip = nl2br(get_setting("company_nip_number"));
$company_phone = get_setting("company_phone");
$company_email = get_setting("company_email");
$company_website = get_setting("company_website");
$banking_number = get_setting("banking_number");
?><div><b><?php echo get_setting("company_name"); ?></b></div>
<div style="line-height: 3px;"> </div>
<span class="invoice-meta" style="font-size: 90%; color: #666;"><?php
    if ($company_address) {
        echo $company_address;
    }
    ?>
    <?php if ($company_nip) { ?>
        <div style="line-height: 1px;"> </div><br /><?php echo lang("nip") . ": " . $company_nip; ?>
    <?php } ?>
    <?php if ($company_phone) { ?>
        <div style="line-height: 1px;"> </div><br /><?php echo lang("phone") . ": " . $company_phone; ?>
    <?php } ?>
    <?php if ($company_email) { ?>
        <div style="line-height: 1px;"> </div><br /><?php echo lang("email") . ": " . $company_email; ?>
    <?php } ?>
    <?php if ($company_website) { ?>
        <div style="line-height: 2px;"> </div><br /><?php echo lang("website"); ?>: <a style="color:#666; text-decoration: none;" href="<?php echo $company_website; ?>"><?php echo $company_website; ?></a>
    <?php } ?>
    <?php if ($banking_number) { ?>
        <div style="line-height: 2px;"> </div><br /><?php echo lang("banking_number"); ?>: <?php echo $banking_number; ?>
    <?php } ?>
</span>