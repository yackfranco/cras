<?php

class myConfig extends config {
  private $dirUploads;
  function getDirUploads() {
    return $this->dirUploads;
  }

  function setDirUploads($dirUploads) {
    $this->dirUploads = $dirUploads;
  }


}