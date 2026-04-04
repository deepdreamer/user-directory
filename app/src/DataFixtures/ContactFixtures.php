<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contacts = [
            ['James', 'Anderson', '+1 555 000 001', 'james.anderson@example.com', null],
            ['Mary', 'Thompson', '+1 555 000 002', 'mary.thompson@example.com', 'Prefers email contact'],
            ['Robert', 'Martinez', null, 'robert.martinez@example.com', null],
            ['Patricia', 'Garcia', '+1 555 000 004', 'patricia.garcia@example.com', 'Call after 3pm'],
            ['Michael', 'Wilson', '+1 555 000 005', 'michael.wilson@example.com', null],
            ['Linda', 'Moore', null, 'linda.moore@example.com', 'Do not call on weekends'],
            ['William', 'Taylor', '+1 555 000 007', 'william.taylor@example.com', null],
            ['Barbara', 'Jackson', '+1 555 000 008', 'barbara.jackson@example.com', null],
            ['David', 'White', '+1 555 000 009', 'david.white@example.com', 'Prefers morning calls'],
            ['Susan', 'Harris', null, 'susan.harris@example.com', null],
            ['Richard', 'Clark', '+1 555 000 011', 'richard.clark@example.com', null],
            ['Jessica', 'Lewis', '+1 555 000 012', 'jessica.lewis@example.com', 'VIP client'],
            ['Thomas', 'Robinson', null, 'thomas.robinson@example.com', null],
            ['Sarah', 'Walker', '+1 555 000 014', 'sarah.walker@example.com', null],
            ['Charles', 'Hall', '+1 555 000 015', 'charles.hall@example.com', 'Call before noon'],
            ['Karen', 'Allen', null, 'karen.allen@example.com', null],
            ['Christopher', 'Young', '+1 555 000 017', 'christopher.young@example.com', null],
            ['Nancy', 'Hernandez', '+1 555 000 018', 'nancy.hernandez@example.com', null],
            ['Daniel', 'King', '+1 555 000 019', 'daniel.king@example.com', 'Prefers SMS'],
            ['Lisa', 'Wright', null, 'lisa.wright@example.com', null],
            ['Matthew', 'Lopez', '+1 555 000 021', 'matthew.lopez@example.com', null],
            ['Betty', 'Hill', '+1 555 000 022', 'betty.hill@example.com', null],
            ['Anthony', 'Scott', null, 'anthony.scott@example.com', 'No calls after 6pm'],
            ['Margaret', 'Green', '+1 555 000 024', 'margaret.green@example.com', null],
            ['Mark', 'Adams', '+1 555 000 025', 'mark.adams@example.com', null],
            ['Sandra', 'Baker', null, 'sandra.baker@example.com', null],
            ['Donald', 'Nelson', '+1 555 000 027', 'donald.nelson@example.com', 'Prefers email contact'],
            ['Ashley', 'Carter', '+1 555 000 028', 'ashley.carter@example.com', null],
            ['Steven', 'Mitchell', '+1 555 000 029', 'steven.mitchell@example.com', null],
            ['Dorothy', 'Perez', null, 'dorothy.perez@example.com', null],
            ['Paul', 'Roberts', '+1 555 000 031', 'paul.roberts@example.com', 'VIP client'],
            ['Kimberly', 'Turner', '+1 555 000 032', 'kimberly.turner@example.com', null],
            ['Andrew', 'Phillips', null, 'andrew.phillips@example.com', null],
            ['Emily', 'Campbell', '+1 555 000 034', 'emily.campbell@example.com', 'Call after 3pm'],
            ['Joshua', 'Parker', '+1 555 000 035', 'joshua.parker@example.com', null],
            ['Donna', 'Evans', null, 'donna.evans@example.com', null],
            ['Kenneth', 'Edwards', '+1 555 000 037', 'kenneth.edwards@example.com', null],
            ['Michelle', 'Collins', '+1 555 000 038', 'michelle.collins@example.com', 'Prefers morning calls'],
            ['Kevin', 'Stewart', null, 'kevin.stewart@example.com', null],
            ['Carol', 'Sanchez', '+1 555 000 040', 'carol.sanchez@example.com', null],
            ['Brian', 'Morris', '+1 555 000 041', 'brian.morris@example.com', null],
            ['Amanda', 'Rogers', null, 'amanda.rogers@example.com', 'Do not call on weekends'],
            ['George', 'Reed', '+1 555 000 043', 'george.reed@example.com', null],
            ['Melissa', 'Cook', '+1 555 000 044', 'melissa.cook@example.com', null],
            ['Edward', 'Morgan', '+1 555 000 045', 'edward.morgan@example.com', 'Prefers SMS'],
            ['Deborah', 'Bell', null, 'deborah.bell@example.com', null],
            ['Ronald', 'Murphy', '+1 555 000 047', 'ronald.murphy@example.com', null],
            ['Stephanie', 'Bailey', '+1 555 000 048', 'stephanie.bailey@example.com', null],
            ['Timothy', 'Rivera', null, 'timothy.rivera@example.com', 'VIP client'],
            ['Sharon', 'Cooper', '+1 555 000 050', 'sharon.cooper@example.com', null],
        ];

        foreach ($contacts as [$name, $surname, $phone, $email, $note]) {
            $contact = new Contact();
            $contact->setName($name);
            $contact->setSurname($surname);
            $contact->setPhoneNumber($phone);
            $contact->setEmail($email);
            $contact->setNote($note);

            $manager->persist($contact);
        }

        $manager->flush();
    }
}
