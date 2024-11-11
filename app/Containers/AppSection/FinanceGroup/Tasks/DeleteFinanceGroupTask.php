<?php

namespace App\Containers\AppSection\FinanceGroup\Tasks;

use App\Containers\AppSection\FinanceGroup\Data\Repositories\FinanceGroupRepository;
use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteFinanceGroupTask extends ParentTask
{
    public function __construct(
        protected readonly FinanceGroupRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            FinanceGroupDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
