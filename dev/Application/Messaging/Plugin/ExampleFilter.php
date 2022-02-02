<?php declare(strict_types=1);

namespace Application\Messaging\Plugin;

use Application\Messaging\Filter;
use Application\Messaging\Message;

class ExampleFilter implements Filter
{
    public function __construct(array $arg = [])
    {
       
    }

    public function matches(Message $message): bool
    {
        return $message->getHeader('name') == 'MyFavoriteEventName';
    }
}
