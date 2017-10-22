<?php
  namespace Traits;
  include_once './response.php';

  trait Render
  {
    function render()
    {
      $this->formatedData();
    }
  }
