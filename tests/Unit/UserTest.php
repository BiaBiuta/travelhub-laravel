<?php

use App\Models\User;

test('choose department for user', function () {
    $department = \App\Models\Department::factory()->create();
    $user = User::factory()->create(['department_id' => $department->id]);
    expect($user->department->is($department))->toBeTrue();
});
