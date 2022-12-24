<?php
/*
  Template Name: Festivals overview
*/
get_header();
$cat = get_terms( 'category', array(
  'hide_empty' => false,
) );
$countries = get_terms( 'locations', array(
  'hide_empty' => false,
) );
$months = get_terms( 'months', array(
  'hide_empty' => false,
) );
$genres = get_terms( 'genres', array(
  'hide_empty' => false,
) );
$nums = get_terms( 'numberofdays', array(
  'hide_empty' => false,
) );
$campings = get_terms( 'camping', array(
  'hide_empty' => false,
) );
$sizes = get_terms( 'sizes', array(
  'hide_empty' => false,
) );
?>
<style>
  .agenda-filters{
    display:flex;
    flex-wrap: wrap;
    justify-content:space-evenly;
  }
  .agenda-filters select{
    display: block;
    width: 100%;

  }
  .choise-wrapper{
    width: 30%;
  }
  .choise-wrapper p{
    font-size: 25px;
    margin: 30px 0 0 0;
  }
</style>
<div class="festivals-all">
    <?php get_template_part('single-header-7'); ?>

    <section id="content_main" class="clearfix jl_spost">
      <h2>Pretraga</h2>
      <div class="agenda-filters">
        <div class="choise-wrapper">
          <p>Drzava</p>
          <select id="country">
            <option value="0">Svi</option>
            <?php
              foreach( $countries as $country )
                echo '<option value="'.$country->term_id.'">' . $country->name . '</option>';
            ?>
          </select>
        </div>

        <div class="choise-wrapper">
          <p>Festival</p>
          <select id="category">
            <option value="0">Svi</option>
            <?php
              foreach( $cat as $c )
                echo '<option value="'.$c->term_id.'">' . $c->name . '</option>';
            ?>
          </select>
        </div>

        <div class="choise-wrapper">
          <p>Mesec</p>
          <select id="month">
            <option value="0">Svi</option>
            <?php
              foreach( $months as $month )
                echo '<option value="'.$month->term_id.'">' . $month->name . '</option>';
            ?>
          </select>
        </div>

        <div class="choise-wrapper">
          <p>Trajanje</p>
          <select id="numofdays">
            <option value="0">Svi</option>
            <?php
              foreach( $nums as $num )
                echo '<option value="'.$num->term_id.'">' . $num->name . '</option>';
            ?>
          </select>
        </div>

        <div class="choise-wrapper">
          <p>Zanr</p>
          <select id="genre">
            <option value="0">Svi</option>
            <?php
              foreach( $genres as $genre )
                echo '<option value="'.$genre->term_id.'">' . $genre->name . '</option>';
            ?>
          </select>
        </div>

        <div class="choise-wrapper">
          <p>Kampovanje</p>
          <select id="campaing">
              <option selected="true" value="0">Ne</option>
            <?php
              foreach( $campings as $camping )
                echo '<option value="'.$camping->term_id.'">' . $camping->name . '</option>';
            ?>
          </select>
        </div>

        <div class="choise-wrapper">
          <p>Velicina</p>
          <select id="size">
            <option value="0">Svi</option>
            <?php
              foreach( $sizes as $size )
                echo '<option value="'.$size->term_id.'">' . $size->name . '</option>';
            ?>
          </select>
        </div>
      </div>

      <button id="search" type="button">Prikazi</button>
      <div id="result-wrapper">

      </div>

    </section>
</div>
<!-- end content -->
<?php get_footer(); ?>
