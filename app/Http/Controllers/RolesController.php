<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RolesRepository;
use Illuminate\Http\Request;
use Flash;

class RolesController extends AppBaseController
{
    /** @var RolesRepository $rolesRepository*/
    private $rolesRepository;

    public function __construct(RolesRepository $rolesRepo)
    {
        $this->rolesRepository = $rolesRepo;
    }

    /**
     * Display a listing of the Roles.
     */
    public function index(Request $request)
    {
        $roles = $this->rolesRepository->paginate(10);

        return view('roles.index')
            ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new Roles.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created Roles in storage.
     */
    public function store(CreateRolesRequest $request)
    {
        $input = $request->all();

        $roles = $this->rolesRepository->create($input);

        Flash::success('Roles saved successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Roles.
     */
    public function show($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified Roles.
     */
    public function edit($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        return view('roles.edit')->with('roles', $roles);
    }

    /**
     * Update the specified Roles in storage.
     */
    public function update($id, UpdateRolesRequest $request)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        $roles = $this->rolesRepository->update($request->all(), $id);

        Flash::success('Roles updated successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Roles from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $roles = $this->rolesRepository->find($id);

        if (empty($roles)) {
            Flash::error('Roles not found');

            return redirect(route('roles.index'));
        }

        $this->rolesRepository->delete($id);

        Flash::success('Roles deleted successfully.');

        return redirect(route('roles.index'));
    }
}
