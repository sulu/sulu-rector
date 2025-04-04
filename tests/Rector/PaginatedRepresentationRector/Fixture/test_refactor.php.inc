<?php

use Sulu\Component\Rest\ListBuilder\ListRepresentation;

class Test implements ListBuilderInterface
{
    public function invoke() {
        return new ListRepresentation(
            $activities,
            ActivityInterface::RESOURCE_KEY,
            'sulu_activity.get_activities',
            $request->query->all(),
            $listBuilder->getCurrentPage(),
            $listBuilder->getLimit(),
            $listBuilder->count()
        );
    }
}
-----
<?php

class Test implements ListBuilderInterface
{
    public function invoke() {
        return new \Sulu\Component\Rest\ListBuilder\PaginatedListRepresentation(
            $activities,
            ActivityInterface::RESOURCE_KEY,
            (int) $listBuilder->getCurrentPage(),
            (int) $listBuilder->getLimit(),
            (int) $listBuilder->count()
        );
    }
}
