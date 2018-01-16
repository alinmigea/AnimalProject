<?php

namespace AnimalProject\Modules\User\Repositories;

use AnimalProject\Modules\User\Contracts\UserRepositoryContract;
use AnimalProject\Modules\User\Models\User;

/**
 * Class UserRepository
 * @package AnimalProject\Modules\User\Repositories
 */
class UserRepository implements UserRepositoryContract
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Search after a specific user.
     *
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Collection|mixed|static[]
     */
    public function search(array $filters = [])
    {
        $query = $this->user->newQuery();

        if(isset($filters['name']))
        {
            $query->where('name','=', $filters['name']);
        }

        if(isset($filters['id'])) {
            $query->where('id', '=', $filters['id']);
        }

        return $query->get();
    }
}