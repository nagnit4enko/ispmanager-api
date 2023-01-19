<?php

namespace IspManager\Methods\WebDomain;

/**
 * Class Edit
 *
 * @package IspManager\Methods\WebDomain
 */
class Edit extends \IspManager\AbstractHandler {

  /**
   * @var string
   */
  protected string $method = 'webdomain.edit';

  /**
   * Edit constructor.
   *
   * @param null|string $domain
   */
  public function __construct(string $domain = null){
    parent::__construct($domain);
    parent::setAdditional([
      "name" => $domain,
      "currname" => $domain,
      "limit_ssl" => "on",
      "limit_cgi" => "on",
      "php_enable" => "on",
      "aliases" => "www.{$domain}",
      "home" => "www/{$domain}",
      "ipsrc" => "auto",
      "ipaddrs" => "",
      "email" => "webmaster@{$domain}",
      "cancreatebox" => "",
      "emailcreate" => "off",
      "passwd" => "",
      "confirm" => "",
      "charset" => "off",
      "charset_info" => "",
      "dirindex" => "index.php index.html",
      "ssi" => "on",
      "autosubdomain" => "off",
      "php" => "on",
      "php_mode" => "php_mode_fcgi_apache",
      "php_cgi_version" => "php74",
      "php_apache_version" => "native",
      "cgi" => "off",
      "wp_test" => "off",
      "nginx_static_ext" => "jpg|jpeg|gif|png|svg|js|css|mp3|ogg|mpe?g|avi|zip|gz|bz2?|rar|swf|mp4",
      "python" => "off",
      "passenger_python_version" => "python-2.7.15",
      "phpini_for_domain" => "on",
      "log_access" => "on",
      "log_error" => "on",
      "show_params" => "yes",
      "rotation_period" => "every_day",
      "rotation_size" => "100",
      "rotation_count" => "10",
      "analyzer" => "off",
      "analyzer_period" => "rotate",
      "analyzer_secure" => "on",
      "srv_gzip" => "on",
      "gzip_level" => "5",
      "show_cache" => "on",
      "srv_cache" => "on",
      "expire_times" => "expire_times_d",
      "expire_period" => "45"
    ]);
  }
}