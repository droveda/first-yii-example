<?php

namespace app\components;

use yii\base\Component;
use yii\base\Event;

class MessageEvent extends Event {
    public $someMessage;
}

class Foo extends Component {

    const EVENT_HELLO = 'hello';


    public function bar() {
        $event = new MessageEvent();
        $event->someMessage = 'Some message to pass..';
        $this->trigger(self::EVENT_HELLO, $event);
    }

}

?>