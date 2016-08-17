<?php

interface Provider {
	public function authenticate($data);
	public function logout();
}

abstract class AbstractProvider {
	public $id;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}
}

class FacebookProvider extends AbstractProvider implements Provider {
	public function authenticate($data)
	{
		return "user " . $data['first_name'] . " authenticated via Facebook Auth";
	}

	public function logout()
	{

	}
}

class GithubProvider extends AbstractProvider implements Provider {
	public function authenticate($data)
	{
		return "user " . $data['first_name'] . " authenticated via Github Auth";
	}

	public function logout()
	{

	}
}

class Twitter extends AbstractProvider implements Provider {
	public function authenticate($data)
	{
		return "user " . $data['first_name'] . " authenticated via Twitter Auth";
	}

	public function logout()
	{

	}
}

class UsersController {
	protected $provider;

	public function __construct(Provider $provider)
	{
		$this->provider = $provider;
	}
	public function login($post)
	{
		return $this->provider->authenticate($post);
	}

	public function setId($id)
	{
		return $this->provider->setId($id);
	}

	public function id()
	{
		return $this->provider->getId();
	}
}

$usersController = new UsersController(new FacebookProvider);
echo $usersController->login(['first_name' => "Oliver"]);
$usersController->setId(1);
echo $usersController->id();
