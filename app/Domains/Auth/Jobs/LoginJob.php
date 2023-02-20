<?php

namespace App\Domains\Auth\Jobs;

use App\Exceptions\UnauthorizedException;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Lucid\Units\Job;

class LoginJob extends Job
{
    private array $payload;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     *
     * @return array
     *
     * @throws UnauthorizedException
     */
    public function handle()
    {
        try {
            $user = User::where('email', $this->payload['email'])->firstOrFail();
        } catch (ModelNotFoundException $_) {
            throw new UnauthorizedException('Wrong Credentials');
        }

        if (\Hash::check($this->payload['password'], $user->password)) {
            return [
                'access_token' => $user->createToken('Authentication Token')->accessToken,
                'user' => $user->makeHidden(['permissions', 'roles'])->append(['allowed_permissions']),
            ];
        }
        throw new UnauthorizedException('Wrong Credentials');
    }
}
