<?php

/* PHPUnit Test */
require_once 'PHPUnit/Framework/Test.php';
/* PHPUnit Test Case */
require_once 'PHPUnit/Framework/TestCase.php';
/* PHPUnit Test Suite */
require_once 'PHPUnit/Framework/TestSuite.php';
/* PHPUnit Test Result */
require_once 'PHPUnit/Framework/TestResult.php';

/* Pretty Listener Class */
require_once 'PrettyListener.php';

/**
 * Pretty Listener PHPUnit Test
 *
 * @see https://github.com/stjohnjohnson/prettylistener-phpunit
 */
class PrettyListenerTest extends PHPUnit_Framework_TestCase {
  /**
   * @test
   * @group PrettyListener
   * @group PrettyListener.emptyMethods
   */
  public function emptyMethods() {
    $listener = new PrettyListener();
    $test = new FrameworkMockTest();

    // These do nothing, so expect nothing
    $this->assertNull($listener->addError($test, new \Exception(), 15));
    $this->assertNull($listener->addFailure($test, new \PHPUnit_Framework_AssertionFailedError(), 15));
    $this->assertNull($listener->addIncompleteTest($test, new \Exception(), 15));
    $this->assertNull($listener->addSkippedTest($test, new \Exception(), 15));
  }

  /**
   * @test
   * @group PrettyListener
   * @group PrettyListener.startEndTest
   */
  public function startEndTest() {
    $listener = new PrettyListener();
    $test = new FrameworkMockTest();

    $listener->startTest($test);
    $this->assertEquals(1, $listener->depth);
    $this->expectOutputString("\nUnitTest ");

    $listener->endTest($test, 5);
    $this->assertEquals(0, $listener->depth);
  }

  /**
   * @test
   * @group PrettyListener
   * @group PrettyListener.startEndSuite
   */
  public function startEndSuite() {
    $listener = new PrettyListener();
    $suite = new PHPUnit_Framework_TestSuite('','Bob');

    $listener->startTestSuite($suite);
    $this->assertEquals(1, $listener->depth);
    $listener->startTestSuite($suite);
    $this->assertEquals(2, $listener->depth);
    $listener->startTestSuite($suite);
    $this->assertEquals(3, $listener->depth);
    $this->expectOutputString("\n\n\n\n  \n\n    ");

    $listener->endTestSuite($suite, 5);
    $this->assertEquals(2, $listener->depth);
    $listener->endTestSuite($suite, 5);
    $this->assertEquals(1, $listener->depth);
    $listener->endTestSuite($suite, 5);
    $this->assertEquals(0, $listener->depth);
  }
}

class FrameworkMockTest implements PHPUnit_Framework_Test {
  public function count() {
    return 0;
  }

  public function run(PHPUnit_Framework_TestResult $result = NULL) {

  }

  public function getName() {
    return 'UnitTest';
  }
}