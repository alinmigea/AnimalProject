<?php

namespace AnimalProject\Modules\User\Controllers;

use AnimalProject\Http\Controllers\Controller;
use AnimalProject\Modules\User\Contracts\UserRepositoryContract;
use AnimalProject\Modules\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

/**
 * Class UserController
 * @package AnimalProject\Modules\User\Controllers
 */
class UserController extends Controller
{
    /**
     * @var UserRepositoryContract
     */
    private $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepositoryContract $userRepository
     */
    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Search a user after id.
     *
     * @param Request $request
     * @param int|null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request, int $id = null)
    {
        $filters['id'] = isset($id) ? $id : '';

        $users = $this->userRepository->search($filters);

        return view('user.dashboard', ['users' => $users]);
    }

    /**
     * Get all users.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all(Request $request)
    {
        $users = $this->userRepository->search([]);

        return view('user.dashboard', ['users' => $users]);
    }

    /**
     * Get the create user view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Save the user.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $user = app(User::class);

        $user->name     = Input::get('name');
        $user->email    = Input::get('email');
        $user->password = bcrypt(Input::get('password'));
        $user->phone    = Input::get('phone');
        $user->address  = Input::get('address');

        $user->save();

        return Redirect::to('users');
    }
}