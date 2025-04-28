<?php
namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'admin',
                'author',
            ]),
        ];
    }

    public function admin()
    {
        return $this->state([
            'id'   => 1,
            'name' => 'admin',
        ]);
    }

    public function author()
    {
        return $this->state([
            'id'   => 2,
            'name' => 'author',
        ]);
    }
}
