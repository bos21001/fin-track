<?php

namespace App\Containers\AppSection\Account\Tasks;

use App\Containers\AppSection\Account\Data\Repositories\AccountRepository;
use App\Containers\AppSection\Account\Events\AccountCreatedEvent;
use App\Containers\AppSection\Account\Models\Account;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateAccountTask extends ParentTask
{
    public function __construct(
        protected readonly AccountRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Account
    {
        try {
            $account = $this->repository->create($data);
            AccountCreatedEvent::dispatch($account);

            return $account;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
