<?php

namespace IspManager\Interfaces;

/**
 * Interface Credentials
 *
 * @package IspManager\Interfaces
 */
interface Credentials
{
  /**
   * @return string
   */
  public function getLogin(): string;

  /**
   * @return string
   */
  public function getPassword(): string;
}
