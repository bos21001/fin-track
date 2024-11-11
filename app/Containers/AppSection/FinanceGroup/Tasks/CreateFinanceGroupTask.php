<?php

namespace App\Containers\AppSection\FinanceGroup\Tasks;

use App\Containers\AppSection\FinanceGroup\Data\Repositories\FinanceGroupRepository;
use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupCreatedEvent;
use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateFinanceGroupTask extends ParentTask
{
    public function __construct(
        protected readonly FinanceGroupRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): FinanceGroup
    {
        try {
            $financegroup = $this->repository->create($data);
            FinanceGroupCreatedEvent::dispatch($financegroup);

            return $financegroup;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
