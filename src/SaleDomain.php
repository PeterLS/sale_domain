<?php

namespace PeterLS\SaleDomain;
class SaleDomain {
  private $template = __DIR__ . '/../templates/main_template.html';
  private $tags = [];

  public function __construct(array $additional_tags = []) {
    $this->tags = ['domain_name' => $this->getDomainName(), 'full_domain_name' => $this->getDomainName(true)];
    if (!empty($additional_tags))
      array_merge($additional_tags, $this->tags);
  }

  public function __toString(): string {
    return $this->getContent();
  }

  public function setTemplate(string $name) {
    if (file_exists($name)) {
      $this->template = $name;
    }
  }

  public function getContent(): string {
    $html = file_get_contents($this->template);
    $this->parseTags($html);
    return $html;
  }

  private function getDomainName(bool $full = false): string {
    $str = '';
    if ($full)
      $str = 'http://';
    $str .= $_SERVER['HTTP_HOST'];
    return $str;
  }

  private function parseTags(&$html) {
    foreach ($this->tags as $k => $v) {
      $html = str_replace("{{" . $k . "}}", $v, $html);
    }
  }
}