<?php declare(strict_types=1);

namespace Application\Messaging\Plugin;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

use Stub\Infrastructure\Messaging\MessageStub;

class ExampleFilterTest extends TestCase
{
    use ProphecyTrait;
    
    public function testMatchesMyFavoriteEvent(){
        $sut = new ExampleFilter();

        $message = (new MessageStub())->withHeader('name', 'MyFavoriteEventName');

        $this->assertTrue($sut->matches($message));
    }
}
