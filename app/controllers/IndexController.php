<?php

/**
 * 首页
 */
class IndexController extends ControllerBase
{

  public function indexAction()
  {
  	echo 1;exit;
  }

  public function nopowerAction()
  {
  	echo 'no power';exit;
  }

  public function er404Action()
  {
  	echo 404;exit;
  }
}