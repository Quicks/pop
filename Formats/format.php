<?php
  namespace Formats;

  include_once './Interfaces/iRender.php';
  include_once './Interfaces/iFormatData.php';

  include_once './Traits/render.php';

  use \Interfaces\iRender as iRender;
  use \Interfaces\iFormatData as iFormatData;
  use \Traits\Render as RenderTrait;

  abstract class Format implements iRender, iFormatData
  {
    use RenderTrait;
  }

 
?>
