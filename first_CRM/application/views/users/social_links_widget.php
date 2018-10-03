<?php

//available social link types and icon 
$social_link_icons = array(
    "facebook" => "fab fa-facebook-f",
    "twitter" => "twitter",
    "linkedin" => "fab fa-linkedin-in",
    "googleplus" => "fab fa-google",
    "digg" => "digg",
    "youtube" => "youtube",
    "pinterest" => "pinterest",
    "instagram" => "instagram",
    "github" => "github",
    "tumblr" => "tumblr",
    "vine" => "vine",
);
$links = "";

foreach ($social_link_icons as $key => $icon) {
    if (isset($weblinks->$key) && $weblinks->$key) {
        $address = to_url($weblinks->$key); //check http or https in url
        $links.="<a target='_blank' href='$address' class='social-link $icon'></a>";
    }
}
echo $links;
?>
