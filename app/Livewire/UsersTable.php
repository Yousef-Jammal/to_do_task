<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UsersTable extends Component
{
    use WithPagination;

    private $users;
    public $userId, $name, $email, $password;
    public $isOpen = false;
    public $isDeleteOpen = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId, // Ignore current user ID for updates
            'password' => $this->userId ? 'nullable|string|min:8' : 'required|string|min:8', // Required for create, optional for update
        ];
    }

    public function render()
    {
        $users = User::role('user')->select('id', 'name', 'email', 'created_at')->paginate(5);
        return view('livewire.users-crud', [
            'users' => $users,
            'name' => $this->name,
            'email' => $this->email,
            'userId' => $this->userId,
            'password' => $this->password,
        ]);
    }

    public function init()
    {
        $this->dispatch('init-modals');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = ''; // Leave password empty for edits (won't prefill)
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        // Only include password if it's provided (for updates) or required (for creates)
        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        User::updateOrCreateUser($this->userId, $data);

        $this->userId ? $this->dispatch('update-user') : $this->dispatch('create-user') ;

        $this->closeModal();
        $this->resetInputFields();
    }

    public function deleteConfirm($id)
    {
        $this->userId = $id;
        $this->isDeleteOpen = true;
    }
    
    public function delete()
    {
        User::find($this->userId)->delete();
        $this->dispatch('delete-user');
        $this->isDeleteOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->userId = '';
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->isDeleteOpen = false;
    }
}