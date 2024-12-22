<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $elektronik= array('hp', 'laptop', 'speaker', 'lampu');
        $hp = array('nokia', 'samsung', 'iphone', 'vivo', 'oppo', 'xiaomi');
        $laptop = array('asus', 'samsung', 'macbook', 'acer', 'lenovo');
        $speaker = ['advance', 'jbl', 'simbada'];
        $lampu = ['philips', 'advance', 'panasonic'];
        $fin_bio = array('uang', 'dompet', 'ktp', 'atm');
        $mainan = array('mobil mobilan', 'truk oleng', 'kereta', 'bis tayo');
        $kunci = array('kunci motor', 'kunci mobil', 'kunci rumah', 'kunci lainya');
        $kendaraan = array('motor', 'mobil', 'sepeda ontel');
        $other = array('payung', 'tupperware', 'sepatu', 'sandal', 'helm');
        $category = fake()->numberBetween(0,5);
        $merek_elektronik = null;

        function name($category) {
            if ($category == 0){
                $merek_elektronik = fake()->numberBetween(0,3);
                return fake()->randomElement(['hp', 'laptop', 'speaker', 'lampu']);
            } else if ($category == 1){
                return fake()->randomElement(['uang', 'dompet', 'ktp', 'atm']);
            } else if ($category == 2){
                return fake()->randomElement(['mobil mobilan', 'truk oleng', 'kereta', 'bis tayo']);
            } else if ($category == 3){
                return fake()->randomElement(['kunci motor', 'kunci mobil', 'kunci rumah', 'kunci lainya']);
            } else if ($category == 4){
                return fake()->randomElement(['motor', 'mobil', 'sepeda ontel']);
            } else if ($category == 5){
                return fake()->randomElement(['payung', 'tupperware', 'sepatu', 'sandal', 'helm']);
            }
        }; 
        function merek($merek){
            if ($category == 0){
                if($merek_elektronik == 0) {
                    return fake()->randomElement($hp);
                } else if ($merek_elektronik == 1){
                    return fake()->randomElement($laptop);
                } else if ($merek_elektronik == 2){
                    return fake()->randomElement($speaker);
                } else if ($merek_elektronik == 3){
                    return fake()->randomElement($lampu);
                }
            } else{
                return 'tidak ada';
            }
        };

        return [
            'user_id' => fake()->numberBetween(0,9),
            'category_id' => $category,
            'name' => name($category),
            'merek' => merek($merek_elektronik),
            'description' => fake()->sentence(fake()->numberBetween(20,30)),
            'bukti' => fake()->name(),
            'date' => fake()->dateTimeBetween('-1 week', '-2 day'),
            'status' => fake()->randomElement(['belum diambil', 'sudah diambil']),
            'take_date' => fake()->dateTimeBetween('-2 day', 'now'),
        ];
    }
}
