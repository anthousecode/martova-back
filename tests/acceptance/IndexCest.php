<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 06.02.20
 * Time: 0:31
 */

namespace Tests\acceptance;

use AcceptanceTester;

class IndexCest
{
   public function testIndexPage(AcceptanceTester $I)
   {
       $I->amOnPage('/');
       $I->see('Foo');
   }
}