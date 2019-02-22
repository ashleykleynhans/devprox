<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:generate {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a CSV File for Test 2';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private $names = [
        'Andrew',
        'Andre',
        'Colleen',
        'Dawn',
        'Duncan',
        'Emily',
        'Eva Maria',
        'Freddie',
        'Hylton',
        'Isabella',
        'James',
        'John',
        'Mark',
        'Nancy',
        'Nicole',
        'Oscar',
        'Paul',
        'Stuart',
        'Tyrone',
        'Vicky',
    ];

    private $surnames = [
        'Cameron',
        'Kleynhans',
        'Dinwoodie',
        'Mercury',
        'Smith',
        'Simpson',
        'van Zuydam',
        'James',
        'Taylor',
        'Johnson',
        'Williams',
        'Brown',
        'Jones',
        'Miller',
        'Davis',
        'Wilson',
        'Van der Merwe',
        'Van Zyl',
        'Appleton',
        'Rohner',
    ];

    private function generateRandomUser()
    {
        $name = $this->names[array_rand($this->names)];
        $surname = $this->surnames[array_rand($this->surnames)];

        $day = rand(1, 31);
        $month = rand(1, 12);
        $year = rand (1940, 1990);

        if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
            $day = 30;
        } elseif ($month == 2) {
            // Assuming no leap years for simplicity sakes
            $day = 28;
        }

        $day = sprintf('%02d', $day);
        $month = sprintf('%02d', $month);

        $dob = "$day/$month/$year";

        return $name .'_'. $surname .'_'. $dob;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        try {
            $number = $this->argument('number');

            $headers = ['Id', 'Name', 'Surname', 'Initials', 'Age', 'DateOfBirth'];
            $generated = [];

            $path = storage_path();
            $output = "$path/output.csv";
            $fp = fopen($output, 'w');
            fputcsv($fp, $headers);

            for ($i=1; $i<=100; $i++) {

                $key = $this->generateRandomUser();

                // Keep generating new users until we get a unique one, if the one we generated is not unique
                while (in_array($key, $generated)) {
                    $key = $this->generateRandomUser();
                }

                $generated[] = $key;

                $data = explode('_', $key);

                $name = $data[0];
                $surname = $data[1];
                $dob = $data[2];

                $birthDate = explode('/', $dob);

                // Stolen from https://stackoverflow.com/questions/3776682/php-calculate-age
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                    ? ((date("Y") - $birthDate[2]) - 1)
                    : (date("Y") - $birthDate[2]));

                $firstNames = explode(' ', $name);
                $initials = '';

                foreach ($firstNames as $firstName) {
                    $initials .= strtoupper(substr($firstName, 0, 1));
                }

                $data = [$i, $name, $surname, $initials, $age, $dob];

                fputcsv($fp, $data);
            }

            fclose($fp);

            echo "Successfully generated $output containing $number records\n";
        } catch (\Exception $e) {
            echo "There was an error creating the CSV file: " . $e->getMessage();
        }

    }
}
