<?php

namespace AnimalProject\Modules\User\Contracts;

/**
 * Interface UserRepositoryContract
 * @package AnimalProject\Modules\User\Contracts
 */
interface UserRepositoryContract
{
    /**
     * Search after a specific user.
     *
     * @param array $filters
     * @return mixed
     */
    public function search(array $filters = []);

}