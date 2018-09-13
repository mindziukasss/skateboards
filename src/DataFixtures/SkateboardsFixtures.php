<?php

namespace App\DataFixtures;

use App\DataFixtures\Traits\WithFileManagementTrait;
use App\DataFixtures\Traits\WithRandomsTrait;
use App\Entity\Media\Media;
use App\Entity\Skateboard\Skateboard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class SkateboardsFixtures
 */
class SkateboardsFixtures extends Fixture
{
    use WithFileManagementTrait,
        WithRandomsTrait;

    const COUNT_SKATEBOARDS = 100;

    /**
     * @var array
     */
    public static $titles = [
        'Area Timber Cruiser',
        'Ram Blacker Sunny',
        'Meteor Cruiser',
        'Curb Dude',
        'Ram Viesez',
        'Curb Core',
        'Havana Stogie',
        'Curb Jam',
        'Nijdam Jungle Fever',
        'Ram Lokz Blue',
        'Ram Lokz Chesnut',
        'Curb Nuts',
        'Ram Lokz Mini',
        'Area Sea Flavor',
        'Havana Gemini Flag',
        'Ram Lokz Micro',
        'Ram Ciemah Micro',
        'Havana Gemini Flag',
        'Ram Ciemah Mini',
        'Mindless Wreather II',
        'Surf Logic Ride',
        'Hammond Free Ride',
        'Cat Pattern',
        'Flying Wheels Haleiwa',
        'Miller Roadtrip',
        'Flying Wheels Palm',
        'Gravity Stingray',
        'AOB AsymFlower',
        'Madrid Squirt',
        'Madrid Squirt Flutter',
    ];

    /**
     * @var array
     */
    public static $descriptions = [
        'The new Replica 70 Cruiser is a real journey into the past. Cult, stylish and honest like an old sound. Due to the Wheel Wells you’re agile and can generously cruising. The boards consist of 7 Sheets fine Canadian maple with Kicktail, so you can skate through the streets also sporty.',
        'Small fish shaped panels, bright colors, full of vitality
Using high elastic damping PU pad and anti slip nut, not loose, very safe to use
When the wheel is rolling, the color of the light, which makes your skateboard more cool in the evening can also help people see you easily',
        'Light, small size, appearance, such as the flying fish, loved by young people, is preferred to learn skateboard self-important.Exquisite fashion pattern, individuality.Cellular slip design, anti-wear flowers.',
        'Only the strongest survive in the Celebrity Deathwish ring. The Neen Celebrity 8.25" skateboard deck from Deathwish features Neen Williams fighting for bragging rights in Claymation form on the bottom.',
        'Bring pop back to your skate game with Blinds signature Car Crash 8.25" Skateboard Deck. A durable 7-ply single pressed constructed board that features the brands classic cartoon grim reaper image as well as a deadly car crash scene upon the underside.',
        'Keep things classic with Shorty\'s Skate Block 8.0" Grey and Blue Skateboard Deck. Designed with the brand\'s signature logo script across the underside in bold print.',
        'Experience the skating magic on a Toy Machine Skateboards Squared Complete Skateboard. This professional quality Squared Complete measures 7.75" wide x 31.25" long and is ideal for every skill level. Skate street, pool, park or vert with this awesome Toy Machine Skateboards complete skateboard.',

    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < self::COUNT_SKATEBOARDS; $i++) {
            $media = (new Media())
                ->setFile($this->randomImage('skateboard', '.jpg'));
            $title = self::$titles[(rand(0, sizeof(self::$titles) - 1))];
            $description = self::$descriptions[(rand(0, sizeof(self::$descriptions) - 1))];

            $skateboard = (new Skateboard())
                ->setTitle($title)
                ->setDescription($description)
                ->setPrice(mt_rand(10, 99))
                ->setLength(mt_rand(35, 125))
                ->setWidth(mt_rand(10, 49))
                ->setWeight(mt_rand(2, 10))
                ->setMaxUserWeight(mt_rand(10, 110))
                ->setLikeCount(rand(1, 5))
                ->setMedia($media);

            $manager->persist($skateboard);
            $manager->persist($media);
        }

        $manager->flush();
    }
}