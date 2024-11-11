<?php

namespace App\Containers\AppSection\Account\Tasks;

use App\Containers\AppSection\Account\Data\Repositories\AccountRepository;
use App\Containers\AppSection\Account\Events\AccountUpdatedEvent;
use App\Containers\AppSection\Account\Models\Account;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateAccountTask extends ParentTask
{
    public function __construct(
        protected readonly AccountRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Account
    {
        try {
            $account = $this->repository->update($data, $id);
            AccountUpdatedEvent::dispatch($account);

            return $account;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
