<?php
/*
Plugin Name: Frases Aleatorias
Plugin URI: [URL del plugin (si la va a tener, si no puedes poner la tuya)]
Description: Una frase célebre cuando cambias de página
Version:0.1
Author: Miguel Pascual Caballero
Author URI:[URL del autor del plugin]
License:MIT
*/

function frases_aleatorias()
{
    // Fuente de las frases , prodia ser un JSON
    // ejemplo llamandolo
        //require_once plugin_dir_path(__FILE__).'data.php';
    // A traves de un JSON
        $data = file_get_contents(plugin_dir_path(__FILE__).'frases.json');
        $objeto = json_decode($data);//objeto
        $frases = json_decode($data,true);//array asociativo
    //array aqui
    /*$frases = array(
        'Cada día sabemos más y entendemos menos "Albert Einstein"',
        'No hay nada que un hombre no sea capaz de hacer cuando una mujer le mira "Casanova"',
        'Ningún hombre es lo bastante bueno para gobernar a otros sin su consentimiento "Abraham Lincoln"',
        'Vivir sola es como estar en una fiesta donde nadie te hace caso "Marilyn Monroe"',
        'El mundo es bello, pero tiene un defecto llamado hombre "Friedrich Nietzsche"',
        'Pienso, luego existo "René Descartes"',
        'Sólo puede ser feliz siempre el que sepa ser feliz con todo "Confucio"',
        'Ser o no ser, ésa es la cuestión "Shakespeare"',
        'No pain no gain "Benjamín Franklin"',
        'Solo sé que no sé nada "Sócrates"',
        'La mejor manera de librarse de la tentación es caer en ella "Oscar Wilde"',
        'Uno es dueño de lo que calla y esclavo de lo que habla "Sigmund Freud"',
        'El que va demasiado aprisa llega tan tarde como el que va muy despacio "Shakespeare"',
        'La vida es maravillosa si no se le tiene miedo "Charles Chaplin"',
        'Sé tú, e intenta ser feliz, pero sobre todo, sé tú "Charles Chaplin"',
        'A la muerte se le toma de frente con valor y después se le invita a una copa "Edgar Allan Poe"',
        'Más cuerdo es, el que acepta su propia locura "Edgar Allan Poe"',
        'Dos cosas son infinitas: el Universo y la estupidez humana; y yo no estoy seguro sobre el Universo "Albert Einsten"',
        'Si lo puedes soñar, lo puedes hacer "Walt Disney"',
        'La vida es lo que te pasa mientras estás ocupado haciendo otros planes "John Lennon"',
        'El mejor momento para plantar un árbol fue hace 20 años. El segundo mejor momento es ahora "Proverbio Chino"'
        );
        */
    // saber el número de elementos que tiene
    $num_Items = count($frases) - 1;
    // generar un número aleatorio entre el 0 y el numero total del array -1
    $aleatorio = rand(0, $num_Items);
    //imprimir el array por pantalla
    
    return "<blockquote class=\"blockquote pb-3\">\"".$frases[$aleatorio]."\"</blockquote>";
}

add_shortcode('ramdfrase', 'frases_aleatorias');

//agregamos una pagina de administración
add_action('admin_menu','agregar_admin');
function agregar_admin(){
    add_menu_page('frases_aleatorias', 'Frases', 'manage_options', plugin_dir_path(__FILE__)."'admin.php';");
}

