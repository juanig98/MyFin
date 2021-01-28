<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('-1 month', '-1 day'),
            'wallet_id' => $this->faker->numberBetween(1, 3),
            'badge_id' => 1, // Solo PESO ARG
            'account_id' => 2, //$this->faker->numberBetween(1, 3),
            'title' => Arr::random(['Parada 22', 'Parada 22', 'Graciela', 'Agua Perillo', 'El rey de los lacteos', 'Electricista', 'Parada 22', 'Pura Cepa', 'Salida c/Sofi', 'Fequim', 'Chacras del sur', 'Parada 22', 'El rey de los lacteos', 'Axion', 'Cacao y Vainilla', 'Parada 22', 'Parada 22', 'Chacras del sur', 'Agua Perillo', 'Parada 22', 'El rey de los lacteos', 'Parrilla El Gordo', 'Farmacia Velez Sarfield', 'Churros', 'Parada 22', 'Chacras del sur', 'Pancho Gourmet', 'Casa Hugo', 'Mariel', 'Parada 22', 'El reloj', 'Agua Perillo', 'Chacras del sur', 'Parrilla Saavedra', 'Qatar bebidas', 'Supermercado Lisa', 'Humberto Primo (Drugstore)', 'Axion (Servicentro)', 'Vea (Supermercado)', 'Maxi (Carnicería)', 'Futbol 5', 'Choripanes', 'Zoom (Bazar)', 'El rey de (Autoservicio)', 'Tus Compras', 'El reloj (Pizzería)', 'El rey de (Autoservicio)', 'Steam', 'Instalación Aire Acondicionado', 'Juntada en lo de Fede', 'Chacras del Sur (Verdulería)', 'Parada 22 (Drugstore)', 'Pago Nico', 'Barba Negra (Drugstore)', 'Italia (Heladeria)', 'Graciela (Almacén)', 'Fequim (Limpieza)', 'Autoservicio Martin (Autoservicio)', 'Chacras del Sur (Verdulería)', 'Tecnopolis (Hardware)', 'Tecnopolis (Hardware)', 'Lisa Alvear (Supermercado)', 'Tus compras (Supermercado)', 'Autoservicio Martin (Autoservicio)', 'Maxi (Carnicería)', 'Parada 22 (Drugstore)', 'Panadería', 'Maycon (Supermercado)', 'Maycon (Supermercado)', 'Maxi (Pizzería)', 'Parada 22 (Drugstore)', 'Carrefour (Supermercado)', 'Paprica (Almacén)', 'Chacras del Sur (Verdulería)', 'Pollo y punto (Pollería)', 'Chacras del Sur (Verdulería)', 'Parada 22 (Drugstore)', 'Chispitas y cia (Panadería)', 'Parada 22 (Drugstore)', 'Clapton (Pizzería)', 'Victoria (Heladería)', 'Parada 22 (Drugstore)', 'Graciela (Almacén)', 'Autoservicio Martin (Autoservicio)', 'Parada 22 (Drugstore)', 'Sr Pancho (Hamburguesería)', 'Sofi (Desayuno mama)', 'Devolución mamá', 'Steam', 'Gastos merienda (c/Martin)', 'Ferretería', 'Fequim (Limpieza)', 'Combo Fernet', 'Cena (pizza-hielo-gaseosa)', 'Capullo (Blanquería)', 'Guerrero (Electricidad)', 'BuenaLetra (Librería)', 'Brener (Bazar)', 'Pago a Martin', 'Agua y Gas (Plomeria)', 'Perillo (Sodería)', 'Maxi (Carnicería)', 'Axion (Servicentro)', 'Carrefour (Supermercado)', 'Las Heras Norte (Farmacia)', 'Fequim (Limpieza)', 'Zoom (Bazar)', 'Fequim (Limpieza)', 'Chacras del Sur (Verdulería)', 'Juntada', 'Guerrero (Electricidad)', 'Netflix', 'Spotify', 'Parada 22 (Drugstore)', 'Maycon (Supermercado)', 'Fequim (Limpieza)', 'Parada 22 (Drugstore)', 'Autoservicio Martin (Autoservicio)', 'Chacras del Sur (Verdulería)', 'Tuenti', 'Pollería', 'Parada 22 (Drugstore)', 'Miel Maná Sofi', 'Parada 22 (Drugstore)', 'Sr Pancho Gourmet', 'Montecarlo (Panadería)', 'Maxi (Carnicería)', 'Autoservicio Martin (Autoservicio)', 'Perillo (Sodería)', 'Maxipizza', 'Futbol 5', 'Fequim', 'Fequim', 'Carrefour', 'Parada 22', 'Axion', 'Sr. Pancho', 'Pago a Sofi limpieza', 'Polleria', 'Agua Perillo', 'Tortas fritas', 'Monotributo', 'Librería Palleja', 'Tecnopolis', 'Tecnopolis', 'Tus Compras', 'Maxicarnicería', 'Autoservicio Martin', 'Almacen de graciela', 'Debin Monotributo', 'Chacras del sur', 'Fequim', 'Parada 22', 'Maxipizza']),
            'description' => $this->faker->sentence(2),
            'type' => 'Output', //Arr::random(['Input', 'Output']),
            'modality' => Arr::random(['Permanent', 'Extraordinary', 'Common']),
            'amount' => $this->faker->randomFloat(2, 1, 3500),
            'created_at' => $this->faker->dateTimeBetween('-1 month', '-1 day'),
        ];
    }
}
