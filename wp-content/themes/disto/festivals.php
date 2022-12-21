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
<div class="festivals-all">
    <?php get_template_part('single-header-7'); ?>

    <section id="content_main" class="clearfix jl_spost">
      <h2>Pretraga</h2>
      <div class="agenda-filters">
        <select id="country">
          <?php
            foreach( $countries as $country )
              echo '<option value="'.$country->term_id.'">' . $country->name . '</option>';
          ?>
        </select>

        <select id="category">
          <?php
            foreach( $cat as $c )
              echo '<option value="'.$c->term_id.'">' . $c->name . '</option>';
          ?>
        </select>

        <select id="numofdays">
          <?php
            foreach( $nums as $num )
              echo '<option value="'.$num->term_id.'">' . $num->name . '</option>';
          ?>
        </select>

        <select id="genre">
          <?php
            foreach( $genres as $genre )
              echo '<option value="'.$genre->term_id.'">' . $genre->name . '</option>';
          ?>
        </select>
        
        <select id="campaing">
          <?php
            foreach( $campings as $camping )
              echo '<option selected="true">Ne</option>';
              echo '<option value="'.$camping->term_id.'">' . $camping->name . '</option>';
          ?>
        </select>

        <select id="size">
          <?php
            foreach( $sizes as $size )
              echo '<option value="'.$size->term_id.'">' . $size->name . '</option>';
          ?>
        </select>
        <button id="search" type="button">Prikazi</button>
      </div>

    </section>
</div>
<!-- end content -->
<?php get_footer(); ?>
