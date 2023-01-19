<?php

namespace IspManager\Methods\Dns\Domain;

class Edit extends \IspManager\AbstractHandler {

  protected string $method = 'domain.record.edit';

  public function __construct(string $record_id = null, string $domain = null)
  {
    parent::__construct($record_id, $domain);
    parent::setAdditional([
      'name' => '',
      'ttl' => '3600',
      'rtype' => '',
      'ip' => '',
      'domain' => '',
      'srvdomain' => '',
      'priority' => '',
      'weight' => '',
      'port' => '',
      'value' => '',
      'email' => '',
      'caa_flags' => '0',
      'caa_tag' => 'issue',
      'caa_value_domain' => '',
      'caa_value_email' => '',
      'ds_key_tag' => '',
      'ds_algorithm' => '3',
      'ds_digest_type' => '1',
      'ds_digest' => '',
      'tlsa_cert_usage' => '0',
      'tlsa_selector' => '0',
      'tlsa_matching_type' => '0',
      'tlsa_value' => '',
    ]);
  }
}