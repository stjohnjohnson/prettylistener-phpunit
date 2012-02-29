PrettyListener (PHPUnit)
========================

This is a really simple Listener for PHPUnit that presents a much better view/progress of tests.


Usage
-----

To leverage this class, just include it at the bottom of your `phpunit.xml` file:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit>

....

  <listeners>
    <listener class="PrettyListener" file="/path/to/PrettyListener.php"></listener>
  </listeners>
</phpunit>
```

Example
-------

This is using the Test Suite from my [Scrabbler bot](https://github.com/stjohnjohnson/scrabbler-bot).

```bash
$ phpunit
PHPUnit 3.6.4 by Sebastian Bergmann.

Configuration read from /tmp/scrabbler/phpunit.xml



Scrabbler Bot

  Board
    Initialized .
    SetGet .
    Flipped .
    MoveAt .
    Output .
    Anchors .
    CrossChecks .
    LetterPoints .
    WalkPlay .
    ValidMove .
    TopDownScore .

  Game
    Construct .
    Log .
    Command .
    Execute .
    Trades .
    SimulateTrader .
    SimulateBadMove .
    SimulateBadTrade .
    SimulateSimple .
    SimulateOutOfLetters .
    SimulateTradeTooMuch .

  Lexicon
    AddValidWord .
    AddInvalidWord .
    FromFile .
    NodeAt .
    FindWordsEmpty .
    FindWordsComplex .
    FindWordsSingle .
    FindWordsEdge .

  Move
    FromWord .
    Position .
    ToString .
    FromString .
    AssignScore .

  Player
    Construct .
    ChooseAction .
    HighestLowestScore .
    MostWords .
    MostLeastLetters .
    LongestShortestWord .

Time: 2 seconds, Memory: 15.75Mb

OK (41 tests, 387 assertions)

```
