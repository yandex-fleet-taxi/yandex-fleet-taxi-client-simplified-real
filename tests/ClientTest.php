<?php

namespace Likemusic\YandexFleetTaxiClientSimplified\Tests;

use DateTime;
use Likemusic\YandexFleetTaxiClientSimplified\Contracts\Entities\CarInterface;
use Likemusic\YandexFleetTaxiClientSimplified\Contracts\Entities\DriverInterface;
use Likemusic\YandexFleetTaxiClientSimplified\Entities\Car;
use Likemusic\YandexFleetTaxiClientSimplified\Entities\Driver;
use Likemusic\YandexFleetTaxiClientSimplified\Real\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    const FILENAME_CONFIG = 'tests/ClientTest.json';

    /**
     * @return Client
     * @doesNotPerformAssertions
     */
    public function testInit()
    {
        $testConfig = $this->getTestConfig();
        $login = $testConfig['login'];
        $password = $testConfig['password'];
        $parkId = $testConfig['park_id'];
        $workRuleId = $testConfig['work_rule_id'];

        $client = new Client($login, $password, $parkId, $workRuleId);

        $client->init();

        return $client;
    }

    /**
     * @return array
     */
    private function getTestConfig()
    {
        $configJson = file_get_contents(self::FILENAME_CONFIG);

        return json_decode($configJson, true);
    }

    /**
     * @param Client $client
     * @depends testInit
     * @return string
     */
    public function testCreateDriver(Client $client)
    {
        $driver = $this->getTestDriver();

        $driverId = $client->createDriver($driver);
        $this->assertIsString($driverId);

        return $driverId;
    }

    private function getTestDriver(): DriverInterface
    {
        $driver = new Driver();

        $driver
            ->setFirstName('Валерий')
            ->setLastName('Иващенко')
            ->setMiddleName('Игоревич')
            ->setLicenceCountryCode('rus')
            ->setLicenceNumber($this->generateLicenceNumber())
            ->setLicenceIssueDate(new DateTime('2011-01-13'))
            ->setLicenceExpirationDate(new DateTime('2021-01-13'))
            ->setPhoneNumber($this->generateRandomPhoneNumber());

        return $driver;
    }

    private function generateLicenceNumber()
    {
        $numbersString = $this->generateNumbersString(2);

        return '02147219' . $numbersString;
    }

    private function generateNumbersString(int $lenght): string
    {
        $string = '';

        for ($i = 0; $i < $lenght; $i++) {
            $string .= mt_rand(0, 9);
        }

        return $string;
    }

    private function generateRandomPhoneNumber(): string
    {
        $numbersString = $this->generateNumbersString(2);

        return '+3753330129' . $numbersString;
    }

    /**
     * @param Client $client
     * @depends testInit
     * @return string
     */
    public function testCreateCar(Client $client)
    {
        $car = $this->getTestCar();


        $carId = $client->createCar($car);
        $this->assertIsString($carId);

        return $carId;
    }

    private function getTestCar(): CarInterface
    {
        $car = new Car();

        $car
            ->setBrandName('Alfa Romeo')
            ->setModel('105/115')
            ->setColor('Белый')
            ->setYear(1996)
            ->setNumber('B303MC')
            ->setCallSign('тест')
            ->setVin('1C3EL46U91N594161')
            ->setRegistrationCert('77YT243401');

        return $car;
    }

    /**
     * @param Client $client
     * @param string $driverId
     * @param string $carId
     * @depends testInit
     * @depends testCreateDriver
     * @depends testCreateCar
     * @doesNotPerformAssertions
     */
    public function testBindDriverWithCar(Client $client, string $driverId, string $carId)
    {
        return $client->bindDriverWithCar($driverId, $carId);
    }
}
