<?php

namespace Modules\Advertising\Repositories;

use Modules\Advertising\App\Models\Advertising;

class AdvertisingRepo
{

    public function index()
    {
        return $this->query()->latest();
    }

    public function destroy($advertising)
    {
        return $advertising->delete();
    }

    private function query()
    {
        return Advertising::query();
    }


}
