<?php

namespace App\Containers\AppSection\FinanceGroup\Tasks;

use App\Containers\AppSection\FinanceGroup\Data\Repositories\FinanceGroupRepository;
use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupFoundByIdEvent;
use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindFinanceGroupByIdTask extends ParentTask
{
    public function __construct(
        protected readonly FinanceGroupRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): FinanceGroup
    {
        try {
            $financegroup = $this->repository->find($id);
            FinanceGroupFoundByIdEvent::dispatch($financegroup);

            return $financegroup;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
