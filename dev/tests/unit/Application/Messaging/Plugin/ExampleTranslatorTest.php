<?php declare(strict_types=1);

namespace Application\Messaging\Plugin;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

use Stub\Infrastructure\Messaging\MessageStub;

class ExampleTranslatorTest extends TestCase
{
    use ProphecyTrait;
    
    public function testMatchesMyFavoriteEvent(){
        $sut = new ExampleTranslator();

        $originalMessage = (new MessageStub())->withBody('abody');
        $expectedMessage = (new MessageStub())->withBody('abody! (translated by ExampleTranslator)');

        $this->assertEquals($expectedMessage, $sut->translate($originalMessage));
    }
}
