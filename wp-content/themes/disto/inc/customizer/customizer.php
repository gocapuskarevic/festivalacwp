<?php
if ( ! class_exists( 'disto_customizer_default' ) ) {
	final class disto_customizer_default {
		private static $instance = null;
		private $wp_customize;
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		private function __construct() {
			add_action( 'customize_controls_print_scripts', array( $this, 'disto_customize_controls_print_scripts' ) );
			add_action( 'wp_ajax_customizer_reset', array( $this, 'disto_ajax_customizer_reset' ) );
			add_action( 'customize_register', array( $this, 'disto_customize_register' ) );
		}
		public function disto_customize_controls_print_scripts() {
			wp_enqueue_style( 'css-for-customize', get_template_directory_uri() . '/inc/customizer/css/customizer-control.css' );
			wp_enqueue_script( 'js-for-customize', get_template_directory_uri() . '/inc/customizer/js/customizer-control.js', array( 'jquery', 'customize-controls' ) );
			wp_localize_script( 'js-for-customize', 'disto_customizer_reset', array(
				'reset'   => esc_html__( 'Reset', 'disto' ),
				'confirm' => esc_html__( "Clicking the Reset button will revert all settings in the customizer except for menus, widgets and site identity.", 'disto' ),
				'nonce'   => array(
					'reset' => wp_create_nonce( 'customizer-reset' ),
				)
			) );
		}
		public function disto_customize_register( $wp_customize ) {
			$this->wp_customize = $wp_customize;
		}

		public function disto_ajax_customizer_reset() {
			if ( ! $this->wp_customize->is_preview() ) {
				wp_send_json_error( 'not_preview' );
			}
			if ( ! check_ajax_referer( 'customizer-reset', 'nonce', false ) ) {
				wp_send_json_error( 'invalid_nonce' );
			}
			$this->disto_reset_customizer();
			wp_send_json_success();
		}
		public function disto_reset_customizer() {
			$settings = $this->wp_customize->settings();
			foreach ( $settings as $setting ) {
				if ( 'theme_mod' == $setting->type ) {
					remove_theme_mod( $setting->id );
				}
			}
		}
	}
}
disto_customizer_default::get_instance();

