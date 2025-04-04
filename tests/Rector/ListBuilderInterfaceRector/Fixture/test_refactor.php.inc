<?php

use Sulu\Component\Rest\ListBuilder\ListBuilderInterface;

class Test implements ListBuilderInterface
{
    public function invoke() {
        $this->whereNot($fieldDescriptor, 'value');
    }
}
-----
<?php

use Sulu\Component\Rest\ListBuilder\ListBuilderInterface;

class Test implements ListBuilderInterface
{
    public function invoke() {
        $this->where($fieldDescriptor, 'value', ListBuilderInterface::WHERE_COMPARATOR_UNEQUAL);
    }
}
