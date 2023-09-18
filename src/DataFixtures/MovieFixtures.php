<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $movie = new Movie();
        $movie->setTitle('The dark knight');
        $movie->setSlug('the-dark-knight');
        $movie->setReleaseYear(2008);
        $movie->setImagePath('https://images.bauerhosting.com/legacy/media/5f3d/6597/3759/c06f/98a0/7d81/dark-knight-trilogy-main.jpg');
        $movie->setDescription('Such a good movie');
        $movie->addActor($this->getReference('actor'));
        $manager->persist($movie);
        $manager->flush();
    }
}