function disto_register_theme_customizer( $wp_customize ) {
	class disto_control_image_select extends WP_Customize_Control {
	    public function render_content(){
	        if ( empty( $this->choices ) ){ return; }
	        if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html($this->description) ; ?></span>
			<?php endif;
	        $html = array();
			$tpl  = '<label class="jlc-image-select"><img src="%s"><input type="%s" class="hidden" name="%s" value="%s" %s%s></label>';
			$field = $this->input_attrs;
			foreach ( $this->choices as $value => $image )
			{
				$html[] = sprintf(
					$tpl,
					$image,
					$field['multiple'] ? 'checkbox' : 'radio',
					$this->id,
					esc_attr( $value ),
					$this->get_link(),
					checked( $this->value(), $value, false )
				);
			}
			echo implode(' ', $html); 
	    }
	}
	// Header text
	class Disto_Customize_Control_Title extends WP_Customize_Control {
	    public function render_content(){
	        if ( empty( $this->label ) ){ return; }
	        if ( ! empty( $this->label ) ) : ?>
					<h2 class="jlc_headding"><?php echo esc_html( $this->label ); ?>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html($this->description) ; ?></span>
			</h2><?php endif; 
	    }
	}
	// Sidebar
	$option_sidebar = array();
	$sidebars = get_option('sbg_sidebars');
	$option_sidebar['']='';
	if(isset($sidebars)) {
		if(is_array($sidebars)) {
			foreach($sidebars as $sidebar) {
				$option_sidebar[$sidebar] = $sidebar;
			}			
		}
	}
	
	// Font and Google Font
	$faces = array(
	'none' => 'None',
	'arial'     => 'Arial',
	'verdana'   => 'Verdana',
	'trebuchet' => 'Trebuchet',
	'georgia'   => 'Georgia',
	'times'     => 'Times New Roman',
	'tahoma'    => 'Tahoma',
	'serif'    => 'Serif',
	'helvetica' => 'Helvetica',
	"Abel" => "Abel",
	"Abril Fatface" => "Abril Fatface",
	"Aclonica" => "Aclonica",
	"Acme" => "Acme",
	"Actor" => "Actor",
	"Adamina" => "Adamina",
	"Advent Pro" => "Advent Pro",
	"Aguafina Script" => "Aguafina Script",
	"Aladin" => "Aladin",
	"Aldrich" => "Aldrich",
	"Alegreya" => "Alegreya",
	"Alegreya SC" => "Alegreya SC",
	"Alex Brush" => "Alex Brush",
	"Alfa Slab One" => "Alfa Slab One",
	"Alice" => "Alice",
	"Alike" => "Alike",
	"Alike Angular" => "Alike Angular",
	"Allan" => "Allan",
	"Allerta" => "Allerta",
	"Allerta Stencil" => "Allerta Stencil",
	"Allura" => "Allura",
	"Almendra" => "Almendra",
	"Almendra SC" => "Almendra SC",
	"Amarante" => "Amarante",
	"Amaranth" => "Amaranth",
	"Amatic SC" => "Amatic SC",
	"Amethysta" => "Amethysta",
	"Andada" => "Andada",
	"Andika" => "Andika",
	"Angkor" => "Angkor",
	"Annie Use Your Telescope" => "Annie Use Your Telescope",
	"Anonymous Pro" => "Anonymous Pro",
	"Antic" => "Antic",
	"Antic Didone" => "Antic Didone",
	"Antic Slab" => "Antic Slab",
	"Anton" => "Anton",
	"Arapey" => "Arapey",
	"Arbutus" => "Arbutus",
	"Architects Daughter" => "Architects Daughter",
	"Arimo" => "Arimo",
	"Arizonia" => "Arizonia",
	"Armata" => "Armata",
	"Artifika" => "Artifika",
	"Arvo" => "Arvo",
	"Asap" => "Asap",
	"Asset" => "Asset",
	"Astloch" => "Astloch",
	"Asul" => "Asul",
	"Atomic Age" => "Atomic Age",
	"Aubrey" => "Aubrey",
	"Audiowide" => "Audiowide",
	"Average" => "Average",
	"Averia Gruesa Libre" => "Averia Gruesa Libre",
	"Averia Libre" => "Averia Libre",
	"Averia Sans Libre" => "Averia Sans Libre",
	"Averia Serif Libre" => "Averia Serif Libre",
	"Bad Script" => "Bad Script",
	"Balthazar" => "Balthazar",
	"Bangers" => "Bangers",
	"Basic" => "Basic",
	"Barlow" => "Barlow",
	"Barlow Semi Condensed" => "Barlow Semi Condensed",	
	"Baumans" => "Baumans",
	"Bayon" => "Bayon",
	"Belgrano" => "Belgrano",
	"Belleza" => "Belleza",
	"Bentham" => "Bentham",
	"Berkshire Swash" => "Berkshire Swash",
	"Bevan" => "Bevan",
	"Bigshot One" => "Bigshot One",
	"Bilbo" => "Bilbo",
	"Bilbo Swash Caps" => "Bilbo Swash Caps",
	"Bitter" => "Bitter",
	"Black Ops One" => "Black Ops One",
	"Bokor" => "Bokor",
	"Bonbon" => "Bonbon",
	"Boogaloo" => "Boogaloo",
	"Bowlby One" => "Bowlby One",
	"Bowlby One SC" => "Bowlby One SC",
	"Brawler" => "Brawler",
	"Bree Serif" => "Bree Serif",
	"Bubblegum Sans" => "Bubblegum Sans",
	"Bubbler One" => "Bubbler One",
	"Buda" => "Buda",
	"Buenard" => "Buenard",
	"Butcherman" => "Butcherman",
	"Butterfly Kids" => "Butterfly Kids",
	"Cabin" => "Cabin",
	"Cabin Condensed" => "Cabin Condensed",
	"Cabin Sketch" => "Cabin Sketch",
	"Caesar Dressing" => "Caesar Dressing",
	"Cagliostro" => "Cagliostro",
	"Calligraffitti" => "Calligraffitti",
	"Cambo" => "Cambo",
	"Candal" => "Candal",
	"Cantarell" => "Cantarell",
	"Cantata One" => "Cantata One",
	"Cantora One" => "Cantora One",
	"Capriola" => "Capriola",
	"Cardo" => "Cardo",
	"Carme" => "Carme",
	"Cairo" => "Cairo",
	"Carter One" => "Carter One",
	"Caudex" => "Caudex",
	"Cedarville Cursive" => "Cedarville Cursive",
	"Ceviche One" => "Ceviche One",
	"Changa One" => "Changa One",
	"Chango" => "Chango",
	"Chau Philomene One" => "Chau Philomene One",
	"Chelsea Market" => "Chelsea Market",
	"Chenla" => "Chenla",
	"Cherry Cream Soda" => "Cherry Cream Soda",
	"Chewy" => "Chewy",
	"Chicle" => "Chicle",
	"Chivo" => "Chivo",
	"Coda" => "Coda",
	"Coda Caption" => "Coda Caption",
	"Codystar" => "Codystar",
	"Comfortaa" => "Comfortaa",
	"Coming Soon" => "Coming Soon",
	"Concert One" => "Concert One",
	"Condiment" => "Condiment",
	"Content" => "Content",
	"Contrail One" => "Contrail One",
	"Convergence" => "Convergence",
	"Cookie" => "Cookie",
	"Copse" => "Copse",
	"Corben" => "Corben",
	"Courgette" => "Courgette",
	"Cousine" => "Cousine",
	"Coustard" => "Coustard",
	"Covered By Your Grace" => "Covered By Your Grace",
	"Crafty Girls" => "Crafty Girls",
	"Creepster" => "Creepster",
	"Crete Round" => "Crete Round",
	"Crimson Text" => "Crimson Text",
	"Crushed" => "Crushed",
	"Cuprum" => "Cuprum",
	"Cutive" => "Cutive",
	"Damion" => "Damion",
	"Dancing Script" => "Dancing Script",
	"Dangrek" => "Dangrek",
	"Dawning of a New Day" => "Dawning of a New Day",
	"Days One" => "Days One",
	"Delius" => "Delius",
	"Delius Swash Caps" => "Delius Swash Caps",
	"Delius Unicase" => "Delius Unicase",
	"Della Respira" => "Della Respira",
	"Devonshire" => "Devonshire",
	"Didact Gothic" => "Didact Gothic",
	"Diplomata" => "Diplomata",
	"Diplomata SC" => "Diplomata SC",
	"Doppio One" => "Doppio One",
	"Dorsa" => "Dorsa",
	"Dosis" => "Dosis",
	"Dr Sugiyama" => "Dr Sugiyama",
	"Droid Sans" => "Droid Sans",
	"Droid Sans Mono" => "Droid Sans Mono",
	"Droid Serif" => "Droid Serif",
	"Duru Sans" => "Duru Sans",
	"Dynalight" => "Dynalight",
	"EB Garamond" => "EB Garamond",
	"Eagle Lake" => "Eagle Lake",
	"Eater" => "Eater",
	"Economica" => "Economica",
	"Electrolize" => "Electrolize",
	"Emblema One" => "Emblema One",
	"Emilys Candy" => "Emilys Candy",
	"Engagement" => "Engagement",
	"Enriqueta" => "Enriqueta",
	"Erica One" => "Erica One",
	"Esteban" => "Esteban",
	"Euphoria Script" => "Euphoria Script",
	"Ewert" => "Ewert",
	"Exo" => "Exo",
	"Expletus Sans" => "Expletus Sans",
	"Fjalla One" => "Fjalla One",
	"Fanwood Text" => "Fanwood Text",
	"Fascinate" => "Fascinate",
	"Fascinate Inline" => "Fascinate Inline",
	"Fasthand" => "Fasthand",
	"Federant" => "Federant",
	"Federo" => "Federo",
	"Felipa" => "Felipa",
	"Fjord One" => "Fjord One",
	"Flamenco" => "Flamenco",
	"Flavors" => "Flavors",
	"Fondamento" => "Fondamento",
	"Fontdiner Swanky" => "Fontdiner Swanky",
	"Forum" => "Forum",
	"Francois One" => "Francois One",
	"Fredericka the Great" => "Fredericka the Great",
	"Fredoka One" => "Fredoka One",
	"Freehand" => "Freehand",
	"Fresca" => "Fresca",
	"Frijole" => "Frijole",
	"Fugaz One" => "Fugaz One",
	"GFS Didot" => "GFS Didot",
	"GFS Neohellenic" => "GFS Neohellenic",
	"Galdeano" => "Galdeano",
	"Galindo" => "Galindo",
	"Gentium Basic" => "Gentium Basic",
	"Gentium Book Basic" => "Gentium Book Basic",
	"Geo" => "Geo",
	"Geostar" => "Geostar",
	"Geostar Fill" => "Geostar Fill",
	"Germania One" => "Germania One",
	"Give You Glory" => "Give You Glory",
	"Glass Antiqua" => "Glass Antiqua",
	"Glegoo" => "Glegoo",
	"Gloria Hallelujah" => "Gloria Hallelujah",
	"Goblin One" => "Goblin One",
	"Gochi Hand" => "Gochi Hand",
	"Gorditas" => "Gorditas",
	"Goudy Bookletter 1911" => "Goudy Bookletter 1911",
	"Graduate" => "Graduate",
	"Gravitas One" => "Gravitas One",
	"Great Vibes" => "Great Vibes",
	"Griffy" => "Griffy",
	"Gruppo" => "Gruppo",
	"Gudea" => "Gudea",
	"Habibi" => "Habibi",
	"Hammersmith One" => "Hammersmith One",
	"Handlee" => "Handlee",
	"Hanuman" => "Hanuman",
	"Happy Monkey" => "Happy Monkey",
	"Headland One" => "Headland One",
	"Henny Penny" => "Henny Penny",
	"Herr Von Muellerhoff" => "Herr Von Muellerhoff",
	"Hind" => "Hind",
	"Hind Siliguri" => "Hind Siliguri",
	"Hind Vadodara" => "Hind Vadodara",
	"Holtwood One SC" => "Holtwood One SC",
	"Homemade Apple" => "Homemade Apple",
	"Homenaje" => "Homenaje",
	"IM Fell DW Pica" => "IM Fell DW Pica",
	"IM Fell DW Pica SC" => "IM Fell DW Pica SC",
	"IM Fell Double Pica" => "IM Fell Double Pica",
	"IM Fell Double Pica SC" => "IM Fell Double Pica SC",
	"IM Fell English" => "IM Fell English",
	"IM Fell English SC" => "IM Fell English SC",
	"IM Fell French Canon" => "IM Fell French Canon",
	"IM Fell French Canon SC" => "IM Fell French Canon SC",
	"IM Fell Great Primer" => "IM Fell Great Primer",
	"IM Fell Great Primer SC" => "IM Fell Great Primer SC",
	"Iceberg" => "Iceberg",
	"Iceland" => "Iceland",
	"Imprima" => "Imprima",
	"Inconsolata" => "Inconsolata",
	"Inder" => "Inder",
	"Indie Flower" => "Indie Flower",
	"Inika" => "Inika",
	"Irish Grover" => "Irish Grover",
	"Istok Web" => "Istok Web",
	"Italiana" => "Italiana",
	"Italianno" => "Italianno",
	"Jacques Francois" => "Jacques Francois",
	"Jacques Francois Shadow" => "Jacques Francois Shadow",
	"Jim Nightshade" => "Jim Nightshade",
	"Jockey One" => "Jockey One",
	"Jolly Lodger" => "Jolly Lodger",
	"Josefin Sans" => "Josefin Sans",
	"Josefin Slab" => "Josefin Slab",
	"Judson" => "Judson",
	"Julee" => "Julee",
	"Junge" => "Junge",
	"Jura" => "Jura",
	"Just Another Hand" => "Just Another Hand",
	"Just Me Again Down Here" => "Just Me Again Down Here",
	"Kameron" => "Kameron",
	"Karla" => "Karla",
	"Kaushan Script" => "Kaushan Script",
	"Kelly Slab" => "Kelly Slab",
	"Kenia" => "Kenia",
	"Khmer" => "Khmer",
	"Knewave" => "Knewave",
	"Kotta One" => "Kotta One",
	"Koulen" => "Koulen",
	"Kranky" => "Kranky",
	"Kreon" => "Kreon",
	"Kristi" => "Kristi",
	"Krona One" => "Krona One",
	"La Belle Aurore" => "La Belle Aurore",
	"Lancelot" => "Lancelot",
	"Lato" => "Lato",
	"League Script" => "League Script",
	"Leckerli One" => "Leckerli One",
	"Ledger" => "Ledger",
	"Lekton" => "Lekton",
	"Lemon" => "Lemon",
	"Life Savers" => "Life Savers",
	"Lilita One" => "Lilita One",
	"Limelight" => "Limelight",
	"Linden Hill" => "Linden Hill",
	"Lobster" => "Lobster",
	"Lobster Two" => "Lobster Two",
	"Londrina Outline" => "Londrina Outline",
	"Londrina Shadow" => "Londrina Shadow",
	"Londrina Sketch" => "Londrina Sketch",
	"Londrina Solid" => "Londrina Solid",
	"Lora" => "Lora",
	"Love Ya Like A Sister" => "Love Ya Like A Sister",
	"Loved by the King" => "Loved by the King",
	"Lovers Quarrel" => "Lovers Quarrel",
	"Luckiest Guy" => "Luckiest Guy",
	"Lusitana" => "Lusitana",
	"Lustria" => "Lustria",
	"Monda" => "Monda",
	"Macondo" => "Macondo",
	"Macondo Swash Caps" => "Macondo Swash Caps",
	"Magra" => "Magra",
	"Maiden Orange" => "Maiden Orange",
	"Mako" => "Mako",
	"Marck Script" => "Marck Script",
	"Marko One" => "Marko One",
	"Marmelad" => "Marmelad",
	"Marvel" => "Marvel",
	"Mate" => "Mate",
	"Mate SC" => "Mate SC",
	"Maven Pro" => "Maven Pro",
	"McLaren" => "McLaren",
	"Meddon" => "Meddon",
	"MedievalSharp" => "MedievalSharp",
	"Medula One" => "Medula One",
	"Megrim" => "Megrim",
	"Meie Script" => "Meie Script",
	"Merienda One" => "Merienda One",
	"Merriweather" => "Merriweather",
	"Metal" => "Metal",
	"Metal Mania" => "Metal Mania",
	"Metamorphous" => "Metamorphous",
	"Metrophobic" => "Metrophobic",
	"Michroma" => "Michroma",
	"Miltonian" => "Miltonian",
	"Miltonian Tattoo" => "Miltonian Tattoo",
	"Miniver" => "Miniver",
	"Miss Fajardose" => "Miss Fajardose",
	"Modern Antiqua" => "Modern Antiqua",
	"Molengo" => "Molengo",
	"Monofett" => "Monofett",
	"Monoton" => "Monoton",
	"Monsieur La Doulaise" => "Monsieur La Doulaise",
	"Montaga" => "Montaga",
	"Montez" => "Montez",
	"Montserrat" => "Montserrat",
	"Moul" => "Moul",
	"Moulpali" => "Moulpali",
	"Mountains of Christmas" => "Mountains of Christmas",
	"Mr Bedfort" => "Mr Bedfort",
	"Mr Dafoe" => "Mr Dafoe",
	"Mr De Haviland" => "Mr De Haviland",
	"Mrs Saint Delafield" => "Mrs Saint Delafield",
	"Mrs Sheppards" => "Mrs Sheppards",
	"Muli" => "Muli",
	"Mystery Quest" => "Mystery Quest",
	"Noto Sans" => "Noto Sans",
	"Neucha" => "Neucha",
	"Neuton" => "Neuton",
	"News Cycle" => "News Cycle",
	"Niconne" => "Niconne",
	"Nixie One" => "Nixie One",
	"Nobile" => "Nobile",
	"Nokora" => "Nokora",
	"Norican" => "Norican",
	"Nosifer" => "Nosifer",
	"Nothing You Could Do" => "Nothing You Could Do",
	"Noticia Text" => "Noticia Text",
	"Nova Cut" => "Nova Cut",
	"Nova Flat" => "Nova Flat",
	"Nova Mono" => "Nova Mono",
	"Nova Oval" => "Nova Oval",
	"Nova Round" => "Nova Round",
	"Nova Script" => "Nova Script",
	"Nova Slim" => "Nova Slim",
	"Nova Square" => "Nova Square",
	"Numans" => "Numans",
	"Nunito" => "Nunito",
	"Odor Mean Chey" => "Odor Mean Chey",
	"Old Standard TT" => "Old Standard TT",
	"Oldenburg" => "Oldenburg",
	"Oleo Script" => "Oleo Script",
	"Open Sans" => "Open Sans",
	"Open Sans Condensed" => "Open Sans Condensed",
	"Oranienbaum" => "Oranienbaum",
	"Orbitron" => "Orbitron",
	"Oregano" => "Oregano",
	"Orienta" => "Orienta",
	"Original Surfer" => "Original Surfer",
	"Oswald" => "Oswald",
	"Over the Rainbow" => "Over the Rainbow",
	"Overlock" => "Overlock",
	"Overlock SC" => "Overlock SC",
	"Ovo" => "Ovo",
	"Oxygen" => "Oxygen",
	"Oxygen Mono" => "Oxygen Mono",
	"PT Mono" => "PT Mono",
	"PT Sans" => "PT Sans",
	"PT Sans Caption" => "PT Sans Caption",
	"PT Sans Narrow" => "PT Sans Narrow",
	"PT Serif" => "PT Serif",
	"PT Serif Caption" => "PT Serif Caption",
	"Pacifico" => "Pacifico",
	"Pathway Gothic One" => "Pathway Gothic One",
	"Parisienne" => "Parisienne",
	"Passero One" => "Passero One",
	"Passion One" => "Passion One",
	"Patrick Hand" => "Patrick Hand",
	"Patua One" => "Patua One",
	"Paytone One" => "Paytone One",
	"Peralta" => "Peralta",
	"Permanent Marker" => "Permanent Marker",
	"Petit Formal Script" => "Petit Formal Script",
	"Petrona" => "Petrona",
	"Philosopher" => "Philosopher",
	"Piedra" => "Piedra",
	"Pinyon Script" => "Pinyon Script",
	"Plaster" => "Plaster",
	"Play" => "Play",
	"Playball" => "Playball",
	"Playfair Display" => "Playfair Display",
	"Podkova" => "Podkova",
	"Poiret One" => "Poiret One",
	"Poller One" => "Poller One",
	"Poly" => "Poly",
	"Pompiere" => "Pompiere",
	"Pontano Sans" => "Pontano Sans",
	"Poppins" => "Poppins",
	"Port Lligat Sans" => "Port Lligat Sans",
	"Port Lligat Slab" => "Port Lligat Slab",
	"Prata" => "Prata",
	"Preahvihear" => "Preahvihear",
	"Press Start 2P" => "Press Start 2P",
	"Princess Sofia" => "Princess Sofia",
	"Prociono" => "Prociono",
	"Prosto One" => "Prosto One",
	"Puritan" => "Puritan",
	"Quando" => "Quando",
	"Quantico" => "Quantico",
	"Quattrocento" => "Quattrocento",
	"Quattrocento Sans" => "Quattrocento Sans",
	"Questrial" => "Questrial",
	"Quicksand" => "Quicksand",
	"Qwigley" => "Qwigley",
	"Racing Sans One" => "Racing Sans One",
	"Renner" => "Renner",
	"Radley" => "Radley",
	"Raleway" => "Raleway",
	"Raleway Dots" => "Raleway Dots",
	"Rammetto One" => "Rammetto One",
	"Ranchers" => "Ranchers",
	"Rancho" => "Rancho",
	"Rationale" => "Rationale",
	"Redressed" => "Redressed",
	"Reenie Beanie" => "Reenie Beanie",
	"Revalia" => "Revalia",
	"Ribeye" => "Ribeye",
	"Ribeye Marrow" => "Ribeye Marrow",
	"Righteous" => "Righteous",
	"Rochester" => "Rochester",
	"Rock Salt" => "Rock Salt",
	"Rokkitt" => "Rokkitt",
	"Romanesco" => "Romanesco",
	"Ropa Sans" => "Ropa Sans",
	"Rosario" => "Rosario",
	"Rosarivo" => "Rosarivo",
	"Rouge Script" => "Rouge Script",
	"Rubik" => "Rubik",
	"Ruda" => "Ruda",
	"Ruge Boogie" => "Ruge Boogie",
	"Ruluko" => "Ruluko",
	"Ruslan Display" => "Ruslan Display",
	"Russo One" => "Russo One",
	"Ruthie" => "Ruthie",
	"Roboto" => "Roboto",
	"Roboto Condensed" => "Roboto Condensed",
	"Rye" => "Rye",
	"Sail" => "Sail",
	"Salsa" => "Salsa",
	"Sancreek" => "Sancreek",
	"Sansita One" => "Sansita One",
	"Sarina" => "Sarina",
	"Satisfy" => "Satisfy",
	"Schoolbell" => "Schoolbell",
	"Seaweed Script" => "Seaweed Script",
	"Sevillana" => "Sevillana",
	"Shadows Into Light" => "Shadows Into Light",
	"Shadows Into Light Two" => "Shadows Into Light Two",
	"Shanti" => "Shanti",
	"Share" => "Share",
	"Shojumaru" => "Shojumaru",
	"Short Stack" => "Short Stack",
	"Siemreap" => "Siemreap",
	"Sigmar One" => "Sigmar One",
	"Signika" => "Signika",
	"Signika Negative" => "Signika Negative",
	"Simonetta" => "Simonetta",
	"Sirin Stencil" => "Sirin Stencil",
	"Six Caps" => "Six Caps",
	"Skranji" => "Skranji",
	"Slackey" => "Slackey",
	"Smokum" => "Smokum",
	"Smythe" => "Smythe",
	"Sniglet" => "Sniglet",
	"Snippet" => "Snippet",
	"Sofia" => "Sofia",
	"Sonsie One" => "Sonsie One",
	"Sorts Mill Goudy" => "Sorts Mill Goudy",
	"Source Sans Pro" => "Source Sans Pro",
	"Special Elite" => "Special Elite",
	"Spicy Rice" => "Spicy Rice",
	"Spinnaker" => "Spinnaker",
	"Spirax" => "Spirax",
	"Squada One" => "Squada One",
	"Stardos Stencil" => "Stardos Stencil",
	"Stint Ultra Condensed" => "Stint Ultra Condensed",
	"Stint Ultra Expanded" => "Stint Ultra Expanded",
	"Stoke" => "Stoke",
	"Sue Ellen Francisco" => "Sue Ellen Francisco",
	"Sunshiney" => "Sunshiney",
	"Supermercado One" => "Supermercado One",
	"Suwannaphum" => "Suwannaphum",
	"Swanky and Moo Moo" => "Swanky and Moo Moo",
	"Syncopate" => "Syncopate",
	"Tangerine" => "Tangerine",
	"Taprom" => "Taprom",
	"Telex" => "Telex",
	"Tenor Sans" => "Tenor Sans",
	"The Girl Next Door" => "The Girl Next Door",
	"Tienne" => "Tienne",
	"Tinos" => "Tinos",
	"Titillium Web" => "Titillium Web",
	"Titan One" => "Titan One",
	"Trade Winds" => "Trade Winds",
	"Trocchi" => "Trocchi",
	"Trochut" => "Trochut",
	"Trykker" => "Trykker",
	"Tulpen One" => "Tulpen One",
	"Ubuntu" => "Ubuntu",
	"Ubuntu Condensed" => "Ubuntu Condensed",
	"Ubuntu Mono" => "Ubuntu Mono",
	"Ultra" => "Ultra",
	"Uncial Antiqua" => "Uncial Antiqua",
	"UnifrakturCook" => "UnifrakturCook",
	"UnifrakturMaguntia" => "UnifrakturMaguntia",
	"Unkempt" => "Unkempt",
	"Unlock" => "Unlock",
	"Unna" => "Unna",
	"VT323" => "VT323",
	"Varela" => "Varela",
	"Varela Round" => "Varela Round",
	"Vast Shadow" => "Vast Shadow",
	"Vibur" => "Vibur",
	"Vidaloka" => "Vidaloka",
	"Viga" => "Viga",
	"Voces" => "Voces",
	"Volkhov" => "Volkhov",
	"Vollkorn" => "Vollkorn",
	"Voltaire" => "Voltaire",
	"Work Sans" => "Work Sans",
	"Waiting for the Sunrise" => "Waiting for the Sunrise",
	"Wallpoet" => "Wallpoet",
	"Walter Turncoat" => "Walter Turncoat",
	"Warnes" => "Warnes",
	"Wellfleet" => "Wellfleet",
	"Wire One" => "Wire One",
	"Yanone Kaffeesatz" => "Yanone Kaffeesatz",
	"Yellowtail" => "Yellowtail",
	"Yeseva One" => "Yeseva One",
	"Yesteryear" => "Yesteryear",
	"Zeyada" => "Zeyad"
	);
	// Font Size
	$font_sizes = array();
	$font_sizes_px_none = array();
	for ($i = 9; $i <= 50; $i++){ 
		$font_sizes[$i.'px'] = $i.'px';
		$font_sizes_px_none[$i] = $i.'px';
	}
	// Font Weights
	$font_weights  = array(
		'100' => esc_html__('Thin', 'disto'),
		'200' => esc_html__('Extra-Light', 'disto'),
		'300' => esc_html__('Light', 'disto'),
		'400' => esc_html__('Regular', 'disto'),
		'500' => esc_html__('Medium', 'disto'),
		'600' => esc_html__('Semi-Bold', 'disto'),
		'700' => esc_html__('Bold', 'disto'),
		'800' => esc_html__('Extra-Bold', 'disto'),
		'900' => esc_html__('Black', 'disto')
	);
	
	$wp_customize->add_panel( 'disto_theme_options', array(
	    'priority' => 1,
	    'title' => esc_html__( 'Theme Options', 'disto' ),
	    'description' => esc_html__( 'Options for theme customizing', 'disto' ),
	));

	$wp_customize->add_section( 
		'disto_logo_favicon' , 
		array(
   		'title'      => esc_html__( 'Logo', 'disto' ),
   		'description'=> esc_html__( 'Please choose your logo', 'disto' ),
   		'priority'  => 1,
   		'panel' => 'disto_theme_options'
	));
    $wp_customize->add_setting( 
    'disto_logo', 
    array(
	'default' 			=> '',
	'transport'   		=> 'refresh',
	'sanitize_callback' => 'sanitize_text_field',
	));
    $wp_customize->add_control( 
    	new WP_Customize_Image_Control( 
    	$wp_customize, 
    	'disto_logo', 
    	array(
        'label'    => esc_html__( 'Normal Logo', 'disto' ),
        'section'  => 'disto_logo_favicon',
        'settings' => 'disto_logo'
    )));

    $wp_customize->add_setting( 
    'disto_logow', 
    array(
	'default' 			=> '',
	'transport'   		=> 'refresh',
	'sanitize_callback' => 'sanitize_text_field',
	));
    $wp_customize->add_control( 
    	new WP_Customize_Image_Control( 
    	$wp_customize, 
    	'disto_logow', 
    	array(
        'label'    => esc_html__( 'White Logo', 'disto' ),
        'section'  => 'disto_logo_favicon',
        'settings' => 'disto_logow'
    )));

    $wp_customize->add_setting(
	    'logo_width',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'logo_width',
	    array(
	        'section'   => 'disto_logo_favicon',
	        'label'     => esc_html__('Logo Width EX: 100px','disto'),
	        'type'      => 'text'
	    )
	);
	$wp_customize->add_setting(
	    'm_logo_width',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'm_logo_width',
	    array(
	        'section'   => 'disto_logo_favicon',
	        'label'     => esc_html__('Mobile Logo Width EX: 100px','disto'),
	        'type'      => 'text'
	    )
	);

	/*General Setting*/
	$wp_customize->add_section(
		    'disto_general_setting',
		    array(
		        'title'     => esc_html__('General Setting', 'disto'),
		        'priority'  => 1,
		        'panel' => 'disto_theme_options'
		    )
	);
	$wp_customize->add_setting(
	    'header_layout_design',
	    array(
	        'default'     => 'header_layout_4',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    new disto_control_image_select (
	        $wp_customize,
	        'header_layout_design',
	        array(
	            'label'      	=> esc_html__( 'Header Layout (header menu and logo)', 'disto' ),
	            'description'	=> esc_html__('Select header style.', 'disto'),
	            'section'		=> 'disto_general_setting',
	            'settings'		=> 'header_layout_design',
	            'choices'		=> array(
	            	'header_magazine_personal'	=> get_template_directory_uri().'/inc/customizer/images/header1.png',
	            	'header_magazine_black'	=> get_template_directory_uri().'/inc/customizer/images/header2.png',
	            	'header_magazine_full_screen'	=> get_template_directory_uri().'/inc/customizer/images/header3.png',
	            	'header_layout_4'	=> get_template_directory_uri().'/inc/customizer/images/header4.png',
	            	'header-header_layout_6'	=> get_template_directory_uri().'/inc/customizer/images/header5.png',
	            	'header-header_layout_06'	=> get_template_directory_uri().'/inc/customizer/images/header6.png',
	            ),
	            'input_attrs' => array(
	            	'multiple' => false
	            )
	        )
	    )
	);
	$wp_customize->add_setting(
	    'theme_color',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_color',
	        array(
	            'label'      => esc_html__( 'Theme color', 'disto' ),
	            'section'    => 'disto_general_setting',
	            'settings'   => 'theme_color'
	        )
	    )
	);

	$wp_customize->add_setting(
        'disable_border_radius', 
        array(
            'default' => false, 
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'disable_border_radius',
        array(
            'section'   => 'disto_general_setting',
            'label'     => esc_html__('Disable Border Radius','disto'),
            'type'      => 'checkbox'
        )
    );

    $wp_customize->add_setting(
        'enable_dark_mode', 
        array(
            'default' => false, 
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'enable_dark_mode',
        array(
            'section'   => 'disto_general_setting',
            'label'     => esc_html__('Enable dark mode button','disto'),
            'type'      => 'checkbox'
        )
    );

    $wp_customize->add_setting(
		'enable_dark_skin', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'enable_dark_skin',
	    array(
	        'section'   => 'disto_general_setting',
	        'label'     => esc_html__('Default dark skin','disto'),
	        'type'      => 'checkbox'
	    )
	);

    $wp_customize->add_setting(
        'hide_nav_desk', 
        array(
            'default' => false, 
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'hide_nav_desk',
        array(
            'section'   => 'disto_general_setting',
            'label'     => esc_html__('Hide mobile menu on desktop','disto'),
            'type'      => 'checkbox'
        )
    );


	$wp_customize->add_setting(
        'disto_top_m_title',
        array(
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        new Disto_Customize_Control_Title (
            $wp_customize,
            'disto_top_m_title',
            array(
                'label'         => esc_html__( 'Top Menu Setting', 'disto' ),
                'section'       => 'disto_general_setting',
                'settings'      => 'disto_top_m_title',
            )
        )
    );

    $wp_customize->add_setting(
        'disable_top_bar', 
        array(
            'default' => false, 
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'disable_top_bar',
        array(
            'section'   => 'disto_general_setting',
            'label'     => esc_html__('Disable top bar','disto'),
            'type'      => 'checkbox'
        )
    );


    $wp_customize->add_setting(
	    'top_menu_bg_color',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'top_menu_bg_color',
	        array(
	            'label'      => esc_html__( 'Top Menu Background', 'disto' ),
	            'section'    => 'disto_general_setting',
	            'settings'   => 'top_menu_bg_color'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'top_menu_bg_color_gradient',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'top_menu_bg_color_gradient',
	        array(
	            'label'      => esc_html__( 'Top Main Menu Background gradient (Note: Gradient background is mix with Top Background)', 'disto' ),
	            'section'    => 'disto_general_setting',
	            'settings'   => 'top_menu_bg_color_gradient'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'to_menu_text_color',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'to_menu_text_color',
	        array(
	            'label'      => esc_html__( 'Top Menu text color', 'disto' ),
	            'section'    => 'disto_general_setting',
	            'settings'   => 'to_menu_text_color'
	        )
	    )
	);





	$wp_customize->add_setting(
        'disto_main_m_title',
        array(
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        new Disto_Customize_Control_Title (
            $wp_customize,
            'disto_main_m_title',
            array(
                'label'         => esc_html__( 'Main Menu Setting', 'disto' ),
                'section'       => 'disto_general_setting',
                'settings'      => 'disto_main_m_title',
            )
        )
    );

	$wp_customize->add_setting(
	    'menu_bg_color',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'menu_bg_color',
	        array(
	            'label'      => esc_html__( 'Main Menu Background', 'disto' ),
	            'section'    => 'disto_general_setting',
	            'settings'   => 'menu_bg_color'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'menu_bg_color_gradient',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'menu_bg_color_gradient',
	        array(
	            'label'      => esc_html__( 'Main Menu Background gradient (Note: Gradient background is mix with Main Menu Background)', 'disto' ),
	            'section'    => 'disto_general_setting',
	            'settings'   => 'menu_bg_color_gradient'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'menu_text_color',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'menu_text_color',
	        array(
	            'label'      => esc_html__( 'Main Menu text color', 'disto' ),
	            'section'    => 'disto_general_setting',
	            'settings'   => 'menu_text_color'
	        )
	    )
	);

	$wp_customize->add_setting(
        'disto_other_title',
        array(
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        new Disto_Customize_Control_Title (
            $wp_customize,
            'disto_other_title',
            array(
                'label'         => esc_html__( 'Other Setting', 'disto' ),
                'section'       => 'disto_general_setting',
                'settings'      => 'disto_other_title',
            )
        )
    );

$wp_customize->add_setting(
		'disable_top_search', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'disable_top_search',
	    array(
	        'section'   => 'disto_general_setting',
	        'label'     => esc_html__('Disable header search','disto'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
		'disable_social_icons', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'disable_social_icons',
	    array(
	        'section'   => 'disto_general_setting',
	        'label'     => esc_html__('Disable social icons','disto'),
	        'type'      => 'checkbox'
	    )
	);	
	$wp_customize->add_setting(
		'jl_disable_c_date', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'jl_disable_c_date',
	    array(
	        'section'   => 'disto_general_setting',
	        'label'     => esc_html__('Disable current date','disto'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
	    'jl_date_title',
	    array(
	        'default'    =>  'Current Date:',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'jl_date_title',
	    array(
	        'section'   => 'disto_general_setting',
	        'label'     => esc_html__('Current date title','disto'),
	        'type'      => 'text'
	    )
	);
	/*Typography*/
	$wp_customize->add_section(
		    'disto_typography_setting',
		    array(
		        'title'     => esc_html__('Typography', 'disto'),
		        'priority'  => 1,
		        'panel' => 'disto_theme_options'
		    )
	);

	$wp_customize->add_setting(
	    'disto_menu_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Disto_Customize_Control_Title (
	        $wp_customize,
	        'disto_menu_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Navigation Settings', 'disto' ),
	            'section'		=> 'disto_typography_setting',
	            'settings'		=> 'disto_menu_settings_title',
	        )
	    )
	);
	$wp_customize->add_setting(
	    'disto_menu_font_family',
	    array(
	        'default'     => 'Poppins',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'disto_menu_font_family',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Menu font family','disto'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
    $wp_customize->add_setting(
	    'disto_menu_font_size',
	    array(
	        'default'     => '15px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'disto_menu_font_size',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Main menu font size','disto'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$wp_customize->add_setting(
	    'disto_menu_font_weight',
	    array(
	        'default'     => '600',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'disto_menu_font_weight',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Main menu font weight','disto'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);
	$wp_customize->add_setting(
	    'disto_menu_transform',
	    array(
	        'default'    =>  'capitalize',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'disto_menu_transform',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Menu text transform','disto'),
	        'type'      => 'select',
	        'choices' 	=> array(
	        	'none' => esc_html__('None', 'disto'),
	        	'capitalize' => esc_html__('Capitalize', 'disto'),
	        	'uppercase' => esc_html__('Uppercase', 'disto')
	        )
	    )
	);
	$wp_customize->add_setting(
	    'letter_spacing_menu',
	    array(
	        'default'    =>  '-0.03em',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'letter_spacing_menu',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Menu letter spacing','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'disto_sub_menu_font_size',
	    array(
	        'default'     => '14px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'disto_sub_menu_font_size',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Sub menu font size','disto'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$wp_customize->add_setting(
	    'disto_sub_menu_font_weight',
	    array(
	        'default'     => '400',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'disto_sub_menu_font_weight',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Sub menu font weight','disto'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);

	$wp_customize->add_setting(
	    'disto_p_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Disto_Customize_Control_Title (
	        $wp_customize,
	        'disto_p_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Paragraph Settings', 'disto' ),
	            'section'		=> 'disto_typography_setting',
	            'settings'		=> 'disto_p_settings_title',
	        )
	    )
	);

	$wp_customize->add_setting(
	    'disto_p_font_family',
	    array(
	        'default'     => 'Poppins',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'disto_p_font_family',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Paragraph font family','disto'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$wp_customize->add_setting(
	    'disto_p_font_size',
	    array(
	        'default'     => '15px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'disto_p_font_size',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Paragraph font size','disto'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$wp_customize->add_setting(
	    'disto_p_font_weight',
	    array(
	        'default'     => '400',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'disto_p_font_weight',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Paragraph font weight','disto'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);


	$wp_customize->add_setting(
	    'disto_title_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Disto_Customize_Control_Title (
	        $wp_customize,
	        'disto_title_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Title Settings', 'disto' ),
	            'section'		=> 'disto_typography_setting',
	            'settings'		=> 'disto_title_settings_title',
	        )
	    )
	);
	$wp_customize->add_setting(
	    'disto_title_font_family',
	    array(
	        'default'     => 'Poppins',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'disto_title_font_family',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Title font family','disto'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$wp_customize->add_setting(
	    'disto_title_font_weight',
	    array(
	        'default'     => '700',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'disto_title_font_weight',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Title font weight','disto'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);	
	$wp_customize->add_setting(
	    'disto_title_transform',
	    array(
	        'default'    =>  'capitalize',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'disto_title_transform',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Title text transform','disto'),
	        'type'      => 'select',
	        'choices' 	=> array(
	        	'none' => esc_html__('None', 'disto'),
	        	'capitalize' => esc_html__('Capitalize', 'disto'),
	        	'uppercase' => esc_html__('Uppercase', 'disto')
	        )
	    )
	);

	$wp_customize->add_setting(
	    'letter_spacing_heading',
	    array(
	        'default'    =>  '-0.03em',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'letter_spacing_heading',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Title letter spacing','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'line_height_heading',
	    array(
	        'default'    =>  '1.3',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'line_height_heading',
	    array(
	        'section'   => 'disto_typography_setting',
	        'label'     => esc_html__('Title line height','disto'),
	        'type'      => 'text'
	    )
	);


	$wp_customize->add_setting(
	    'disto_ltitle_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Disto_Customize_Control_Title (
	        $wp_customize,
	        'disto_ltitle_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Large post font size', 'disto' ),
	            'section'		=> 'disto_typography_setting',
	            'settings'		=> 'disto_ltitle_settings_title',
	        )
	    )
	);

$wp_customize->add_setting(
	    'large_post_font_size',
	    array(
	        'default'     => '30px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'large_post_font_size',
	    array(
	        'section'   => 'disto_typography_setting',
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);

	$wp_customize->add_setting(
	    'disto_gtitle_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Disto_Customize_Control_Title (
	        $wp_customize,
	        'disto_gtitle_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Grid post font size', 'disto' ),
	            'section'		=> 'disto_typography_setting',
	            'settings'		=> 'disto_gtitle_settings_title',
	        )
	    )
	);

$wp_customize->add_setting(
	    'grid_post_font_size',
	    array(
	        'default'     => '22px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'grid_post_font_size',
	    array(
	        'section'   => 'disto_typography_setting',
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);

	$wp_customize->add_setting(
	    'disto_lititle_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    new Disto_Customize_Control_Title (
	        $wp_customize,
	        'disto_lititle_settings_title',
	        array(
	            'label'      	=> esc_html__( 'List post font size', 'disto' ),
	            'section'		=> 'disto_typography_setting',
	            'settings'		=> 'disto_lititle_settings_title',
	        )
	    )
	);

	$wp_customize->add_setting(
	    'list_post_font_size',
	    array(
	        'default'     => '25px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'list_post_font_size',
	    array(
	        'section'   => 'disto_typography_setting',
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);



	/*Blog & single post*/
	$wp_customize->add_section(
		    'disto_blog_single_setting',
		    array(
		        'title'     => esc_html__('Blog & single post', 'disto'),
		        'priority'  => 1,
		        'panel' => 'disto_theme_options'
		    )
	);
	$wp_customize->add_setting(
	    'single_post_layout_options',
	    array(
	        'default'    =>  'single_post_layout_1',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'single_post_layout_options',
	    array(
	        'section'   => 'disto_blog_single_setting',
	        'label'     => esc_html__('Single Post Layout','disto'),
	        'type'      => 'radio',
	        'choices'	=> array(
	        'single_post_layout_1' => esc_html__('Default Layout', 'disto'),
			'single_post_layout_4' => esc_html__('Title Below Align Left', 'disto'),
			'single_post_layout_5' => esc_html__('Title Above Align Left', 'disto'),
			'single_post_layout_7' => esc_html__('Full Width With Caption Overlay Center', 'disto'),
			'single_post_layout_8' => esc_html__('Full Width With Caption Overlay Bottom', 'disto'),
			'single_post_layout_9' => esc_html__('Full Width With Caption above', 'disto'),
			'single_post_layout_10' => esc_html__('Full Width Only Caption', 'disto'),
			'single_post_layout_11' => esc_html__('Full Width Caption With Post Format', 'disto'),
			'single_post_layout_12' => esc_html__('Caption Without Image', 'disto')
	        )
	    )
	);

	$wp_customize->add_setting(
		'disable_post_date', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'disable_post_date',
	    array(
	        'section'   => 'disto_blog_single_setting',
	        'label'     => esc_html__('Disable post date','disto'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
		'disable_post_author', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'disable_post_author',
	    array(
	        'section'   => 'disto_blog_single_setting',
	        'label'     => esc_html__('Disable post author','disto'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
		'disable_post_category', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'disable_post_category',
	    array(
	        'section'   => 'disto_blog_single_setting',
	        'label'     => esc_html__('Disable post category','disto'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
		'disable_post_comment_meta', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'disable_post_comment_meta',
	    array(
	        'section'   => 'disto_blog_single_setting',
	        'label'     => esc_html__('Disable post comment meta','disto'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
		'disable_post_tag', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'disable_post_tag',
	    array(
	        'section'   => 'disto_blog_single_setting',
	        'label'     => esc_html__('Disable post tag','disto'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
		'disable_post_share', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'disable_post_share',
	    array(
	        'section'   => 'disto_blog_single_setting',
	        'label'     => esc_html__('Disable post share','disto'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
		'disable_post_related', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'disable_post_related',
	    array(
	        'section'   => 'disto_blog_single_setting',
	        'label'     => esc_html__('Disable post related','disto'),
	        'type'      => 'checkbox'
	    )
	);
	$wp_customize->add_setting(
		'disable_post_view', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'disable_post_view',
	    array(
	        'section'   => 'disto_blog_single_setting',
	        'label'     => esc_html__('Disable post view','disto'),
	        'type'      => 'checkbox'
	    )
	);

	$wp_customize->add_setting(
		'disable_post_nav', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
	    'disable_post_nav',
	    array(
	        'section'   => 'disto_blog_single_setting',
	        'label'     => esc_html__('Disable next/previous post','disto'),
	        'type'      => 'checkbox'
	    )
	);


	/*Sidebar*/
	$wp_customize->add_section(
		    'disto_sidebar_setting',
		    array(
		        'title'     => esc_html__('Sidebar', 'disto'),
		        'priority'  => 1,
		        'panel' => 'disto_theme_options'
		    )
	);

	$wp_customize->add_setting(
        'disable_sidebar', 
        array(
            'default' => false, 
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'disable_sidebar',
        array(
            'section'   => 'disto_sidebar_setting',
            'label'     => esc_html__('Disable Sidebar','disto'),
            'type'      => 'checkbox'
        )
    );

	$wp_customize->add_setting(
	    'post_sidebar',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'post_sidebar',
	    array(
	        'section'   => 'disto_sidebar_setting',
	        'label'     => esc_html__('Post sidebar','disto'),
	        'type'      => 'select',
	        'choices'	=> $option_sidebar
	    )
	);

	$wp_customize->add_setting(
	    'page_sidebar',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'page_sidebar',
	    array(
	        'section'   => 'disto_sidebar_setting',
	        'label'     => esc_html__('Page sidebar','disto'),
	        'type'      => 'select',
	        'choices'	=> $option_sidebar
	    )
	);

	$wp_customize->add_setting(
	    'category_sidebar',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'category_sidebar',
	    array(
	        'section'   => 'disto_sidebar_setting',
	        'label'     => esc_html__('Category sidebar','disto'),
	        'type'      => 'select',
	        'choices'	=> $option_sidebar
	    )
	);

	$wp_customize->add_setting(
	    'tag_sidebar',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'tag_sidebar',
	    array(
	        'section'   => 'disto_sidebar_setting',
	        'label'     => esc_html__('Tag sidebar','disto'),
	        'type'      => 'select',
	        'choices'	=> $option_sidebar
	    )
	);

	$wp_customize->add_setting(
	    'archive_sidebar',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'archive_sidebar',
	    array(
	        'section'   => 'disto_sidebar_setting',
	        'label'     => esc_html__('Archive sidebar','disto'),
	        'type'      => 'select',
	        'choices'	=> $option_sidebar
	    )
	);

	$wp_customize->add_setting(
	    'author_sidebar',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'author_sidebar',
	    array(
	        'section'   => 'disto_sidebar_setting',
	        'label'     => esc_html__('Author sidebar','disto'),
	        'type'      => 'select',
	        'choices'	=> $option_sidebar
	    )
	);

	$wp_customize->add_setting(
	    'search_sidebar',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $wp_customize->add_control(
	    'search_sidebar',
	    array(
	        'section'   => 'disto_sidebar_setting',
	        'label'     => esc_html__('Search sidebar','disto'),
	        'type'      => 'select',
	        'choices'	=> $option_sidebar
	    )
	);


	/*Social Header Link*/
	$wp_customize->add_section(
		    'disto_social_setting',
		    array(
		        'title'     => esc_html__('Social Header Link', 'disto'),
		        'priority'  => 1,
		        'panel' => 'disto_theme_options'
		    )
	);

	$wp_customize->add_setting(
	    'jl_fl_title',
	    array(
	        'default'    =>  'Follow us',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'jl_fl_title',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Social title','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'facebook',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'facebook',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Facebook','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'vk',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'vk',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('VK','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'telegram',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'telegram',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Telegram','disto'),
	        'type'      => 'text'
	    )
	);	

	$wp_customize->add_setting(
	    'behance',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'behance',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Behance','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'vimeo',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'vimeo',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Vimeo','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'youtube',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'youtube',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Youtube','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'instagram',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'instagram',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Instagram','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'linkedin',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'linkedin',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Linkedin','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'pinterest',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'pinterest',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Pinterest','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'twitter',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'twitter',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Twitter','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'deviantart',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'deviantart',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Deviantart','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'dribble',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'dribble',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Dribble','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'dropbox',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'dropbox',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Dropbox','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'rss',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'rss',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('RSS','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'skype',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'skype',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Skype','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'stumbleupon',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'stumbleupon',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Stumbleupon','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'wordpress',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'wordpress',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('WordPress','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'yahoo',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'yahoo',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Yahoo','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'sound_cloud',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'sound_cloud',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Sound Cloud','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'spotify_i',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'spotify_i',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Spotify','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'wechat',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'wechat',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('wechat','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'google_podcast',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'google_podcast',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('google podcast','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'anchor_i',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'anchor_i',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('anchor','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'hello_i',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'hello_i',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('Hello','disto'),
	        'type'      => 'text'
	    )
	);

	$wp_customize->add_setting(
	    'email_link',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'email_link',
	    array(
	        'section'   => 'disto_social_setting',
	        'label'     => esc_html__('E-mail','disto'),
	        'type'      => 'text'
	    )
	);

	/*Footer*/
	$wp_customize->add_section(
		    'disto_footer_setting',
		    array(
		        'title'     => esc_html__('Footer', 'disto'),
		        'priority'  => 1,
		        'panel' => 'disto_theme_options'
		    )
	);

	$wp_customize->add_setting(
        'footer_bg_color',
        array(
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg_color',
            array(
                'label'      => esc_html__( 'Footer Background Color', 'disto' ),
                'section'    => 'disto_footer_setting',
                'settings'   => 'footer_bg_color'
            )
        )
    );

    $wp_customize->add_setting(
        'footer_text_color',
        array(
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_text_color',
            array(
                'label'      => esc_html__( 'Footer Text Color', 'disto' ),
                'section'    => 'disto_footer_setting',
                'settings'   => 'footer_text_color'
            )
        )
    );

	$wp_customize->add_setting(
        'disto_footer_opt',
        array(
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        new Disto_Customize_Control_Title (
            $wp_customize,
            'disto_footer_opt',
            array(
                'label'         => esc_html__( 'Footer Options', 'disto' ),
                'section'       => 'disto_footer_setting',
                'settings'      => 'disto_footer_opt',
            )
        )
    );

	$wp_customize->add_setting(
	    'footer_columns',
	    array(
	        'default'    =>  'footer3col',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control(
	    'footer_columns',
	    array(
	        'section'   => 'disto_footer_setting',
	        'label'     => esc_html__('Footer columns','disto'),
	        'type'      => 'radio',
	        'choices'	=> array(
	        'footer4col' => esc_html__('Footer 4 columns', 'disto'),
			'footer3col' => esc_html__('Footer 3 columns', 'disto'),
			'footer2col' => esc_html__('Footer 2 columns', 'disto'),
			'footer1col' => esc_html__('Footer 1 columns', 'disto'),
			'footer0col' => esc_html__('No Footer', 'disto')
	        )
	    )
	);

	$wp_customize->add_setting(
	    'jl_copyright',
	    array(
	        'default'    =>  '© Copyright 2019 Jellywp. All Rights Reserved Powered by Jellywp',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'wp_kses_post',
	    )
	);
	$wp_customize->add_control(
	    'jl_copyright',
	    array(
	        'section'   => 'disto_footer_setting',
	        'label'     => esc_html__('Footer copyright','disto'),
	        'type'      => 'textarea'
	    )
	);

	$wp_customize->add_setting(
	    'footer_script',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'wp_kses_post',
	    )
	);

	$wp_customize->add_control(
	    'footer_script',
	    array(
	        'section'   => 'disto_footer_setting',
	        'label'     => esc_html__('Footer Script','disto'),
	        'type'      => 'textarea'
	    )
	);

	
$wp_customize->remove_section( 'colors' );
$wp_customize->remove_section( 'background_image' );
}
add_action( 'customize_register', 'disto_register_theme_customizer', 110 );
