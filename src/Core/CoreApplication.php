<?php

namespace App\Core;

use Dotenv\Dotenv;

abstract class CoreApplication
{
	protected function initialize(): void
	{
		$this->initializeEnvironmentVars();
		$this->initializeConfig();
	}

	private function initializeEnvironmentVars(): void
	{
		if (!env('APP_NAME') && file_exists(ROOT . DS . '.env')) {
			$dotenv = Dotenv::createImmutable(ROOT . DS);
			$dotenv->load();
		}
	}

	abstract public static function startup();

	abstract protected function initializeConfig();

	abstract public function getApp();
}
