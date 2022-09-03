<?php

declare(strict_types = 1);
namespace App;

class Aierline{
 
    private string $name;
    private string $code; 
    private boolean $sign_in_available;
    private boolean $sign_up_available;
    private string $display_name;
    private boolean $is_commercial;
    private boolean $employee_number_required;
    private boolean $partner;
    private string $lang;
    private string $currency;
    private array $email_domains;
    private string $airline_blog_uri;
    private string $white_label_url;

    public function _construct(array $data)
    {
        foreach($data as $key => $val) {
            if(property_exists(__CLASS__,$key)) {
                $this->$key = $val;
            }
        }
    }
 
}