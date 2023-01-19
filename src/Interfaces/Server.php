<?php

namespace IspManager\Interfaces;

/**
 * Interface Server
 *
 * @package IspManager\Interfaces
 */
interface Server {

  /**
   * @return string
   */
  public function getStringUri(): string;

  /**
   * @return string
   */
  public function getHost(): string;

  /**
   * @return string
   */
  public function getAuth(): string;

  /**
   * @param string[] $result
   *
   * @return string[]|bool[]
   */
  public function setAuth(array $result): array;

  /**
   * @return int
   */
  public function getPort(): int;

  /**
   * @return string
   */
  public function getScheme(): string;
}