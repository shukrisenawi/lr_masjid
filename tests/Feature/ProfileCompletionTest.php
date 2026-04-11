<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileCompletionTest extends TestCase
{
    use RefreshDatabase;

    public function test_incomplete_profile_user_is_redirected_to_profile_page(): void
    {
        $user = User::factory()->create([
            'full_name' => null,
            'phone' => null,
            'avatar_path' => null,
        ]);

        $response = $this->actingAs($user)->get('/members');

        $response->assertRedirect(route('profile.edit'));
    }

    public function test_incomplete_profile_user_can_still_open_profile_page(): void
    {
        $user = User::factory()->create([
            'full_name' => null,
            'phone' => null,
            'avatar_path' => null,
        ]);

        $response = $this->actingAs($user)->get('/profile');

        $response->assertOk();
    }

    public function test_completed_profile_user_can_access_dashboard(): void
    {
        $user = User::factory()->create([
            'full_name' => 'Nama Penuh Ujian',
            'phone' => '60112233445',
            'avatar_path' => 'avatars/avatar.jpg',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk();
    }
}
