<?php

namespace IspManager\Methods\Mail;

/**
 * Class Add
 *
 * @package IspManager\Methods\Mail
 */
class Add extends \IspManager\AbstractHandler {

  /**
   * @var string
   */
  protected string $method = 'email.edit';

  /**
   * Add constructor.
   *
   * @param string $domain
   */
  public function __construct(string $domain){
    parent::__construct();
    parent::setAdditional([
      'name' => 'mail',
      'hidegreylist' => '',
      'hidespamassassin' => 'on',
      'domainname' => $domain,
      'aliases' => '',
      'passwd' => '',
      'confirm' => '',
      'forward' => '',
      'dontsave' => 'off',
      'maxsize' => '',
      'spamassassin' => 'on',
      'note' => ''
    ]);
  }


}