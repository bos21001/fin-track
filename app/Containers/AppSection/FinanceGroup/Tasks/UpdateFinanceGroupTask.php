<?php

namespace App\Containers\AppSection\FinanceGroup\Tasks;

use App\Containers\AppSection\FinanceGroup\Data\Repositories\FinanceGroupRepository;
use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupUpdatedEvent;
use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateFinanceGroupTask extends ParentTask
{
    public function __construct(
        protected readonly FinanceGroupRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): FinanceGroup
    {
        try {
            $financegroup = $this->repository->update($data, $id);
            FinanceGroupUpdatedEvent::dispatch($financegroup);

            return $financegroup;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
